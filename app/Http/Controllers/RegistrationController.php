<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Registrations;
use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function index(){
        $student = Students::where('user_id',auth()->id())->first();
        // $registrations = Registrations::where('student_id',$student->id)->get();
        $registrations = Registrations::with('event')->where('student_id', $student->id)->latest()->get();
        return view('registrations.list',[
            'registrations' => $registrations
        ]);
    }


    public function create($id){
        $event = Events::where('id',$id)->first();
        $student = Students::where('user_id',auth()->id())->first();
        $user = User::where('id',auth()->id())->first();
        return view('registrations.create',[
            'event' => $event,
            'student' => $student,
            'user' => $user
        ]);
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'event_id' => 'required',
            'student_id' => 'required',
        ]);

       if($validator->fails()){
        return redirect()->back()->withInput()->withErrors($validator);
       }
       
            $data = [
                'event_id' => $request->event_id,
                'student_id' => $request->student_id,
            ];

            $created = Registrations::create($data);

            if(!$created){
                return redirect()->route('registrations.index')->with('error','Not Registered');
            }else{
                return redirect()->route('registrations.index')->with('success','Registration Successful');
            }

    }

}
