<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showCatalog(){
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

    public function showHome(){
        $allProducts = DB::select('
            SELECT productName, productLine, productDescription, proSum
            FROM products as pro, (SELECT productCode, SUM(quantityOrdered) as proSum FROM orderdetails GROUP BY productCode) as gData
            WHERE pro.productCode LIKE gData.productCode
            ORDER BY proSum DESC;');
        $productsArr = $allProducts;
        $products = array($productsArr[0],$productsArr[1],$productsArr[2],$productsArr[3],$productsArr[4],$productsArr[5],$productsArr[6],$productsArr[7],$productsArr[8],$productsArr[9]);
        return view('Home', compact('products'));
    }

    public function showSearch(Request $req, $term){
        // $term = $req->input('term');
        // $strArr = array('%',$term,'%');
        $str = $req->input('term');
        $products = DB::select('SELECT * FROM products WHERE productName LIKE "%' . $str . '%"');
        return view('Catalog', compact('products'));
    }

    // !! Moving to Cart Controller.
    // public function addToCart($productId){
    //     $product = Product::findOrFail($productId);
    //     // $cart = Cart::where('customerNumber', '=', $cusId)->first();
    //     if (!Session::has('login-id')) return view('login');
    //     $cusId = Session::get('login-id');
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
    //             $cart = new Cart();
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
