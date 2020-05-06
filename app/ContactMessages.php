<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMessages extends Model
{
    protected $fillable = [
        'description',
        'language',
        'message',
        'created_by',
    ];
}
