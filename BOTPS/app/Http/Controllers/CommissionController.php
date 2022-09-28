<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommissionController extends Controller
{
    public function show(){
        // return view('commission')
    }

    public function confirm($id){
        $carts = DB::select('
            select *
            from carts
            customerNumber like ' + $id
        );
        $cart = $carts[0];
        $cart->confirmation = true;
        return redirect("/cart")->with('success', 'cart have been confirm');
    }

    // public function endComm($id){

    // }
}
