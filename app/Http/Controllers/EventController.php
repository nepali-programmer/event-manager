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
        $event = Event::with(['ticket_type'])->orderBy('created_at', 'DESC')->get();                   
        return view('event', ['event' => $event, 'ticket_type' => $ticket_type]);
    }

    public function create(Request $request)
    {
        if(Gate::denies('is-auth-and-admin')) {
            return redirect('/login');
        }
        $name = $request->input('name');        
        $description = $request->input('description');        
        $address = $request->input('address');        
        $start_date = $request->input('startDate');        
        $end_date = $request->input('endDate');        
        $ticket_type = $request->input('ticketType');        
        $price = $request->input('price');        
        $picture = $request->input('picture');   
        ///////////
        $event = new Event();
        $event->name = $name;  
        $event->description = $description;  
        $event->address = $address;  
        $event->start_date = $start_date;  
        $event->end_date = $end_date;
        $event->ticket_type_id = $ticket_type;
        $event->price = $price;
        $event->event_picture = $picture;
        $event->save();
        return redirect('/');
    }

    public function destroy(Request $request) {
        if(Gate::denies('is-auth-and-admin')) {
            return redirect('/login');
        }
        $id = $request->input('id');
        $event = Event::find($id);
        $event->delete();
        return redirect('/');
    }

    public function detail(int $id) {
        if(Gate::denies('is-auth-and-admin')) {
            return redirect('/login');
        }
        $event = Event::with('ticket_type')->find($id);        
        if($event == null) {
            return redirect('/');
        }
        return view('event_detail', ['event'=>$event]);
    }

    public function update_index(int $id) {
        if(Gate::denies('is-auth-and-admin')) {
            return redirect('/login');
        }
        $event = Event::find($id);
        if($event == null) {
            return redirect('/');
        }
        $ticket_type = TicketType::orderBy('created_at', 'DESC')->get();
        return view('event_edit', ['event'=>$event, 'ticket_type'=>$ticket_type]);
    }

    public function update(int $id, Request $request) {
        if(Gate::denies('is-auth-and-admin')) {
            return redirect('/login');
        }
        $id = $request->input('id');
        $name = $request->input('name');        
        $description = $request->input('description');        
        $address = $request->input('address');        
        $start_date = $request->input('startDate');        
        $end_date = $request->input('endDate');        
        $ticket_type = $request->input('ticketType');        
        $price = $request->input('price');
        ///////////
        $event = Event::find($id);
        $event->name = $name;  
        $event->description = $description;  
        $event->address = $address;  
        $event->start_date = $start_date;  
        $event->end_date = $end_date;
        $event->ticket_type_id = $ticket_type;
        $event->price = $price;        
        $event->save();   
        return redirect('/');
    }
}
