<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function dashboard(){
        $events = Events::where('deleted_at',null)->latest()->get();
        $event_count = Events::where('deleted_at',null)->count();
        return view('teachers.dashboard',[
            'events' => $events,
            'event_count' => $event_count
        ]);
    }
}
