<?php

namespace App\Http\Controllers;
use App\Notifications\RepliedToDiscussion;
use App\Note;
use App\Thread;
use Auth;
use DB;
use App\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function create(){
        return view('student.discussion.create');
    }
    public function save(Request $request)
    {
        $discusion = new Discussion();
        $discusion->user_id = Auth::user()->id;
        $discusion->title = $request->title;
        $discusion->content = $request->content;
        if ($request->file !== null){
            $file = $request->file;
        $fileName = $file->getClientOriginalName();
        $discusion->mime = $file->getClientMimeType();
        $discusion->file=$fileName;
        $file->move('discussions',$fileName);
        }
        $discusion->save();
        return redirect()->action('DiscussionController@manage');

    }
    public function manage(){
        $user=Auth::user();
        $discussions=$user->discussions;
        return view('student.discussion.manage', compact('discussions'));
    }
    public function fetchDiscusion(Request $request, $id){
        if($request->ajax()){
            $discussion=Discussion::find($id);

            return $discussion;
        }
    }
    public  function  update(Request $request){
        $notice=Discussion::findorfail($request->id);
            $notice->title=$request->title;
            $notice->content=$request->content;
            $notice->save();
            return back();

    }
    public function view($id){
        $discussion=Discussion::find($id);
        $threads=$discussion->threads;
        return view('student.discussion.view', compact(['discussion', 'threads']));
    }
    public function destroy($id){
        $notice=Discussion::findorfail($id);
        $notice->delete();
        return back();
    }
    public function createThread(Request $request, $id){
      $disc=  Discussion::find($id);
      $thread=new Thread();
      $thread->discussion_id=$id;
      $thread->user_id=Auth::user()->id;
      $thread->thread=$request->thread;
      $thread->save();
      //auth()->user()->notify(new RepliedToDiscussion());
      //$discussion->user->notify(new RepliedToThread($discussion));
      return back();
    }
    public function deleteThread($id){
        //dd('here');
        $thread=Thread::find($id);
        $thread->delete();
        return back();

    }
    public function fetchThread(Request $request, $id){
        if($request->ajax()){
            $thread=Thread::orderBy('created_at', 'desc')->get($id);
            return response($thread);
        }
    }
    public function updateThread(Request $request){
        $thread=Thread::find($request->thread_id);
        $thread->update(['thread'=>$request->thread]);
        return back();
    }
    public function viewDiscussions(){
        $discusions=Discussion::orderBy('created_at', 'desc')->get();
        $user=Auth::user();
        $faculty_id=$user->faculty->id;
        $course_id=$user->course->id;

        return view('student.discussion.discussions', compact(['discusions', 'faculty_id', 'course_id']));

    }
    public function viewDiscussion($id){
        $discussion=Discussion::find($id);
        $threads=$discussion->threads()->paginate(5);
        return view('student.discussion.discussion', compact(['discussion', 'threads']));

    }
    public function viewNotes(){
        $user=Auth::user();
        $notes=Note::where(['faculty_id'=>$user->faculty_id, 'course_id'=>$user->course->id])->orderBy('created_at', 'desc')->get();
        return view('student.notes', compact(['notes']));
    }
    public function viewNote($id){
        $note=Note::find($id);
        return view('student.view_notes', compact(['note']));
    }
}
