<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(){
        $events = Events::where('deleted_at',null)->latest()->paginate(6);
        return view('events.list',[
            'events' => $events
        ]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        // dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'type' => 'required',
            'organised_by' => 'required',
            'venue' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }

        $data = [
            'name' => $request->name ,
            'type' => $request->type,
            'organised_by' => $request->organised_by,
            'venue' => $request->venue,
            'date' => $request->date,
            'time' => $request->time,
            'description' => $request->description
        ];

        $created = Events::create($data);
        if(!$created){
            redirect()->back()->with('error','Event not created');
        }
        return redirect()->route('events.index')->with('success','Event created successfully');
    }

    public function edit($id){
        $event = Events::where('id',$id)->first();
        return view('events.edit',[
            'event' => $event
        ]);
    }

    public function update(Request $request, $id){
        $event = Events::where('id',$id)->first();
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'type' => 'required',
            'organised_by' => 'required',
            'venur' =>'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }

        $data = [
            'name' => $request->name ,
            'type' => $request->type,
            'organised_by' => $request->organised_by,
            'venue' => $request->venue,
            'date' => $request->date,
            'time' => $request->time,
            'description' => $request->description
        ];

        $updated = $event->update($data);
        if(!$updated){
            redirect()->back()->with('error','Event not updated');
        }
        return redirect()->route('events.index')->with('success','Event updated successfully');
    }


    public function destroy($id){
        $event = Events::where('id',$id)->first();
        $event->delete();
         return redirect()->route('events.index')->with('success','Event deleted successfully');
    }
}
