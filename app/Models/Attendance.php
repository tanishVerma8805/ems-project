<?php

namespace App\Models;

use App\Models\Attendance;
use App\Models\Events;
use App\Models\Students;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use SoftDeletes;
    protected $primary_key = 'id';
    protected $fillable = [
        'event_id','student_id','attendance_status'
    ];

    public function student(){
        return $this->belongsTo(Students::class);
    }

    public function event(){
        return $this->belongsTo(Events::class);
    }

}

