<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(): View
    {        
        return view('login');
    }
    public function login(Request $request): View
    {
        $email = $request->input('email');
        $password = $request->input('password');        
        return view('ticket_type');
    }
}
