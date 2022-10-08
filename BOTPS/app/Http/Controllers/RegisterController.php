<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    
    public function show(){
        return view('register');
    }

    public function showTest(){
        return view('TestingGround.registerTest');
    }

    public function registerTest(RegisterRequest $request){
        $firstname = 'firstnameTest1';
        $lastname = 'lastnameTest1';
        $customername = 'test Group1';
        $phone = '0613655550';
        $addressLine1 = 'this is test addressLine 1';
        $addressLine2 = 'this is test addressLine 2';
        $city = 'city';
        $state = 'state';
        $postalCode = '50200';
        $country = 'Thailand';
        $salesRep = null;
        $creditLimit = 0;

        $newCustomer = new Customer;
        $newCustomer->customerNumber = (DB::select('select customerNumber from customer')->orderBy('customerNumber', 'desc')->first()) +1;


        $newuser = new User;
        $newuser->username = 'test1';
        $newuser->password = 'test Group';
    }

    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        auth()->login($user);
        return redirect('/')->with('success', 'Account successfully registered');
    }

}
