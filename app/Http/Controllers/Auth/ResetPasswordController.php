<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function guard()
    {
        return Auth::guard('web');

    }
    protected function broker(){
        return Password::broker('users');
    }


    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
    protected function sendResetResponse($response)
    {
//        dd(['here',$response,$this->redirectPath(),Auth::user()->role->name]);
        if(Auth::user()->roles->name=='lecturer'){
            return redirect(route('lecturer.index'))
                ->with('status', trans($response));

        }
        if(Auth::user()->roles->name=='admin'){
            return redirect(route('dashboard'))
                ->with('status', trans($response));

        }
        if(Auth::user()->roles->name=='student'){
            return redirect(route('student.index'))
                ->with('status', trans($response));
        }


    }
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }

}
