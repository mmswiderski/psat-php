<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Sentinel;

class SentinelController extends Controller
{
    public function showLoginForm() {
//        Testowy użytkownik
//        $credentials = [
//            'email'    => 'test@psat.pl',
//            'password' => 'psat',
//        ];
//        $user = Sentinel::registerAndActivate($credentials);
        Sentinel::logout();
        
        if(Sentinel::check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = [
            'email'    =>  $request->input('email'),
            'password' =>  $request->input('password'),
        ];
        $remember = is_null($request->input('remember')) ? false : true;

        $user = Sentinel::authenticate($credentials, $remember);

        if(!$user) {
            return redirect()->route('login-form');
        }

        return redirect()->route('home');
    }

}
