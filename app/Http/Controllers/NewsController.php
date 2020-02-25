<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Auth;
class NewsController extends Controller
{
public function create(){
    return view('admin.news.create');
}
public function save(Request $request){
    $news=new News();
    $news->user_id=Auth::user()->id;
    $news->title=$request->title;
    $news->content=$request->content;
    $news->save();
    return back();
}
public function manage(){
    $news=News::all();

    return view('admin.news.manage', compact(['news']));
}
    public function fetchNews(Request $request, $id){
        if($request->ajax()){
            $discussion=News::find($id);

            return $discussion;
        }
    }
 public function updateNews(Request $request){

    $news=News::find($request->id);
    $news->update(['title'=>$request->title, 'content'=>$request->content]);
    return back();
 }
  public function viewNews(){
        $news=News::orderBy('created_at', 'desc')->get();
        return view('student.news', compact(['news']));
    }
    public function viewNew($id){
        $new=News::find($id);
        return view('student.view_news', compact(['new']));
    }
}
