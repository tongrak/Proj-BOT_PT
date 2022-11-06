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
        $cartStatus = DB::table('carts')->where('customerNumber','=',$cusId)->select('custoConfirm')->first();
        $cartDetails = DB::select('
            SELECT p.productCode, p.productVendor, p.productName, p.productDescription, p.buyPrice, cd.quantity
            FROM products as p, cartdetails as cd
            WHERE cd.productCode = p.productCode AND cd.customerNumber =
        ' . $cusId);

        return view('cart', compact('cartDetails', 'cartStatus'));
    }

    public function addToCart($pId){
        $product =  Product::findOrFail($pId);
        if (!session()->has('login-id')) return view('login')->with('Login required');
        $cusId = session()->get('login-id');
        $salerep = DB::table('customers')->where('customerNumber','=',$cusId)->first('salesRepEmployeeNumber');
        $cart = DB::table('carts')->where('customerNumber','=',$cusId)->first();
        if(!$cart->custoConfirm){
            DB::transaction(function()use($pId, $product, $cart , $cusId, $salerep){
                if($cart != null){
                    $cartDe = DB::table('cartdetails')->where('customerNumber','=',$cusId)->where('productCode','=', $pId)->first();
                    if($cartDe == null){
                        $cartDe = new CartDetail();
                        $cartDe->customerNumber = $cart->customerNumber;
                        $cartDe->productCode= $pId;
                        $cartDe->quantity   = 1;
                        $cartDe->save();
                    }else{
                        $newQuanity = $cartDe->quantity +1;
                        DB::table('cartdetails')->where('customerNumber','=',$cusId)->where('productCode','=', $pId)->update(['quantity'=>$newQuanity]);
                    }
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
        }else redirect()->back()->with('Cart Comfirmation Constraints', 'Your cart had been already comfirm. Please wait for sale representation or cancel your cart');
        
        return redirect()->back()->with('add product succ');
    }

    public function removeInCart($productId){
        $product = Product::findOrFail($productId);
        if (!Session::has('login-id')) return view('login');
        $cusId = Session::get('login-id');
        echo($cusId);
        DB::transaction(function()use($product, $cusId){
                $cartDe = DB::table('cartdetails')->where('customerNumber','=',$cusId)->where('productCode','=', $product->productCode)->first();
                if($cartDe == null){
                    return redirect()->back()->with('removeFail','no such product in cart');
                }else if($cartDe->quantity > 1){
                    $newQuanity = $cartDe->quantity-1;
                    DB::table('cartdetails')->where('customerNumber','=',$cusId)->where('productCode','=', $product->productCode)
                    ->update(['quantity'=>$newQuanity]);
                }else{
                    DB::table('cartdetails')->where('customerNumber','=',$cusId)->where('productCode','=', $product->productCode)->delete();
                }
                
                $product->quantityInStock = $product->quantityInStock+1;
            $product->save();
        });
        return redirect()->back()->with('Success', 'the item have been remove');
    }

    private function getCartOfSaleRep($salerepID = null){
        $val = $salerepID;
        if($salerepID == null) $val = 'NULL';
        $carts = DB::table('carts')->select()->where('salerepNumber','=',$salerepID)->where('custoConfirm','=',true)->get();
        $toRe = array();
        if($carts != null){
            foreach ($carts as $cart) {
                $res = DB::select('
                    SELECT p.productName, p.productCode, quantity, p.buyPrice as pricePerUnit, quantity * p.buyPrice as totalPrice
                    FROM cartdetails as cd, products as p
                    WHERE cd.productCode = p.productCode AND cd.customerNumber =' . $cart->customerNumber);
                if($res != null) 
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
