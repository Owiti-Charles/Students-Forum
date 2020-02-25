<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use Auth;
use App\Thread;

class AdministratorDiscussionController extends Controller
{
    public function create(){
        return view('admin.discussion.create');
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
        return redirect()->action('AdministratorDiscussionController@manage');

    }
    public function manage(){
        $user=Auth::user();
        $discussions=$user->discussions;
        return view('admin.discussion.manage', compact('discussions'));
    }
    public function fetchDiscusion(Request $request, $id){
        if($request->ajax()){
            $discussion=Discussion::find($id);

            return $discussion;
        }
    }
    public  function  update(Request $request){
        $disc=Discussion::findorfail($request->id);
        $disc->title=$request->title;
        $disc->content=$request->content;
        $disc->save();
        return back();

    }
    public function view($id){
        $discussion=Discussion::find($id);
        $threads=$discussion->threads;
        return view('admin.discussion.view', compact(['discussion', 'threads']));
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

        return view('admin.discussion.discussions', compact(['discusions']));

    }
    public function viewDiscussion($id){
        $discussion=Discussion::find($id);
        $threads=$discussion->threads()->paginate(5);
        return view('admin.discussion.discussion', compact(['discussion', 'threads']));

    }
    public function manageUserDiscussions(){
        $discussions=Discussion::where('user_id', '!=', Auth::user()->id)->get();
        return view('admin.discussion.manageUserDiscussions', compact('discussions'));
    }
    public function viewToApprove($id){
        $discussion=Discussion::find($id);
        $threads=$discussion->threads()->paginate(5);
        return view('admin.discussion.viewToApprove', compact(['discussion', 'threads']));
    }
    public function updateUserDisc(Request $request){
        $discussion=Discussion::find($request->id);
        $discussion->update(['status'=>$request->status]);
        return back();
    }
}
