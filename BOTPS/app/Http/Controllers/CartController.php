<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;

use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    public function showCartDetail(){
        if (!Session::has('login-id')) return view('login');
        $cusId = Session::get('login-id');
        $cartDetails = DB::table('cartdetails')->where('customerNumber', 'like', $cusId)->get();
        return view('Cart', compact('cartDetails'));
    }

    public function addToCart($pId){
        $product =  Product::findOrFail($pId);
        if (!session()->has('login-id')) return view('login')->with('Login required');
        $cusId = session()->get('login-id');
        $salerep = DB::table('customers')->where('customerNumber','=',$cusId)->first('salesRepEmployeeNumber');
        $cart = DB::table('carts')->where('customerNumber','=',$cusId)->first();
        DB::transaction(function()use($pId, $product, $cart , $cusId, $salerep){
            if($cart != null){
                $cartDe = CartDetail::find( $cusId)->where('customerNumber','Like',$cusId)->where('productCode','=', $pId)->first();
                if($cartDe == null){
                    $cartDe = new CartDetail();
                    $cartDe->customerNumber = $cart->customerNumber;
                    $cartDe->productCode= $pId;
                    $cartDe->quantity   = 1;
                }else{
                    $cartDe->quantity   = $cartDe->quantity+1;
                }
                $cartDe->save();
            }else{
                $cart = new Cart();
                $cart->customerNumber   = $cusId;
                $cart->custoConfirm     = False;
                $cart->saleConfirm      = False;
                $cart->salerepNumber    = $salerep->salesRepEmployeeNumber;
                $cart->save();

                $cartDetail = new CartDetail();
                $cartDetail->customerNumber     = $cusId;
                $cartDetail->productCode        = $pId;
                $cartDetail->quantity           = 1;
                $cartDetail->save();
            }
                $product->quantityInStock = $product->quantityInStock-1;
                $product->save();
        });
        
        $this->showCartDetail($cusId)->with('Success','an item have been added');
    }

    public function removeInCart($productId){
        $product = Product::findOrFail($productId);
        if (!Session::has('login-id')) return view('login');
        $cusId = Session::get('login-id');
        $cart = DB::table('carts')->where('customerNumber','Like',$cusId)->first();
        DB::transaction(function()use($product, $cart){
            if($cart != null){
                $cartDe = DB::table('cartdetails')
                    ->where('cartNumber','like',$cart->cartNumber)
                    ->where('productCode','like',$product->productCode)
                    ->first();
                if(isNull($cartDe)){
                    return redirect()->back()->with('removeFail','no such product in cart');
                }else{
                    $cartDe->quantity = $cartDe->quantity-1;
                }
                $cartDe->save();
            }else return redirect()->back()->with('removeFail','no cart detected');
            
        });

        $product->quantityInStock = $product->quantityInStock+1;
        $product->save();
        $this->showCartDetail($cusId)->with('Success', 'the item have been remove');
    }

    private function getCartOfSaleRep($salerepID = null){
        $val = $salerepID;
        if($salerepID == null) $val = 'NULL';
        $carts = DB::table('carts')->select()->where('salerepNumber','=',$salerepID)->get();
        $toRe = array();
        if($carts != null){
            foreach ($carts as $cart) {
                $res = DB::table('cartdetails')->select()->where('customerNumber','Like',$cart->customerNumber)->get();
                array_push($toRe,array($cart->customerNumber=>compact('res')));
            }
        }
        return $toRe;
    }

    public function showCartOfSaleRep(){
        $saleId = session()->get('login-id');
        $cartNoRep = $this->getCartOfSaleRep(null);
        $cartWithRep = $this->getCartOfSaleRep($saleId);
        return view('Adminhome',compact('cartNoRep', 'cartWithRep'));
    }
}
