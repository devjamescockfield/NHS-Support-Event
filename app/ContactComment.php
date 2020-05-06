<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactComment extends Model
{
    protected $fillable = [
        'ticket_id',
        'user_id',
        'comment',
        'admin',
    ];

    public function contactTicket()
    {
        return $this->belongsTo(ContactUS::class);
    }
}
