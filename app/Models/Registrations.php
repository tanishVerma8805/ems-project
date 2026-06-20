<?php

namespace App\Models;

use App\Models\Events;
use Illuminate\Database\Eloquent\Model;

class Registrations extends Model
{
    protected $primary_kay = 'id';
    protected $fillable = [
        'event_id','student_id'
    ];

    public function event(){
        return $this->belongsTo(Events::class);
    }
}
