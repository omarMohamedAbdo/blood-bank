<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Charts\DonationChart;
use App\Hospital;
use App\Request as hospitalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class DonationChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 1. get logged hospital
        $id = Auth::id();
        // 2. get all hospital requests
        // $requests = hospitalRequest::where('hospital_id', $id)->get();
        $hospital = Hospital::where('id',$id)->first();
        $requests = $hospital->requests()->get();
        // 3. get all accepted donations 
        $allDonations = array();
        foreach ($requests as $request) {
            $donations =  $request->donations()->select('donations_amount', 'blood_type', 'updated_at')->where('status',"accept")->get();
            foreach ($donations as $donation) {
                $allDonations[] = $donation;
            }
        }
        // 4. categorize it by blood type 
        $A = array();
        $B = array();
        $AB = array();
        $O = array();

        $A_amount = array();
        $B_amount = array();
        $AB_amount = array();
        $O_amount = array();

        $A_dates = array();
        $B_dates = array();
        $AB_dates = array();
        $O_dates = array();
        foreach ($allDonations as $donation) {

            if($donation->blood_type === 'A'){
                $A [] = $donation;
                $A_dates [] = $donation->updated_at->format('d M');
            }
            elseif($donation->blood_type === 'B') {
                $B [] = $donation;
                $B_dates [] = $donation->updated_at->format('d M');
            }
            elseif($donation->blood_type === 'AB') {
                $AB [] = $donation;
                $AB_dates [] = $donation->updated_at->format('d M');
            }
            elseif($donation->blood_type == 'O'){
                $O [] = $donation;
                $O_dates [] = $donation->updated_at->format('d M');
            }
        }

        $A_date2 = array();
        $A_date = array_unique($A_dates);
        foreach ($A_date as $date) {
            $sum = 0;
            foreach ($A as $a) {
                if($a->updated_at->format('d M') == $date)
                {
                    $sum += $a->donations_amount;
                }
            }
            $A_amount [] = $sum;
            $A_date2 [] = $date;
        }

        $B_date2 = array();
        $B_date = array_unique($B_dates);
        foreach ($B_date as $date) {
            $sum = 0;
            foreach ($B as $b) {
                if($b->updated_at->format('d M') == $date)
                {
                    $sum += $b->donations_amount;
                }
            }
            $B_amount [] = $sum;
            $B_date2 [] = $date;
        }

        $AB_date2 = array();
        $AB_date = array_unique($AB_dates);
        foreach ($AB_date as $date) {
            $sum = 0;
            foreach ($AB as $ab) {
                if($ab->updated_at->format('d M') == $date)
                {
                    $sum += $ab->donations_amount;
                }
            }
            $AB_amount [] = $sum;
            $AB_date2 [] = $date;
        }

        $O_date2 = array();
        $O_date = array_unique($O_dates);
        foreach ($O_date as $date) {
            $sum = 0;
            foreach ($O as $o) {
                if($o->updated_at->format('d M') == $date)
                {
                    $sum += $o->donations_amount;
                }
            }
            $O_amount [] = $sum;
            $O_date2 [] = $date;
        }
        
        $A_chart = new DonationChart;
        $A_chart->labels($A_date2);
        $A_chart->dataset('Profit by trimester', 'line', $A_amount)
                ->color("rgb(212, 25, 25, 1.0)")
                ->backgroundcolor("rgb(255,0,0, 0.3)");
        
        // return $O;
        $B_chart = new DonationChart;
        $B_chart->labels($B_date2);
        $B_chart->dataset('Profit by trimester', 'line', $B_amount)
                ->color("rgb(212, 25, 25, 1.0)")
                ->backgroundcolor("rgb(255,0,0, 0.3)");
              
        $AB_chart = new DonationChart;
        $AB_chart->labels($AB_date2);
        $AB_chart->dataset('Profit by trimester', 'line', $AB_amount)
                ->color("rgb(212, 25, 25, 1.0)")
                ->backgroundcolor("rgb(255,0,0, 0.3)");
        
        
        $O_chart = new DonationChart;
        $O_chart->labels($O_date);
        $O_chart->dataset('Profit by trimester', 'line', $O_amount)
                ->color("rgb(212, 25, 25, 1.0)")
                ->backgroundcolor("rgb(255,0,0, 0.3)");

        return view('reports', 
            [ 'Achart' => $A_chart, 'Bchart' => $B_chart, 'ABchart' => $AB_chart, 'Ochart' => $O_chart] );
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
