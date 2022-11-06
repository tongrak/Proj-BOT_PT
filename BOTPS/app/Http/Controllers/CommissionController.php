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
        $cart = DB::table('carts')->where('customerNumber','=',$customerID)->first();
        $cartDetails = DB::table('cartdetails')->where('customerNumber', '=', $customerID)->get();
        DB::transaction(function () use($cart, $cartDetails, $customerID) {
            
        });
    }

    public function salerepConfirm($customerNum){
        $cart = Cart::where('customerNumber','=',$customerNum)->first();
        $cartDetails = CartDetail::where('customerNumber','=',$customerNum)->get();
        DB::transaction(function()use($cart,$cartDetails){
            foreach($cartDetails as $cd){
                // TODO: add to orderdetail

                $cd->delete();
            }
            $cart->custoConfirm = false; 
            $cart->salerepNumber = false; 
            $cart->save();
        });
        
        return view('Home')->with('success', 'cart have been confirm');
    }

    public function insertSaleRep($customerID){
        $adminID = Session::get('login-id');
        $customer = Customer::find($customerID)->first();
        DB::transaction(function () use($adminID, $customer) {
            $customer->salesRepEmployeeNumber = $adminID;
            $customer->save();
        });
        return view('Adminhome')->with('success', 'SaleRep has been add to customer.');
    }
}
