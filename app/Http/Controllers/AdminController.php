<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Request as hospitalRequests;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('adminHome');
    }

    public function inactiveHospitals()
    {
        $hospitals = Hospital::where('is_active', 0)->get();
        return view('inactiveHospitalsList', ['hospitals' => $hospitals]);
    }

    public function activeHospital(Request $request)
    {
        $hospital = Hospital::find($request['id']);
        $hospital['is_active'] = true;
        $hospital->save();
        return redirect()->route('hospitalList');
    }

    public function hospitalList()
    {
        $hospitals = Hospital::all();
        return view('hospitalList', ['hospitals' => $hospitals, 'cities' => ['Cairo', 'Alexandria', 'Suez']]);
    }

    public function deActiveHospital(Request $request)
    {
        $hospital = Hospital::find($request['id']);
        $hospital['is_active'] = false;
        $hospital->save();
        return redirect()->route('hospitalList');
    }


    public function deleteHospital(Request $request)
    {
        Hospital::where('id', $request['id'])->delete();
        return redirect()->route('hospitalList');
    }

    //Donor Functions
    public function userslList()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('usersList', ['users' => $users]);
    }

    public function activeUser(Request $request)
    {
        $user = User::find($request['id']);
        $user['is_active'] = true;
        $user->save();
        return redirect()->route('userslList');
    }

    public function deActiveUser(Request $request)
    {
        $user = User::find($request['id']);
        $user['is_active'] = false;
        $user->save();
        return redirect()->route('userslList');
    }

    public function upgradeUser(Request $request)
    {
        $user = User::find($request['id']);
        $user['is_admin'] = true;
        $user->save();
        return redirect()->route('userslList');
    }

    public function downgradeUser(Request $request)
    {
        $user = User::find($request['id']);
        $user['is_admin'] = false;
        $user->save();
        return redirect()->route('userslList');
    }

    public function deleteUser(Request $request)
    {
        User::where('id', $request['id'])->delete();
        return redirect()->route('userslList');
    }

    public function inactiveUsers()
    {
        $users = User::where('is_active', 0)->get();
        return view('inactiveUsersList', ['users' => $users]);
    }

    public function viewUser($id)
    {
        $user = User::find($id);
        return view('userProfile', ['user' => $user]);
    }

    public function newAdmin()
    {
        return view('newAdmin');
    }

    public function createNewAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'is_admin' => true,
            'is_active' => true,
            'city' => "None",
            'blood_type' => "None"
        ]);

        return view('adminCreated', ['email' => $request['email']]);
    }

    public function updateHospital(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'city' => ['required'],
        ]);

        $hospital = Hospital::find($request['id']);
        $hospital['name'] = $request['name'];
        $hospital['email'] = $request['email'];
        $hospital['city'] = $request['city'];
        $hospital->save();
        return redirect()->route('hospitalList');
    }

    public function requestList()
    {

        $requests = hospitalRequests::all()->where('target_hospital_id', null);
        return view('adminRequestList', ['requests' => $requests]);
    }

    public function deleteRequest(Request $request)
    {
        hospitalRequests::find($request['id'])->delete();

        return redirect()->route('requestList');
    }
}
