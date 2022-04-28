<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //
    public function English() {
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }

    public function Lithuanian() {
        session()->get('language');
        session()->forget('language');
        Session::put('language','lithuanian');
        return redirect()->back();
    }
}
