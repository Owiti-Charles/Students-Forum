<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use UxWeb\SweetAlert\SweetAlert;
use Alert;
use App\Event;

class EventsController extends Controller
{
    public function __construct(){
        $this->middleware(['web', 'auth', 'roles']);
    }

    public  function  create(){

        return view('admin.events.create');
    }
    public function  save(Request $request){
        $start=Carbon::parse($request->start_date)->format('Y-m-d H:i:s');
        $end=Carbon::parse($request->end_date)->format('Y-m-d H:i:s');
        $now=Carbon::now()->format('Y-m-d H:i:s');
        if($start<$now){
            return back()->with('dateError', 'You cannot pick on a past date while creating an event ')->withInput();
        }
        if($end<$now){
            return back()->with('endError', 'You cannot pick on a past date while creating an event ')->withInput();
        }
        $user=Auth::user();
        $event= new Event;
        $event->user_id= $user->id;
        $event->name=$request->name;
        $event->description=$request->description;
        $event->venue=$request->venue;
        $event->start_date=$start ;
        $event->end_date= $end;
        if($request->file!=null){
            $file=$request->file;
            $filename=$file->getClientOriginalName();
            $event->mime=$file->getClientMimeType();
            $event->file=$filename;
            $file->move('events', $filename);
        }

        $event->approved=1;


        $descriptions=$request->description;
//        $venue=$request->venue;
//        $start_date=$request->start_date;
//        $end_date=$request->end_date;
//        $description= strip_tags($descriptions);
//        $from=Auth::user()->name;
//        $name=$request->name;
//        $users=User::where('admin', null)->get();
        //  foreach ($users as $user) {
        //  $message=new SmsMessages();
        //  $message->send('From : '. $from .
        //      ','.' Title : '.$name . ','.
        //      ' '. $description, $user->phone);

        // }

        $event->save();
        Alert::success('Event Saved Successfully', 'Saved');
        return redirect()->action('EventsController@manage');
    }
    public  function manage(){
        $user=Auth::user();
        $events=$user->events;
        return view('admin.events.manage', compact('events'));
    }
    public  function  destroy($id){
        $event=Event::find($id);
        $event->delete();
        Alert::success('Event Deleted Successfully', 'Deleted');
        return back();
    }
    public function fetchEvent($id){
        $event=Event::find($id);
        return $event;
    }
    public function eventUpdate(Request $request){
//        dd($request->all());
        $start=Carbon::parse($request->start_date)->format('Y-m-d H:i:s');
        $end=Carbon::parse($request->end_date)->format('Y-m-d H:i:s');
        $event=Event::findorFail($request->id);
        $event->name=$request->name;
        $event->start_date=$start;
        $event->description=$request->description;
        $event->venue=$request->venue;
        $event->end_date=$end;
        $event->save();
        Alert::success('Event Updated Successfully', 'Updated!');
        return back();
    }
        public function updateEvent(Request $request){
        $event=Event::findorFail($request->id);
        if($request->approved=='approved'){
            $event->approved=1;
            $event->reason=null;
            $event->save();
            Alert::success('Successfully Approved!');
        }
        if($request->approved=='deny'){
            $event->approved=2;
            $event->reason=$request->reason;
            $event->save();
            Alert::error('Denied Approval!');
        }
        return back();
    }
}
