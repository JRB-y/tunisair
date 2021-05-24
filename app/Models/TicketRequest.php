<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketRequest extends Model
{
    use HasFactory;

    protected $table = 'ticket_request';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vol()
    {
        return $this->belongsTo(Vol::class);
    }
}
