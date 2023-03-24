<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(Request $request): View
    {
        if(Auth::check()) {
            return view('event');
        }
        return view('login');
    }
}
