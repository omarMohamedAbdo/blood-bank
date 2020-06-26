<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Hospital;

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
        $this->middleware('guest:hospital')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ( $user->is_admin ) {
            return redirect('/admin');
        }

        return redirect('/home');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['is_active'] = 1;

        return $credentials;
    }

    public function showHospitalLoginForm()
    {
        return view('auth.login', ['url' => 'hospital']);
    }


    public function hospitalLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        $hospital = Hospital::where('email',$request->email)->first();
        if($hospital){
            if ( $hospital->is_active && Auth::guard('hospital')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
    
                return redirect()->intended('/hospital');
            }
        }
        Session::flash('message', "Credentials Dont Match our Data");
        return back()->withInput($request->only('email', 'remember'));
        // return back()
        // ->withErrors([$account->id=>'enter a positive amount'])
        // ->withInput($request->only('email', 'remember'));
    }

   
}
