<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Donation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $donations =  Donation::where('user_id', Auth::id() )->with('user', 'donorHospital')->get();
        $i=0;
        $Data = [];
        foreach($donations as $row) {

          if($row->request_id){
            $Data[$i] = array
            (
              "value" => $row->donations_amount,
              "name" => $row->request->name,
            );
          }
          else{
            $Data[$i] = array
            (
              "value" => $row->donations_amount,
              "name" => $row->recievingHospital->name,
            );
            
          }
            $i++;
          }
      

        $totalDonations = Donation::where('status', 'accept')->sum('donations_amount');
        $maxDonation = Donation::where('status', 'accept')->max('donations_amount');
        $topHospitalDonation = Donation::where('status', 'accept')->whereNull('user_id')
                              ->orderBy('donations_amount', 'desc')->first(); 
        $topDonorDonation = Donation::where('status', 'accept')->whereNull('hospital_id')
                            ->orderBy('donations_amount', 'desc')->first();

        $topHospital = '';
        if($topHospitalDonation)
        {
            $topHospital = $topHospitalDonation->donorHospital->name;
        }
        
        $topDonor = '';
        if($topDonorDonation)
        {
            $topDonor = $topDonorDonation->user->name;
        }
        return view('home',
        [
          'Data' => $Data,
          'totalDonations' => $totalDonations ,
          'maxDonation' => $maxDonation ,
          'topHospital' => $topHospital ,
          'topDonor' => $topDonor,
        ]);
    }
}
