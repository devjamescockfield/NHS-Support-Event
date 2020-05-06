<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{
    public $table = 'contactus';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'message',
        'assigned_id',
        'status',
        'isClosed',
    ];

    public function status()
    {
        return $this->belongsTo(ContactStatuses::class, 'status');
    }

    public function comments()
    {
        return $this->hasMany(ContactComment::class, 'ticket_id');
    }
}
