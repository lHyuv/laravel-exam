<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Custom Login (to add username)
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required',
        ]);
    
        //Check if email or not
        if(filter_var($request->input('email'), FILTER_VALIDATE_EMAIL )){
            $type = 'email';
        }else{
            $type = 'name';
        }

        $request->merge([
            $type => $request->input('email')
        ]);
    
        if (Auth::attempt($request->only($type, 'password'))) {
            return redirect()->intended($this->redirectPath());
        }
    
        //Incorrect
        return redirect()
            ->back()
            ->withInput()
            ->withErrors([
                'email' => 'Incorrect credentials, please try again!',
            ]);
        } 
    
}
