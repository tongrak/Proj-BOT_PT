<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function perform(Request $request)
    {
        Session::flush();
        // $request->session()->forget(['isAdmin', 'login-id']);
        // $request->session()->put('login-id', 0);
        Session::forget(['isAdmin', 'login-id']);
        // Session::put('login-id', 0);
        $request->session()->flush();
        Auth::logout();
        return redirect('/test/login');
    }
}
