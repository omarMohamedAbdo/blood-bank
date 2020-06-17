<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donor = User::find($id);
        // return $donor;
        return view('donor', ['donor' => $donor ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $donor = User::find($id);

        if (isset($request->HBV))
            $donor->HBV = 1;
        else
            $donor->HBV = 0;

        if (isset($request->HCV))
            $donor->HCV = 1;
        else
            $donor->HCV = 0;

        if (isset($request->HIV))
            $donor->HIV = 1;
        else
            $donor->HIV = 0;

        if (isset($request->HTLV))
            $donor->HTLV = 1;
        else
            $donor->HTLV = 0;

        if (isset($request->syphilis))
            $donor->syphilis = 1;
        else
            $donor->syphilis = 0;
            
        $donor->save();
        // return $donor;
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
