<?php

namespace App\Http\Controllers;

use App\Models\Registrations;
use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function dashboard(){
        $student = Students::where('user_id',auth()->id())->first();
        $registered_events = Registrations::with('event')->where('student_id',$student->id)->latest()->get();

        return view('students.dashboard',[
            'registered_events' => $registered_events
        ]);
    }

    public function profile(){
        $user = User::where('id',auth()->id())->first();
        $student = Students::where('user_id',$user->id)->first();
        return view('students.profile',[
            'user' => $user,
            'student' => $student
        ]);
    }

    public function save(Request $request){
       $validator = Validator::make($request->all(),[
        'roll_no' => 'required',
        'course' => 'required',
        'department' => 'required',
       ]);

       if($validator->fails()){
        return redirect()->back()->withInput()->withErrors($validator);
       }
        $student = Students::where('user_id',$request->user_id)->first();
       
        if(!$student){
            $data = [
                'user_id' => $request->user_id,
                'roll_no' => $request->roll_no,
                'course' => $request->course,
                'department' => $request->department,
            ];

            $saved = Students::create($data);

            if(!$saved){
                return redirect()->route('students.profile')->with('error','Profile not saved');
            }else{
                return redirect()->route('students.profile')->with('success','Profile saved');
            }
        }else{
            $data = [
                'user_id' => $request->user_id,
                'roll_no' => $request->roll_no,
                'course' => $request->course,
                'deparment' => $request->deparment,
            ];

            $saved = $student->update($data);

            if(!$saved){
                return redirect()->route('students.profile')->with('error','Profile not saved');
            }else{
                return redirect()->route('students.profile')->with('success','Profile saved');
            }
        }
    }
}
