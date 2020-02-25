<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Events\UserLoggedIn;
use Auth;
class CustomLogin extends Controller
{
    //

    use AuthenticatesUsers;
    protected $redirectTo = '/dashboard';
    protected $username= 'username';
    protected $guard ='web';

    public function getlogin(){

        if(Auth::guard('web')->check()){

            return redirect()->route('dashboard');
        }
        return view('welcome');
    }

    public function postlogin(Request $request){

        $auth= Auth::guard('web')->attempt(['admission_staff_no'=>$request->username,'password'=>$request->password]);
        //dd($auth);
        $auth2= Auth::guard('web')->attempt(['admission_staff_no'=>$request->username,'password'=>$request->password, 'status'=>1]);
      //  dd($auth2);
        if($auth){
            //dd('here');
//            dd($request->all());
            event(new UserLoggedIn($request));
//            dd('success');

            if($auth2){
                if(Auth::user()->roles->name=='student'){

                    return redirect()->route('student.index');
                }

                if(Auth::user()->roles->name=='lecturer'){
                    return redirect()->route('lecturer.index');
                }
                if (Auth::user()->roles->name=='admin'){
                    return redirect()->route('dashboard');
                }

            }
            else{
                return redirect()->route('getlogin')->withErrors(['username'=>['Your account has been deactivated, please contact the adminstrator']]);
            }
        }
        return redirect()->route('getlogin')->withErrors(['username'=>['Invalid username or Password']]);
    }

    public function getlogout(){
        Auth::guard('web')->logout();
        return redirect()->route('/');
    }
}
