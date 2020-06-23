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
        $A_amount = array();
        $B_amount = array();
        $AB_amount = array();
        $O_amount = array();

        $A_date = array();
        $B_date = array();
        $AB_date = array();
        $O_date = array();
        foreach ($allDonations as $donation) {

            if($donation->blood_type === 'A'){
                $A_amount [] = $donation->donations_amount;
                
                $A_date [] = $donation->updated_at->format('d M');
            }
            elseif($donation->blood_type === 'B') {
                $B_amount [] = $donation->donations_amount;
                $B_date [] = $donation->updated_at->format('d M');
            }
            elseif($donation->blood_type === 'AB') {
                $AB_amount [] = $donation->donations_amount;
                $AB_date [] = $donation->updated_at->format('d M');
            }
            elseif($donation->blood_type == 'O'){
                $O_amount = $donation->donations_amount;
                $O_date [] = $donation->updated_at->format('d M');
            }
        }
        
        $A_chart = new DonationChart;
        $A_chart->labels($A_date);
        $A_chart->dataset('Profit by trimester', 'line', $A_amount)
                ->color("rgb(255, 99, 132, 1.0)")
                ->backgroundcolor("rgb(255, 99, 132, 0.2)");
        
        
        $B_chart = new DonationChart;
        $B_chart->labels($B_date);
        $B_chart->dataset('Profit by trimester', 'line', $B_amount)
                ->color("rgb(255, 99, 132, 1.0)")
                ->backgroundcolor("rgb(255, 99, 132, 0.2)");
              
        $AB_chart = new DonationChart;
        $AB_chart->labels($AB_date);
        $AB_chart->dataset('Profit by trimester', 'line', $AB_amount)
                ->color("rgb(255, 99, 132, 1.0)")
                ->backgroundcolor("rgb(255, 99, 132, 0.2)");
        
        
        $O_chart = new DonationChart;
        $O_chart->labels($O_date);
        $O_chart->dataset('Profit by trimester', 'line', $O_amount)
                ->color("rgb(255, 99, 132, 1.0)")
                ->backgroundcolor("rgb(255, 99, 132, 0.2)");

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
