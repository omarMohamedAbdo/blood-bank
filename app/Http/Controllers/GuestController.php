<?php

namespace App\Http\Controllers;
use App\Donation;
use App\Story;
use App\Request as Campaign;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::where('is_completed', 0)
        ->where('target_hospital_id',null)
        ->orderBy('received_amount', 'desc')
        ->limit(9)->get();

        $totalDonations = Donation::where('status', 'accept')->sum('donations_amount');
        $maxDonation = Donation::where('status', 'accept')->max('donations_amount');
        $topHospitalDonation = Donation::where('status', 'accept')->whereNull('user_id')
        ->orderBy('donations_amount', 'desc')->first(); 
        $topDonorDonation = Donation::where('status', 'accept')->whereNull('hospital_id')
        ->orderBy('donations_amount', 'desc')->first();
        $stories = Story::limit(3)->get();

       
        return view('welcome',
        [
            'campaigns' => $campaigns ,
            'totalDonations' => $totalDonations ,
            'maxDonation' => $maxDonation ,
            'topHospital' => $topHospitalDonation->donorHospital->name ,
            'topDonor' => $topDonorDonation->user->name ,
            'stories' => $stories 

        ]);
    }
}
