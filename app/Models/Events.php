<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $primary_kay = 'id';
    protected $fillable = [
        'name','description','venue','type','organised_by','date','time'
    ];
}
