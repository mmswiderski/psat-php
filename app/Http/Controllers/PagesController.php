<?php

namespace App\Http\Controllers;

//use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psat\Fixerio;


//class PagesController extends BaseController {
class PagesController extends Controller {
    public function mainPage() {
        //pobrać dane o dostępnych walutach, żeby wygenerować selecty
        $fixer = new Fixerio();
        $currencies = $fixer->getCurrencies();
        return view('pages.mainpage');
    }

    public function convert(Request $request) {
    //Bartek - rozwiązanie z wykorzystaniem Facady Validator
    $validator = Validator::make($request->all(),
        [
            'kwota' => 'required|numeric',
        ]
    );

    if ($validator->fails()) {
        return back()
            ->withErrors($validator);
    }
        //publiczne api

    }
}
