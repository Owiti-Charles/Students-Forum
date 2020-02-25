<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Mail\VerifyMail;
use App\Tasker;
use App\VerifyUser;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Return_;

class RegisterController extends Controller
{

    public function register(Request $request){
        $this->validate($request, ['name'=>'required','course_id'=>'required','faculty_id'=>'required',  'username'=>'required|unique:users', 'email'=>'required|unique:users', 'id_no'=>'unique:users', 'password'=>'required|min:6|confirmed']);
       // dd($request->all());
        if($request->role=='lecturer'){
            $user=new User();
            $user->name=$request->name;
            $user->username= $request->username;
            $user->role_id=2;
            $user->status=1;
            $user->passrec=1;
            $user->faculty_id=$request->faculty_id;
            $user->course_id=$request->course_id;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->gender=$request->gender;
            $user->password=bcrypt($request->password);
            $user->save();
            Auth::login($user);
            return redirect()->route('student.index');

        }

        if ($request->role=='student'){
            $user=new User();
            $user->name=$request->name;
            $user->username= $request->username;
            $user->role_id=3;
            $user->status=1;
            $user->passrec=1;
            $user->faculty_id=$request->faculty_id;
            $user->course_id=$request->course_id;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->gender=$request->gender;
            $user->password=bcrypt($request->password);
            $user->save();
            Auth::login($user);
            return redirect()->route('lecturer.index');
        }
    }
    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if($user->verified==0){
                $user->verified=1;
                $user->save();
                $status='Your e-mail is verified. You can now login.';
            }
            else{
                $status='Your e-mail is already verified. You can now login.';
            }

        }else{
            $warning="Sorry your email cannot be identified.";
            return view('frontend.login', compact(['warning']));
        }
        return view('frontend.login', compact(['status']));
    }

}
