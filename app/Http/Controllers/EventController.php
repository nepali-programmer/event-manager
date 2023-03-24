<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(Request $request): View
    {
        if(!Auth::check()) {
            return view('login');
        }
        return view('event');
    }
}
