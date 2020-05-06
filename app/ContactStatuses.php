<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactStatuses extends Model
{
    protected $table = 'contact_statuses';

    protected $fillable = ['name', 'color'];
}
