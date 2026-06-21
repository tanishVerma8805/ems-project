<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Events;
use App\Models\Registrations;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function index(){
        $events = Events::where('deleted_at',null)->get();

        $present = Attendance::where('attendance_status','present')->count();
        $totalRegistered = Registrations::where('deleted_at',null)->count();
        $presentRate = ($present / $totalRegistered) * 100 ;

        $totalRecords = Attendance::where('deleted_at',null)->count();
        // dd($presentRate);
        return view('attendance.list',[
            'events' => $events,
            'presentRate' => $presentRate,
            'totalRecords' => $totalRecords
        ]);
    }

    public function show($id){
        $registrations = Registrations::with(['event','student.user'])->where('event_id', $id)->get();
        $event = Events::where('id',$id)->first();
        $attendance = Attendance::where('event_id', $id)->pluck('attendance_status', 'student_id');
        // dd($attendance);
        return view('attendance.show',[
            'registrations' => $registrations,
            'event' => $event,
            'attendance' => $attendance
        ]);
    }

    public function store(Request $request, $id)
{
    $allStudents = Registrations::where('event_id', $request->event_id)
        ->pluck('student_id')
        ->toArray();

    foreach ($allStudents as $student_id) {

        $status = in_array($student_id, $request->attendance ?? [])
            ? 'present'
            : 'absent';

        Attendance::updateOrCreate(
            [
                'event_id' => $request->event_id,
                'student_id' => $student_id,
            ],
            [
                'attendance_status' => $status
            ]
        );
    }

    return redirect()
        ->route('attendance.show', $id)
        ->with('success', 'Attendance marked successfully');
}
}


