<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;

class CommissionController extends Controller
{
    public function customerConfirm(){
        if (!Session::has('login-id')) return view('login');
        $cusId = Session::get('login-id');
        $cart = DB::table('carts')->where('customerNumber','Like',$cusId)->first();
        $cart->custoConfirm = true;
        $cart->save();
        return redirect()->back()->with('success', 'cart have been confirm');
    }

    public function salerepConfirm($cartID){
        $cart = DB::table('carts')->where('cartNumber','Like',$cartID)->first();
        $cart->salerepNumber = true;
        $cart->save();
        return view('Home')->with('success', 'cart have been confirm');

    }
}
