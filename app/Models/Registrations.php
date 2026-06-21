<?php

namespace App\Models;

use App\Models\Events;
use App\Models\Students;
use App\Models\User;
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

    public function student(){
        return $this->belongsTo(Students::class);
    }


}
