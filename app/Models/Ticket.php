<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = ['title', 'description', 'status','assigned_to', 'type_id'];

    /**
     * Get the user who created the ticket.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user assigned to the ticket.
     */
    public function assignedUser()
    {
        return $this->belongsTo(Administrator::class, 'assigned_to');
    }

    /**
     * Get the type of the ticket.
     */
    public function type()
    {
        return $this->belongsTo(TicketType::class, 'type_id');
    }
}
