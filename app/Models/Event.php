<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function ticket_type(): HasOne
    {
        return $this->hasOne(TicketType::class, 'id', 'ticket_type_id');
    }
}
