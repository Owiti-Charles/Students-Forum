<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use Auth;
use App\Thread;
use App\Note;
use Mockery\Matcher\Not;

class LecturerDiscussionController extends Controller
{
    public function create(){
        return view('lecturer.discussion.create');
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
        return redirect()->action('LecturerDiscussionController@manage');

    }
    public function manage(){
        $user=Auth::user();
        $discussions=$user->discussions;
        return view('lecturer.discussion.manage', compact('discussions'));
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
        return view('lecturer.discussion.view', compact(['discussion', 'threads']));
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
        return back();
    }
    public function deleteThread($id){
        $thread=Thread::find($id);
        $thread->delete();
        return back();

    }
    public function fetchThread(Request $request, $id){
        if($request->ajax()){
            $thread=Thread::find($id);
            return response($thread);
        }
    }
    public function updateThread(Request $request){
        $thread=Thread::find($request->thread_id);
        $thread->update(['thread'=>$request->thread]);
        return back();
    }
    public function viewDiscussions(){
        $discusions=Discussion::where('status', 1)->orderBy('id', 'desc')->paginate(4);

        return view('lecturer.discussion.discussions', compact(['discusions']));

    }
    public function viewDiscussion($id){
        $discussion=Discussion::find($id);
        $threads=$discussion->threads()->paginate(5);
        return view('lecturer.discussion.discussion', compact(['discussion', 'threads']));

    }
    public function createNotes(){
        return view('lecturer.notes.create');
    }
    public function saveNotes(Request $request){
        $this->validate($request,['file'=>'required|max:70000|mimes:pdf,doc,docx', 'description'=>'required']);
        $user=Auth::user();
        $notes=new Note();
        $notes->user_id=Auth::user()->id;
        $notes->faculty_id=$user->faculty->id;
        $notes->course_id=$user->course->id;
        $notes->description=$request->description;
        $notes->title=$request->title;
        $file = $request->file;
        $fileName = $file->getClientOriginalName();
        $notes->mime = $file->getClientMimeType();
        $notes->file=$fileName;
        $notes->save();
        $file->move('notes',$fileName);
        return redirect()->action('LecturerDiscussionController@manageNotes');
    }
    public function manageNotes(){
        $notes=Auth::user()->notes;
        return view('lecturer.notes.manage', compact(['notes']));
    }
    public function deleteNotes($id){

        $notes=Note::find($id);
        $filename=$notes->file;
        $path = public_path().'/notes/'.$filename;
        unlink($path);
        $notes->delete();
        return back();
    }
    public function fetchNotes(Request $request, $id){
        if($request->ajax()){
            $thread=Note::find($id);
            return response($thread);
        }
    }
    public function updateNotes(Request $request){
        $this->validate($request,['file'=>'required|max:70000|mimes:pdf,doc,docx', 'description'=>'required']);
        $notes=Note::find($request->id);
        $filename=$notes->file;
        $path = public_path().'/notes/'.$filename;
        unlink($path);
        $file = $request->file;
        $fileName = $file->getClientOriginalName();
        $notes->mime = $file->getClientMimeType();
        $notes->file=$fileName;
        $file->move('notes',$fileName);
        $notes->update(['title'=>$request->title, 'content'=>$request->content,
            'mime'=>$file->getClientMimeType(), 'file'=>$fileName]);
        return back();
    }

}
