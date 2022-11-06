<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Customer;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CommissionController extends Controller
{
    public function customerConfirm(Request $request){
        // if (!Session::has('login-id')) return view('login');
        $cusId = Session::get('login-id');
        $cart = Cart::where('customerNumber','=',$cusId)->first();
        DB::transaction(function () use($cusId, $cart) {
            if(!$cart->custoConfirm){
                $cart->custoConfirm = true;
                $cart->save();
            }
        });
        return redirect()->back()->with('success', 'cart have been confirm');
    }

    public function customerCancel(){
        // if (!Session::has('login-id')) return view('login');
        $cusId = Session::get('login-id');
        $cart = Cart::where('customerNumber','=',$cusId)->first();
        DB::transaction(function () use($cusId, $cart) {
            if($cart->custoConfirm){
                $cart->custoConfirm = false;
                $cart->save();
            }
        });
        return redirect()->back()->with('success', 'cart have been confirm');
    }

    public function adminCancel($customerID){
        $cart = Cart::where('customerNumber','=',$customerID)->first();
        DB::transaction(function () use($cart) {
            $cart->custoConfirm = false;
            $cart->save();
        });
        return redirect()->back()->with('success', 'cart has been cancle.');
    }

    public function adminDenied($customerID){
        DB::transaction(function () use($customerID) {
            DB::table('carts')->where('customerNumber','=',$customerID)->update(['custoConfirm'=>false],['saleConfirm'=>false]);
            DB::table('cartdetails')->where('customerNumber', '=', $customerID)->orderBy('customerNumber')->lazy()->each(function ($cartDetail) {
                // DB::table('products')->where('productCode', '=', $cartDetail->productCode)->update(['quantityInStock', '=', $cartDetail->quantity]);
                $proQuan = DB::table('products')->select('quantityInStock')->where('productCode', '=', $cartDetail->productCode)->first();
                $proQuan = $proQuan->quantityInStock+$cartDetail->quantity;
                $proCode = $cartDetail->productCode;
                DB::table('products')->where('productCode', '=', $proCode)->update(['quantityInStock'=>$proQuan]);
            });
            DB::table('cartdetails')->where('customerNumber', '=', $customerID)->delete();
        });
        return redirect()->back()->with('success', 'Order has been denied');
    }

    public function salerepConfirm($customerNum){
        $cart = DB::table('carts')->where('customerNumber','=',$customerNum)->first();
        $cartDetails = CartDetail::where('customerNumber','=',$customerNum)->get();
        DB::transaction(function()use($cart,$cartDetails){
            $dateArr = $this->getDatesForOrder();
            $orderDate = $dateArr[0];
            $orderReq  = $dateArr[1];
            $orderShip  = $dateArr[2];
            $currOrderNum = $this->getLastestOrderNumber();
            DB::table('orders')->
                insert([
                    'orderNumber'=>$currOrderNum,
                    'orderDate'=> $orderDate,
                    'requiredDate'=> $orderReq,
                    'shippedDate'=> $orderShip,
                    'status'=> "In Process",
                    'comments'=> "added by function",
                    'customerNumber'=> $cart->customerNumber
                ]);
            foreach($cartDetails as $cd){
                $currPrice = $this->getPriceOfProduct($cd->productCode);
                DB::table('orderdetails')->insert([
                    'orderNumber'=>$currOrderNum,
                    'productCode'=>$cd->productCode,
                    'quantityOrdered'=>$cd->quantity,
                    'priceEach'=> $currPrice,
                    'orderLineNumber'=> 19
                ]);
                DB::table('cartdetails')->
                    where('customerNumber','=',$cart->customerNumber)->
                    where('productCode','=',$cd->productCode)->delete();
            }
            DB::table('carts')->
                where('customerNumber','=',$cart->customerNumber)->
                update(['custoConfirm'=>false,'saleConfirm'=>false]);
        });
        
        return redirect('/home')->with('success', 'cart have been confirm');
    }

    public function insertSaleRep($customerID){
        $adminID = Session::get('login-id');
        $customer = Customer::where('customerNumber','=',$customerID)->first();
        $cart = Cart::where('customerNumber', '=', $customerID)->first();
        DB::transaction(function () use($adminID, $customer, $cart) {
            $customer->salesRepEmployeeNumber = $adminID;
            $cart->salerepNumber = $adminID;
            $cart->save();
            $customer->save();
        });
        return redirect()->back()->with('success', 'SaleRep has been add to customer.');
    }

    private function getLastestOrderNumber():int{
        $lastestOrder = DB::table('orders')->orderByDesc('orderNumber')->select('orderNumber')->first();
        return $lastestOrder->orderNumber+1;
    }

    private function getDatesForOrder():array{
        $strReqOr = strtotime("+7 Days");
        $strShipOr = strtotime("+10 Days");
        return array(date("y-m-d"), date("y-m-d", $strReqOr), date("y-m-d",$strShipOr));
    }

    private function getPriceOfProduct($productCode){
        $productData = DB::table('products')->where('productCode','=',$productCode)->first('buyPrice');
        return $productData->buyPrice;
    }
}
