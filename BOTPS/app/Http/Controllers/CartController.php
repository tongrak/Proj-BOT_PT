<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartDetail;

use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    public function showCartDetail($cusNum){
        $cartNum = DB::table('carts')->where('customerNumber', 'like', $cusNum)->first('cartNumber');
        $cartDetails = DB::table('cartdetails')->where('cartNumber','like',$cartNum)->get();
        return view('Cart', ['cartdetails'=>$cartDetails]);
    }

    public function addToCart($productId){
        $product = Product::findOrFail($productId);
        if (!Session::has('login-id')) return view('login');
        $cusId = Session::get('login-id');
        $salerep = DB::table('customer')->where('customerNumber','like',$cusId)->first('salesRepEmployeeNumber');
        $cart = DB::table('carts')->where('customerNumber','Like',$cusId)->first();
        DB::transaction(function()use($product, $cart , $cusId, $salerep){
            if($cart != null){
                $cartDe = DB::table('cartdetails')
                    ->where('cartNumber','like',$cart->cartNumber)
                    ->where('productCode','like',$product->productCode)
                    ->first();
                if(isNull($cartDe)){
                    $cartDe = new CartDetail();
                    $cartDe->cartNumber = $cart->cartNumber;
                    $cartDe->productCode= $product->productCode;
                    $cartDe->quantity   = 1;
                }else{
                    $cartDe->quantity   = $cartDe->quantity+1;
                }
                $cartDe->save();

            }else{
                $cart = new Cart();
                $cart->customerNumber   = $cusId;
                $newCartNum = DB::table('carts')->get()->count() + 1;
                $cart->cartNumber       = $newCartNum;
                $cart->custoConfirm     = False;
                $cart->saleConfirm      = False;
                $cart->salerepNumber    = $salerep;
                $cart->save();

                $cartDetail = new CartDetail();
                $cartDetail->cartNumber = $newCartNum;
                $cartDetail->productCode= $product->productCode;
                $cartDetail->quantity   = 1;
                $cartDetail->save();
            }
                $product->quantityInStock = $product->quantityInStock-1;
                $product->save();
        });
        
        $this->showCartDetail($cusId);
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
        $this->showCartDetail($cusId);
    }

    private function getCartFullDetail($salerepID = null){
        $val = $salerepID;
        if(isNull($salerepID)) $val = 'NULL';
        $toRe = DB::select('
            SELECT customerNumber, productCode, quantity
            FROM (SELECT * FROM carts WHERE salerepNumber like '.$val.') as C
            JOIN cartdetails ON C.cartNumber = cartdetails.cartNumber
        ');
        return $toRe;
    }

    public function showCart($salerepID){
        $cartNoRep = $this->getCartFullDetail();
        $cartWithRep = $this->getCartFullDetail($salerepID);
        return view('home',compact($cartNoRep),compact($cartWithRep));
    }

    
}
