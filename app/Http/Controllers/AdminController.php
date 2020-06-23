<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;
use App\User;

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
        return view('hospitalList', ['hospitals' => $hospitals]);
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
        $users = User::all();
        return view('usersList', ['users' => $users]);
    }
}
