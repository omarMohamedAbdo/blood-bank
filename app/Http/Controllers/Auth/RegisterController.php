<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Hospital;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:hospital');
    }

    public function showHospitalRegisterForm()
    {
        return view('auth.registerHospital');
    }

    protected function createHospital(Request $request)
    {
        $this->validator($request->all())->validate();
        $imageName = time() . '.' . request()->credentials->getClientOriginalExtension();
        request()->credentials->move(public_path('images'), $imageName);
        $admin = Hospital::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'city' => $request['city'],
            'password' => Hash::make($request['password']),
            'credentials' => $imageName,
        ]);
        // if (Auth::guard('hospital')->attempt(['email' => $request['email'], 'password' => $request['password']], $request->get('remember'))) {
        //     return redirect()->intended('/hospital');
        // }
        return redirect()->intended('login/hospital');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'credentials' => ['required', 'image', 'mimes:jpeg,png,jpg']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'city' => $data['city'],
            'blood_type' => $data['blood_type'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
