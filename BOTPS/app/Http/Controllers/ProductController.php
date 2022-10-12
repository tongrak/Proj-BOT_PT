<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(){
        $products = Product::all();
        return view('Catalog', compact('products'));
    }

    public function cart($cusId){
        $carts = DB::select('
            select *
            from carts
            where customerNumber like ' + $cusId);
        return view('cart', ['carts'=>$carts]);
    }

    // public function remove($cartId, $productId){
    //     // needed for insigh
    // }

    // public function addToCart($cusId, $productId){
    //     $product = Product::findOrFail($productId);
    //     // $cart = Cart::where('customerNumber', '=', $cusId)->first();
    //     $carts = DB::select('
    //         select *
    //         from carts
    //         where customerNumber like ' + $cusId +
    //         'and productNumber like ' + $productId
    //     );
    //     $cart = $carts[0];
    //     DB::transaction(function()use($product, $cart , $cusId){
    //         if($cart != null){
    //             $cart->quantity         = $cart->quantity+1;
    //             $cart->save();
    //         }else{
    //             $cart = new Chart();
    //             $cart->customerNumber   = $cusId;
    //             $cart->productNumber    = $product->productCode;
    //             $cart->quantity         = 1;
    //             $cart->pricePerUnit     = $product->buyPrice;
    //             $cart->confirmation     = false;
    //             $cart->save();
    //         }
    //         $product->quantityInStock = $product->quantityInStock-1;
    //         $product->save();
    //     });
    //     return redirect()->back()->with('success', 'product added successfully ');
    // }

}
