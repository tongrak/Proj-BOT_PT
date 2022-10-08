<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productline;


class TestController extends Controller
{
    //
    public function show(){
        $products = Product::all();
        return view('TestingGround.TestPage', compact('products'));
        // return view('TestingGround.TestPage');
    }

    public function showCreate(){
        return view('TestingGround.TestCreate');
    }

    public function create(Request $req){
        $proline = new Productline([
            'productLine' => $req->productLine,
            'textDescription' => $req->textDescription,
            'htmlDescription' => 'NULL',
            'image' => 'NULL'
        ]);
        $proline->timestamps=false;
        $proline->save();
        return view('TestingGround.TestCreate');
    }
}
