<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;
class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth', 'roles']);
    }


    public function index(){
        return view('lecturer.home');
    }
    public function updatePassword(){

        return view('lecturer.updatepassword');
    }
    public function firstlogin(Request $request){
        //dd($request->all());
        //dd('here');
        $user = User::find(Auth::id());
        // dd($user);
        $this->validate($request,[
            'password'=>'required|min:4',
            'password_confirmation'=>'required|same:password'
        ]);


        $hashedPassword=$user->password;
        //Change the password

        $user->fill([
            'password' => Hash::make($request->password)
        ])->save();
        $user->passrec=1;
        $user->save();
        return redirect()->route('lecturer.profile');
    }
    public function profile(){
        $user=Auth::user();
        return view('lecturer.profile', compact('user'));
    }
    public function updateBasic(Request $request){
//        $user=User::find(Auth::user()->id);
        $user=Auth::user();
        $user->update(['name'=>$request->name, 'gender'=>$request->gender]);
        return back();
    }
    public function updateContact(Request $request){
        $user=Auth::user();
        $user->update(['phone'=>$request->phone, 'email'=>$request->email]);

        return back();
    }
    public function password(){
        return view('lecturer.password');
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
        return view('lecturer.home');
    }
    public function updatephoto(Request $request){
        if(Auth::user()->image==null){
            $user=Auth::user();
            // dd(Auth::user());

            $image=$request->image;
            $imagename=$image->getClientOriginalName();
            $mime=$image->getClientMimeType();
            $user->image=$imagename;

            $image->move('profile', $imagename);
            $user->save();
            return back();

        }
        else{
            $filename=Auth::user()->image;
            $path = public_path().'/profile/'.$filename;
            //dd($path);
            unlink($path);
            $user=Auth::user();
            // dd(Auth::user());

            $image=$request->image;
            $imagename=$image->getClientOriginalName();
            $mime=$image->getClientMimeType();
            $user->image=$imagename;
            $user->mime=$mime;

            $image->move('profile', $imagename);

            $user->save();
            // dd('deleted');
            return back();


        }

    }
}
