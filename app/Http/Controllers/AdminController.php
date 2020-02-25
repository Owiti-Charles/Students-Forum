<?php

namespace App\Http\Controllers;

use App\Course;
use App\Faculty;
use App\Notice;
use App\User;
use App\Discussion;
use DB;
use Auth;
use Hash;
use App\Events\UserWasBanned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Event;
use PDF;
use Charts;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['web', 'auth']);
    }
    public function dashboard(){
        $user=DB::table('users')->find(5);
        $users=new User;
        event(new UserWasBanned($users));

        return view('admin.home');
    }
    public function password(){
        return view('admin.password');
    }
    public function changePassword(Request $request){
        //dd($request->all());
        //dd('here');
        // $user=Auth::user();
        //$user=findorfail($id);
        $user = User::find(Auth::id());
        //dd($user);
        $this->validate($request,[
            'old_password' => 'required',
            'password'=>'required|min:4',
            'password_confirmation'=>'required|same:password'
        ]);


        $hashedPassword=$user->password;
        //dd($hashedPassword);
        $password=$request->old_password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            //Change the password

            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
            //$user->passrec=0;
            $user->save();
        }
        else{
            return back()
                ->with('message','The specified password does not match the database password');
        }
        // Alert::success('Password Changed Successfuly', 'Changed!');
        return view('admin.home');
    }
    public function createUsers(){
        $faculties=Faculty::all();
        return view('admin.users.create', compact('faculties'));
    }

    public function manageUsers(){
        if(Auth::check()){
            $users=User::where('id', '!=', Auth::user()->id)->get();
        }
        else{
            return redirect()->route('logout');
        }

        // dd($users);
        return view('admin.users.manage', compact('users'));
    }
    public function updateUser(Request $request){
        $user=User::findorfail($request->id);
        $user->update(['status'=>$request->status]);
        return back();

    }
    public function deleteUser($id){
        $user=User::find($id);
        $user->delete();
        return back();
    }
    public function createCourses(){
        $faculties=Faculty::all();
        return view('admin.courses.index', compact(['faculties']));
    }
    public function addFaculty(Request $request){
        if($request->ajax()){

            return response(Faculty::create(['faculty'=>$request->faculty_name]));

        }

    }
    public function getCourses(Request $request){
        if($request->ajax()){
            //return response($request->all());
          return response(Course::where('faculty_id',$request->faculty_id)->get());
        }

    }
    public function  addCourse(Request $request){
        if($request->ajax()){
       return response(Course::create(['faculty_id'=>$request->faculty_id, 'course'=>$request->course]));
        }
    }
    public function manageUserNotice(){
        //$users_id=User::where([['admin',null],['role','student']])->pluck('id');
        $user=Auth::user();

        $status=Notice::all()->pluck('approved')->toArray();
        //dd($status);
        $notices =Notice::where('user_id','<>',$user->id)->get();

        $noticeCount =Notice::where('user_id','<>',$user->id)->count();
        //dd($noticeCount);
        $events =Event::where('user_id','<>',$user->id)->get();

        return view('admin.notices.manageUserNotices', compact(['notices','status','events', 'noticeCount','users_ids']));
    }
    public function fetchNotice($id)    {

        $request = new Request();
        $notice = Notice::findorfail($id);
        return $notice;
    }
    public function manageUserEvent(){
        $user=Auth::user();
        $events =Event::where('user_id','<>',$user->id)->get();
        return view('admin.events.manageUserEvents', compact('events'));
    }

    public function kibana(){
        $users = User::select('role_id','faculty_id','course_id')->get();

  
      return response()->json($users);

    }
     public function kibanaDiscussion(){
        $discussions = Discussion::join('users', 'discussions.user_id', '=', 'users.id')->join('faculties','users.faculty_id','=','faculties.id')
        ->select('users.name as name','faculties.faculty as faculty','users.gender','discussions.title as tittle','discussions.content as content')
        ->get();

      return $discussions->toJson();

    }

    public function kibanaThread(){
        $discussions = Discussion::join('threads', 'discussions.id ', '=', 'threads.discussion_id')
        ->select('discussions.title as name','threads.thread as tittle')
        ->get();

      return $discussions->toJson();

    }

     public function generatePDF(){
        $users = User::where('role_id','!=',1)->get();

      $pdf = PDF::loadView('Reports.alluserspdf',['users'=>$users]);
      return $pdf->download('users.pdf');

    }

    public function lecturesPDF(){
        $users = User::where('role_id','=',2)->get();

      $pdf = PDF::loadView('Reports.lec',['users'=>$users]);
      return $pdf->download('Lecturers.pdf');

    }

    public function studentsPDF(){
         $users = User::where('role_id','=',3)->get();

      $pdf = PDF::loadView('Reports.student',['users'=>$users]);
      return $pdf->download('Students list.pdf');
    }
    public function coursesPDF(){
        $courses = DB::table('courses')->join('faculties', 'courses.faculty_id', '=', 'faculties.id')
                     ->get();

      $pdf = PDF::loadView('Reports.coursesPDF',['courses'=>$courses]);
      return $pdf->download('coursesPDF.pdf');

    }

     public function businessPDF(){
        $users = User::where(['faculty_id'=>24,'role_id'=>3])->get();

      $pdf = PDF::loadView('Reports.downloadPDF',['users'=>$users]);
      return $pdf->download('business.pdf');
    }

    public function citPDF(){
        $users = User::where(['faculty_id'=>19,'role_id'=>3])->get();


      $pdf = PDF::loadView('Reports.downloadPDF',['users'=>$users]);
      return $pdf->download('cit.pdf');
    }

    public function engPDF(){
        $users = User::where(['faculty_id'=>20,'role_id'=>3])->get();

      $pdf = PDF::loadView('Reports.downloadPDF',['users'=>$users]);
      return $pdf->download('engineering.pdf');
    }
    public function sciencePDF(){
        $users = User::where(['faculty_id'=>28,'role_id'=>3])->get();

      $pdf = PDF::loadView('Reports.downloadPDF',['users'=>$users]);
      return $pdf->download('science.pdf');
    }
    public function socialPDF(){
        $users = User::where(['faculty_id'=>29,'role_id'=>3])->get();

      $pdf = PDF::loadView('Reports.downloadPDF',['users'=>$users]);
      return $pdf->download('socialscience.pdf');
    }
    public function famecoPDF(){
        $users = User::where(['faculty_id'=>27,'role_id'=>3])->get();

      $pdf = PDF::loadView('Reports.downloadPDF',['users'=>$users]);
      return $pdf->download('fameco.pdf');
    }


    public function discussionPDF(){
        $discussions = Discussion::all();

      $pdf = PDF::loadView('discussionsPDF',['discussions'=>$discussions]);
      return $pdf->download('ReportsdiscussionsPDF.pdf');

    }
    public function activeStudents(){
        $data = DB::table('discussions')->join('users', 'discussions.user_id', '=', 'users.id')->where('role_id','=',3)
             ->select(DB::raw('users.name as discussion'),
                 DB::raw('count(*) as discussion_count'))
             ->orderBy('discussion_count', 'desc')
             ->groupBy(DB::raw("name"))
             ->get();
    $pdf = PDF::loadView('Reports.most',['users'=>$data]);
      return $pdf->download('activePDF.pdf');
  }
    
    
    public function getNewUsersRegistered(){
    $data = DB::table('users')->where('role_id','=',3)
       ->select(
        DB::raw('gender as gender'),
        DB::raw('count(*) as number'))
       ->groupBy('gender')
       ->get();
     $array[] = ['Gender', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->gender, $value->number];
     }
     return view('Reports.RegisteredUsers')->with('gender', json_encode($array));
    }
        //user roles graph

    public function UsersPerRoles(){
    $data = DB::table('users')->join('roles','users.role_id','=','roles.id') 
       ->select(
        DB::raw('roles.name as name '),
        DB::raw('count(*) as number'))
       ->groupBy('name')
       ->get();
     $array[] = ['Role', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->name, $value->number];
     }
     return view('Reports.usersperroles')->with('name', json_encode($array));
    }

    // numcer of strdents per faculty
    public function UsersPerFaculty(){
    $data = DB::table('users')->join('faculties','users.faculty_id','=','faculties.id')->where('role_id','=',3)
       ->select(
        DB::raw('faculties.faculty as faculty'),
        DB::raw('count(*) as students'))
       ->groupBy('faculty')
       ->get();
     $array[] = ['Faculty', 'Students'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->faculty, $value->students];
     }
     return view('Reports.StudentsPerFaculty')->with('faculty', json_encode($array));
    }
        //number of students per course
     public function UsersPerCourse(){
    $data = DB::table('users')->join('courses','users.course_id','=','courses.id')->where('role_id','=',3)
       ->select(
        DB::raw('courses.course as course'),
        DB::raw('count(*) as students'))
       ->groupBy('course')
       ->get();
     $array[] = ['Course', 'students'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->course, $value->students];
     }
     return view('Reports.StudentsPerCourse')->with('course', json_encode($array));
    }
        //no. courses per faculty
    public function CoursesPerFaculty(){
    $data = DB::table('courses')->join('faculties','courses.faculty_id','=','faculties.id')
       ->select(
        DB::raw('faculties.faculty as course'),
        DB::raw('count(*) as courses'))
       ->groupBy('faculty')
       ->get();
     $array[] = ['Course', 'courses'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->course, $value->courses];
     }
     return view('Reports.CoursesPerFaculty')->with('course', json_encode($array));

    }
    public function discussionsLineChart(){
        $discussion = DB::table('discussions')
                    ->select(
                        DB::raw("date(created_at) as date"),
                        DB::raw("count(*) as discussions")) 
                    ->orderBy("created_at")
                    ->groupBy(DB::raw("date(created_at)"))
                    ->get();


        $result[] = ['Date','discussions',];
        foreach ($discussion as $key => $value) {
            $result[++$key] = [$value->date,$value->discussions]; }


        return view('Reports.discussionsLineChart')->with('discussions',json_encode($result));}
}
