<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

use App\Http\Requests;
use Sentinel;

//class Fluent{
//
//    protected $count;
//
//    /**
//     * @return mixed
//     */
//    public function getCount()
//    {
//        return $this->count;
//    }
//    public function one (){
//        $this->count = $this->count+1;
//        return $this;
//    }
//
//    public function two()
//    {
//        $this->count+=2;
//        return $this;
//    }
//
//    public function three()
//    {
//        $this->count+=3;
//        return $this;
//    }
//
//
//}

class SentinelController extends Controller
{
    use ValidatesRequests;

    public function showLoginForm() {
//        $fluent = new Fluent();
//        $fluent->one()->two()->three();

//        dd($fluent->getCount());
//        Testowy użytkownik
//        $credentials = [
//            'email'    => 'test@psat.pl',
//            'password' => 'psat',
//        ];
//        $user = Sentinel::registerAndActivate($credentials);
//        Sentinel::logout();
        
        if(Sentinel::check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }
    public function login(Request $request) {
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
        ]);
        
        $credentials = [
            'email'    =>  $request->input('email'),
            'password' =>  $request->input('password'),
        ];
        $remember = is_null($request->input('remember')) ? false : true;

        $user = Sentinel::authenticate($credentials, $remember);

        if(!$user) {
            return redirect()->route('login-form')->with('loginMsg', 'Login failed!');
        }

        return redirect()->route('home');
    }

}
