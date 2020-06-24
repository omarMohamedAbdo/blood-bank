<?php

namespace App\Http\Controllers;

use App\User;
use App\Donation;
use Carbon\Carbon;
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

    public function showDonationForm(int $hospitalRequestId)
    {
        // return $hospitalRequestId;
        $hospitalRequest = $requests = hospitalRequest::where('id',$hospitalRequestId)->with('hospital')->first();
        // return $hospitalRequest;
        return view('createHospitalDonation',['request' => $hospitalRequest ]);
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            "donations_amount" => "required|numeric|min:1",
        ]);

        Donation::create([
            "request_id" => $request->request_id,
            "hospital_id" => Auth::id(),
            "blood_type" => $request->blood_type,
            "donations_amount" => $request->donations_amount,
        ]);

        
        return redirect('hospital/requests/'.$request->request_id);
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
        // Change Donation status to Accept
        $donation->status = "accept";

        // Change donor Last donation date and weekly donation counter
        if(isset($donation->user_id))
        {
            $donor = User::find($donation->user_id)->first();

            $expirey_date = (new Carbon($donor->last_donation))->addDays(7);

            if($expirey_date >= date("Y-m-d"))
                $donor->weekly_donation_count+=1;
            else
                $donor->weekly_donation_count = 1;
            
            $donor->last_donation = date("Y-m-d");

            $donor->save();
        }

        // Change recived amount of hospital request 
        $hospitalRequest = Donation::find($donation->id)->request()->first();
        $hospitalRequest->received_amount += $donation->donations_amount;

        // Change hospital blood inventory 
        $hospital = $hospitalRequest->hospital()->first();
        if($donation->blood_type == 'A') {
            $hospital->type_A_inventory+=$donation->donations_amount;
        }
        elseif($donation->blood_type == 'B') {
            $hospital->type_B_inventory+=$donation->donations_amount;
        }
        elseif($donation->blood_type == 'AB') {
            $hospital->type_AB_inventory+=$donation->donations_amount;
        }
        elseif($donation->blood_type == 'O') {
            $hospital->type_O_inventory+=$donation->donations_amount;
        }

        if($hospitalRequest->received_amount >= $hospitalRequest->needed_amount)
        {
            $hospitalRequest->is_completed = 1;
        }

        $hospitalRequest->save();
        $hospital->save();
        $donation->save();
        
        return redirect('hospital/donations')->with('update', 'Accepted Donation Successfuly');
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
        return redirect('hospital/donations')->with('update', 'Rejected Donation Successfuly');
    }
}
