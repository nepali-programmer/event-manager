<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventApiController extends Controller
{
    public function list(Request $request)
    {
        $ticket_type = Event::with('ticket_type')->orderBy('created_at', 'DESC');

        //address
        $address = $request->input('address');
        if($address != null && $address != '') {
            $ticket_type = $ticket_type->where('address', 'LIKE', '%'.$address.'%');
        }
        //start date
        $start_date = $request->input('start_date');
        if($start_date != null && $start_date != '') {
            $ticket_type = $ticket_type->where('start_date', '=', $start_date);
        }

        //end date
        $end_date = $request->input('end_date');
        if($end_date != null && $end_date != '') {
            $ticket_type = $ticket_type->where('end_date', '=', $end_date);
        }

        $ticket_type = $ticket_type->get();
        return $ticket_type;
    }
}
