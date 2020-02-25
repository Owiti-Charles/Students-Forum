<?php

namespace App\Http\Controllers;

use App\Http\Middleware\authen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use UxWeb\SweetAlert\SweetAlert;
use Alert;
use Illuminate\Support\Facades\DB;
use App\Event;

class UserEventsController extends Controller
{
    public function __construct(){
        $this->middleware(['web', 'auth','roles']);
    }

    public  function  create(){

        return view('student.events.create');
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
        $event->start_date=$start;
        $event->end_date= $end;
        if($request->file!=null){
            $file=$request->file;
            $filename=$file->getClientOriginalName();
            $event->mime=$file->getClientMimeType();
            $event->file=$filename;
            $file->move('events', $filename);
        }

        $event->approved=0;


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
        //  $message->send('From admin: '. $from .
        //      ','.' Title : '.$name . ','.
        //      ' '. $description, $user->phone);

        // }

        $event->save();
        Alert::success('Event Saved Successfully', 'Saved');
        return redirect()->action('UserEventsController@manage');
    }
    public  function manage(){
        $user=Auth::user();
        $events=$user->events;
        // dd($events);
        return view('student.events.manage', compact('events'));
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
        $event->description=$request->description;
        $event->venue=$request->venue;
        $event->start_date=$start;
        $event->end_date=$end;
        $event->approved=0;
        $event->save();
        Alert::success('Event Updated Successfully', 'Updated!');
        return back();
    }

    public function showreg($id){
        $event=Event::findorfail($id);
        return view('frontend.registerEvent', compact('event'));
    }
   public function saveParticipant(Request $request, $id){
       // dd($request->all());
       $this->validate($request, [
           'name'=>'required|min:6|max:20',
           'email'=>'required|min:4',
           'phone'=>'required|numeric|min:10',
           'id_no'=>'required|numeric|min:4'
       ]);
       $event=Event::findorFail($id);

       $userid=Auth::user()->id;
       $checkreg=DB::table('participants')->where(['user_id'=>$userid,
           'event_id'=>$event->id])->first();

       if($checkreg!=null){
           Alert::warning('You have already Registered to the Event', 'Participant!')->persistent('OK');
           return back()->withErrors(['You have already registered for this event']);
       }
     DB::table('participants')->insert(['user_id'=>$userid,
           'event_id'=>$event->id,'status'=>'attending', 'name'=>$request->name,'email'=>$request->email,
           'phone'=>$request->phone, 'id_no'=>$request->id_no]);

       Alert::success('You have Registered to the Event', 'Registered!');
       return redirect()->back();
   }

}
