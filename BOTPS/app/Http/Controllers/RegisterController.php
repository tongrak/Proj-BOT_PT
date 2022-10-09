<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class RegisterController extends Controller
{
    
    public function show(){
        return view('register');
    }

    public function showTest(){
        return view('TestingGround.registerTest');
    }

    public function registerTest(Request $request){
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
        $creditLimit = '0.0';
        $arrCustomerID = DB::table('customers')->select('customerNumber')->orderBy('customerNumber', 'desc')->first();
        $customerID = ($arrCustomerID->customerNumber)+1;

        $newCustomer = new Customer;
        $newCustomer->customerNumber = $customerID;
        $newCustomer->customerName = $customername;
        $newCustomer->contactLastName = $lastname;
        $newCustomer->contactFirstName = $firstname;
        $newCustomer->phone = $phone;
        $newCustomer->addressLine1 = $addressLine1;
        $newCustomer->addressLine2 = $addressLine2;
        $newCustomer->city = $city;
        $newCustomer->state = $state;
        $newCustomer->postalCode = $postalCode;
        $newCustomer->country = $country;
        $newCustomer->salesRepEmployeeNumber = $salesRep;
        $newCustomer->creditLimit = $creditLimit;
        $newCustomer->timestamps=false;
        $newCustomer->save();

        $newUser = new User;
        $newUser->customerID = $customerID;
        $newUser->username = $lastname;
        $newUser->password = $customername;
        $newUser->isAdmin = 0;
        $newUser->timestamps=false;
        $newUser->save();
        //if can register
        $request->session()->put('login-id', $customerID);
        $request->session()->put('isAdmin', 0);
        return redirect('test/home');
    }

    public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        auth()->login($user);
        return redirect('/')->with('success', 'Account successfully registered');
    }

}
