<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{    
    public function index()
    {        
        /////////////////////        
        $user = new User();
        $user->password = Hash::make('asd12345');
        $user->email = 'admin@gmail.com';
        $user->name = 'admin';
        $user->save();
        /////////////////////
        // $user = User::find(2);
        // $user->password = Hash::make('asd12345');
        // $user->save();        
        /////////////////////                        
        if(Gate::allows('is-auth-and-admin')) {
            return redirect('/');
        }
        return view('login', ['login_error' => false, 'email' => '', 'password' => '']);
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $is_auth = Auth::attempt([
            'email' => $email,
            'password' => $password,
            'is_admin' => 1,
        ]);
        if($is_auth) {
            return redirect('/');
        }
        return view('login', ['login_error' => true, 'email' => $email, 'password' => $password]);
    }
}
