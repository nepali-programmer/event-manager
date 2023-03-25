<?php

namespace App\Http\Controllers;

use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class TicketTypeController extends Controller
{    
    public function index()
    {
        if(Gate::denies('is-auth-and-admin')) {
            return redirect('/login');
        }
        $ticket_type = TicketType::orderBy('created_at', 'DESC')->get();
        return view('ticket_type', ['ticket_type' => $ticket_type]);
    }

    public function create(Request $request) {
        if(Gate::denies('is-auth-and-admin')) {
            return redirect('/login');
        }
        $name = $request->input('ticketType');
        $ticket_type = new TicketType();
        $ticket_type->name = $name;
        $ticket_type->save();
        return redirect('/ticket-type');
    }

    public function destroy(Request $request) {
        if(Gate::denies('is-auth-and-admin')) {
            return redirect('/login');
        }
        $id = $request->input('id');
        $ticket_type = TicketType::find($id);
        $ticket_type->delete();
        return redirect('/ticket-type');
    }

    public function update(Request $request) {
        if(Gate::denies('is-auth-and-admin')) {
            return redirect('/login');
        }
        $id = $request->input('id');
        $name = $request->input('ticketType');
        $ticket_type = TicketType::findOrFail($id);
        $ticket_type->name = $name;
        $ticket_type->save();
        return redirect('/ticket-type');
    }
}
