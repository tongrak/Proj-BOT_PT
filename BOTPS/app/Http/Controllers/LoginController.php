<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show(){
        return view('login');
    }

    public function showLogin(){
        return view('TestingGround.login');
    }

    public function login(LoginRequest $request)
    {
        // $request->validate();
        $user = DB::table('users')->select()->where([
            ['username', '=', $request->username],
            ['password', '=', $request->password]
        ])->first();
        $admin = DB::table('admins')->select()->where([
            ['username', '=', $request->username],
            ['password', '=', $request->password]
        ])->first();
        //if user is client
        if($user){
            Session::put('login-id', $user->CustomerID);
            Session::put('isAdmin', $user->isAdmin);
            return redirect('/home')->with('success', 'You are logged in as user');
        }
        else{
            //if user is admin
            if($admin){
                Session::put('login-id', $admin->EmployeeID);
                Session::put('isAdmin', $admin->isAdmin);
                return redirect('/test/home')->with('success', 'You are logged in as admin');
            }
            //if username or password is not in database.
            else{
                return redirect('/login')->with('fail', 'Not correct username or password.');
            }
        }   
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }


}
