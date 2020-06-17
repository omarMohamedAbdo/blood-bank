<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Request as hospitalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $requests = hospitalRequest::where('hospital_id', $id)->get();
        // return $requests;
        $allDonations = array();
        foreach ($requests as $request) {
            $donations = new Donation;
            $donations =  Donation::where('request_id', $request->id)->with('user', 'donorHospital')->get();
            $allDonations[] = $donations;
        }
        // return $allDonations;
        return view('donationsList', ['allDonations' => $allDonations ]);
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
        // return $donation;
        $donation->status = "accept";
        $hospitalRequest = Donation::find($donation->id)->request()->first();
        $hospitalRequest->received_amount = $donation->donations_amount;
        // return $hospitalRequest;
        if($hospitalRequest->received_amount >= $hospitalRequest->needed_amount)
        {
            $hospitalRequest->is_completed = 1;
        }
        // return $hospitalRequest;
        $hospitalRequest->save();
        $donation->save();
        
        return redirect('hospital/donations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect('hospital/donations');
    }
}
