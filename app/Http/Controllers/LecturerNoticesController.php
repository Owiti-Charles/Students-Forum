<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Notice;
use Auth;
use Alert;

class LecturerNoticesController extends Controller
{
    public function __construct(){
        $this->middleware([ 'web', 'auth','roles']);
    }
    public  function  create(){
        return view('lecturer.notices.create');
    }

    public  function saveNotice(Request $request){

        //dd($request->all());
        if($request->type=='text_notice'){

            $notice=new Notice;
            $notice->user_id=Auth::user()->id;
            $notice->type=$request->type;
            $notice->content=$request->content;
            $notice->title=$request->title;
            $notice->approved=1;
            $notice->save();
        }

        if($request->type=='file_upload'){
            //dd($request->all());
            //dd($request->file);
            $notice=new Notice;
            $notice->user_id=Auth::user()->id;
            $notice->type=$request->type;
            $notice->title=$request->title;
            $notice->description=$request->description;
            $file=$request->file;

            $fileName=$file->getClientOriginalName();

            $notice->mime=$file->getClientMimeType();

            $notice->file=$fileName;
            $notice->approved=1;
            $file->move('notices',$fileName);

            $notice->save();


        }
        Alert::success('Your notice has been saved', 'Notice Created!');
        return redirect()->action("LecturerNoticesController@manageNotice");
    }
    public  function  manageNotice(){
        $user=Auth::user();
        $notices=$user->notices;
        return view('lecturer.notices.manage', compact('notices'));

    }

    public  function  update(Request $request){
        $notice=Notice::findorfail($request->id);
        //dd($notice);
        if($notice->type=='text_notice'){
            $notice->title=$request->title;
            $notice->content=$request->content;
            $notice->save();
            return back();
        }
        if($notice->type=='file_upload'){
            $notice->title=$request->title;
            $notice->description=$request->description;
            $notice->save();
            return back();
        }
        Alert::success('Notice Updated!', 'Success!');

    }
    public  function  fetchNotice($id){
        $request = new Request();
        $notice = Notice::findorfail($id);
        return $notice;
    }

    public function destroy($id){
        $notice=Notice::findorfail($id);
        $notice->delete();
        Alert::success('Notice Deleted!','Deleted')->autoclose(2000);
        return back();
    }

}


