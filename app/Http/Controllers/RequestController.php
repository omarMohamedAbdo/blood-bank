<?php

namespace App\Http\Controllers;

use App\Request as hospitalRequest;
use App\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "list of requests...";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if (isset($request['private'])) {
            // return Hospital::all();
            return view("createPrivateRequests", ["hospitals" => Hospital::all()]);
        } else
            return view("createRequests");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $targetHospitalId = null;


        // check if its a private request

        if (isset($request["private"])) {
            $request->validate([
                "amount" => "required|numeric|min:1",
                "blood" => "required",
                "hospital" => "required"
            ]);
            $targetHospitalId = $request["hospital"];
        } else {
            $request->validate([
                "amount" => "required|numeric|min:1",
                "blood" => "required"
            ]);
        }

        // emergency request flag
        $emergency = false;
        if (isset($request["emergency"])) {
            $emergency = true;
        }

        
        $hospitalId = Auth::guard("hospital")->user()["id"];

        hospitalRequest::create([
            "hospital_id" => $hospitalId,
            "is_emergency" => $emergency,
            "blood_type" => $request["blood"],
            "needed_amount" => $request["amount"],
            "target_hospital_id" => $targetHospitalId,
            "is_completed" => false
        ]);

        return redirect("hospital/requests");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
