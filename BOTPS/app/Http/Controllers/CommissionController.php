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
    public function customerConfirm(){
        // if (!Session::has('login-id')) return view('login');
        $cusId = Session::get('login-id');
        $cart = Cart::table('carts')->where('customerNumber','=',$cusId)->first();
        DB::transaction(function () use($cusId, $cart) {
            $cart->custoConfirm = true;
            $cart->save();
        });
        return redirect()->back()->with('success', 'cart have been confirm');
    }

    public function salerepConfirm($customerNum){
        // $cart = Cart::find($customerNum)->first();
        // $cartDetail = CartDetail::find($customerNum)->get();
        // DB::transaction()
        // $cart->custoConfirm = true;
        // $cart->save();
        // return view('Home')->with('success', 'cart have been confirm');
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
