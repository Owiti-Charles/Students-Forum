<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\News;
use Illuminate\Http\Request;
use App\Event;
use App\Notice;
use Carbon\Carbon;
use App\Course;
class FrontEndController extends Controller
{
    public function index(){
        $news=News::all();
        return view('frontend.index', compact(['news']));
    }

    public function lecturer(){
        $faculties=Faculty::all();
        return view('frontend.lecturer_register', compact(['faculties']));
    }
    public function getCourses(Request $request){
        if($request->ajax()){
            //return response($request->all());
            return response(Course::where('faculty_id',$request->faculty_id)->get());
        }

    }
    public function student(){
        $faculties=Faculty::all();
        return view('frontend.student_register', compact(['faculties']));
    }

}
