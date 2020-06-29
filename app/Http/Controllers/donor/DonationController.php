<?php

namespace App\Http\Controllers\donor;

use App\Donation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Request as Campaign;
use Illuminate\Support\Facades\Auth;
use Session;

class DonationController extends Controller
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

    public function showDonationForm(Campaign $campaign)
    {
        return view('donor.createDonation',['campaign' => $campaign ]);
    }

    public function showMyDonations()
    {
        $donations = Auth::user()->donations;
        return view('donor.myDonations',['donations' => $donations ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Campaign $campaign )
    {
        // $request->validate([
        //     "donations_amount" => "required|numeric|min:1",
        // ]);

        // Donation::create([
        //     "request_id" => $campaign->id,
        //     "user_id" => Auth::user()->id,
        //     "blood_type" => Auth::user()->blood_type,
        //     "donations_amount" => $request["donations_amount"],
        // ]);

        // // Session::flash('succes', "Credentials Dont Match our Data");
        // // return back()->withInput($request->only('blood_type'));
        // return redirect("home");
    }

    public function save(Request $request,Campaign $campaign )
    {
        $request->validate([
            "donations_amount" => "required|numeric|min:1",
        ]);

        Donation::create([
            "request_id" => $campaign->id,
            "user_id" => Auth::user()->id,
            "blood_type" => Auth::user()->blood_type,
            "donations_amount" => $request["donations_amount"],
        ]);

        Session::flash('succes', "Your Donation is Submitted Successfully");
        return back()->withInput($request->only('blood_type'));
        // return redirect("home");
    }

    public function saveGeneral(Request $request )
    {
        $request->validate([
            "donations_amount" => "required|numeric|min:1",
        ]);

        Donation::create([
            "target_hospital_id" => $request["hospital_id"],
            "user_id" => Auth::user()->id,
            "blood_type" => Auth::user()->blood_type,
            "donations_amount" => $request["donations_amount"],
        ]);

        Session::flash('succes', "Your Donation is Submitted Successfully");
        return back()->withInput($request->only('donations_amount'));
        // return redirect("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
