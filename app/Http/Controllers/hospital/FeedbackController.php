<?php

namespace App\Http\Controllers\hospital;

use App\Feedback;
use App\Hospital;
use App\Donation;
use App\Request as hospitalRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals =  Hospital::where('is_active', 1)->where('id','!=', Auth::id() )->get();
        return view('hospital.hospitals',['hospitals' => $hospitals ]);
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
    public function store(Request $request, $id)
    {
        // $hospitalRequestsIdList = hospitalRequest::where('hospital_id',$id)->select('id')->get() ;
        // $requestDonations = Donation::whereIn('request_id',$hospitalRequestsIdList)->Where('user_id', Auth::user()->id )->get();
        // $generalDonations = Donation::Where('target_hospital_id', $id )->Where('user_id', Auth::user()->id )->get();
        // if( ( sizeof($requestDonations) == 0 ) && ( sizeof($generalDonations) == 0 ) ){
        //     Session::flash('noDonations', "You Must Donate First to be able to Give Feedback");
        //     return back()->withInput($request->only('comment'));
        // }
        
        
        $request->validate([
            "comment" => "required",
        ]);

        Feedback::create([
            "hospital_id" => $id,
            "reviewing_hospital_id" => Auth::user()->id,
            "comment" => $request["comment"],
        ]);

        Session::flash('succes', "Your Feedback is Submitted Successfully");
        return back()->withInput($request->only('comment'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        return view('hospital.feedback',['hospital' => $hospital ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
