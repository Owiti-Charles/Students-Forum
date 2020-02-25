<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{

    use AuthenticatesUsers;
    protected $username= 'username';
    protected $guard ='web';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('frontend.login');
    }
    public function username()
    {
        return 'username';
    }

    public function redirectPath()
    {

        if(Auth::user()->roles->name=='student'){
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/student';

        }

        if(Auth::user()->roles->name=='lecturer'){
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/lecturer';
        }
        elseif (Auth::user()->roles->name=='admin'){
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/administrator';
        }


    }
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->has('remember')
        );
    }
    protected function authenticated(Request $request, $user)
    {
        if($user->status==0){
            return $this->deactivated($request);
        }
    }
    public function deactivated(Request $request)
    {

        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('login')->with('deactivated', 'Your account has been deactivated, Please contact the Administrator for solution');
    }


}
