<?php

namespace App\Http\Controllers\hospital;

use App\Hospital;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hospital.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,Hospital $hospital )
    {
         $hospital = Auth::guard('hospital')->user();
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'password' => ['nullable','confirmed', 'string', 'min:8'] ,
            'city' => ['required'],
            // 'blood_type' => ['required'],
            'email' => array('required',
            'max:191','string','email',
            Rule::unique('hospitals')->ignore($hospital->id),
            ),
        ]);

        $requestData=array_filter($request->all());
        // if($request->password !=""){
        //     //hash the password
        //     $requestData['password']=Hash::make($requestData['password']);
        // }
        $hospital->update($requestData);
        Session::flash('succes', "Profile updated successfully");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        //
    }
}
