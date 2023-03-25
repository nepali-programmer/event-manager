<?php

namespace App\Http\Controllers;

use App\Models\TicketType;
use Illuminate\Support\Facades\Gate;

class TicketTypeApiController extends Controller
{    
    public function list()
    {
        $ticket_type = TicketType::orderBy('created_at', 'DESC')->get();
        return $ticket_type;
    }
}
