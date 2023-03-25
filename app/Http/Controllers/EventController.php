<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    public function index(Request $request)
    {
        if(Gate::denies('is-auth-and-admin')) {
            return redirect('/login');
        }
        $ticket_type = TicketType::orderBy('created_at', 'DESC')->get();
        $event = Event::orderBy('created_at', 'DESC')->get();        
        return view('event', ['event' => $event, 'ticket_type' => $ticket_type]);
    }
}
