<?php

namespace App\Http\Controllers;

use App\Timetable;
use Illuminate\Http\Request;
use App\Faculty;
use App\Master;
use Auth;
use Alert;
class TimetablesController extends Controller
{
    public function __construct(){
        $this->middleware(['web', 'auth']);
    }

    public  function create(){
        $faculties=Faculty::all();
        return view('admin.timetables.create', compact('faculties'));
    }
    public function createMaster(Request $request){
        $master=new Master;

        // $formatInput=$request->except('file');
        $master->user_id=Auth::user()->id;
        $master->faculty_id=$request->faculty_id;
        $master->academic_year=$request->academic_year;
        $master->semester=$request->semester;
        $file=$request->file;
        //$master->approved=1;
        $fileName=$file->getClientOriginalName();
        $master->file=$file->getClientOriginalName();
        $master->mime=$file->getClientMimeType();
        // dd($master);
        $file->move('timetables',$fileName);
        $master->save();
        Alert::success('Timetable Saved', 'Created!');
        return redirect()->action('TimetablesController@manage');

    }
    public  function createTimetable(Request $request){
        $timetable=new Timetable;
        $timetable->user_id=Auth::user()->id;
        $timetable->faculty_id=$request->faculty_id;
        $timetable->course_id=$request->course_id;
        $timetable->year_of_study=$request->year;
        $timetable->academic_year=$request->academic_year;
        $timetable->semester=$request->semester;
        $file=$request->file;
        $fileName=$file->getClientOriginalName();
        $timetable->mime=$file->getClientMimeType();
        $timetable->file=$fileName;
        $file->move('timetables',$fileName);
        $timetable->approved=1;
        $timetable->save();
        Alert::success('Timetable Saved', 'Created!');
        return redirect()->action('TimetablesController@manage');
    }

    public  function manage(){

        $masters=Master::all();
        $timetables=Timetable::all();
        return view('admin.timetables.manage',compact(['masters', 'timetables']));
    }
    public  function destroyMaster($id){

        $master= Master::findorFail($id);
        //dd($master);
        $master->delete();
        Alert::success('Timetable Record Successfully','Deleted!');
        return back();
    }
    public function destroyTimetable($id){

        $timetable=Timetable::findorFail($id);
       // dd($timetable);
        $timetable->delete();
        Alert::success('Timetable Record Successfully','Deleted!');
        return back();
    }

}
