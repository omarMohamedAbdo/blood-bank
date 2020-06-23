<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Request as hospitalRequest;
use App\Donation;


class HospitalCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('hospital')->user()->id;
        $hospitalRequestsIdList = hospitalRequest::where('hospital_id',$id)->select('id')->get() ;
        $UsersDonations = Donation::whereIn('request_id',$hospitalRequestsIdList)
        ->whereNull('hospital_id')
        ->get();
       
       
        // $donations =  Donation::where('user_id', Auth::id() )->with('user', 'donorHospital')->get();
        $i=0;
        $Data = [];
        foreach($UsersDonations as $row) {
            $Data[$i] = array
            (
              "value" => $row->donations_amount,
              "name" => $row->user->name,
            );
            $i++;
            // $Data['data'][] = (int) $row->count;
          }
        // $Data = array
        //           (

                    
        //             "0" => array
        //                             (
        //                               "value" => 335,
        //                               "name" => "Apple",
        //                             ),
        //             "1" => array
        //                             (
        //                               "value" => 310,
        //                               "name" => "Orange",
        //                             )
        //                             ,
        //             "2" => array
        //                             (
        //                               "value" => 234,
        //                               "name" => "Grapes",
        //                             )
        //                             ,
        //             "3" => array
        //                             (
        //                               "value" => 135,
        //                               "name" => "Banana",
        //                             )
        //           );
        return view('hospital',['Data' => $Data]);
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
    public function show()
    {
        //
        $hospital = Auth::guard('hospital')->user();
        return view('inventoryList', ['hospital' => $hospital]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $hospital = Auth::guard('hospital')->user();
        return view('editInventory', ['hospital' => $hospital]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            "typeAstock" => "required|numeric|min:0",
            "typeBstock" => "required|numeric|min:0",
            "typeABstock" => "required|numeric|min:0",
            "typeOstock" => "required|numeric|min:0",
            "typeAneeded" => "required|numeric|min:0",
            "typeBneeded" => "required|numeric|min:0",
            "typeABneeded" => "required|numeric|min:0",
            "typeOneeded" => "required|numeric|min:0",
        ]);

        $id = Auth::guard('hospital')->user()->id;
        $hospital = Hospital::find($id);

        $hospital['type_A_inventory'] = $request['typeAstock'];
        $hospital['type_B_inventory'] = $request['typeBstock'];
        $hospital['type_AB_inventory'] = $request['typeABstock'];
        $hospital['type_O_inventory'] = $request['typeOstock'];

        $hospital['type_A_needed'] = $request['typeAneeded'];
        $hospital['type_B_needed'] = $request['typeBneeded'];
        $hospital['type_AB_needed'] = $request['typeABneeded'];
        $hospital['type_O_needed'] = $request['typeOneeded'];

        $hospital->save();
        
        return redirect()->route('inventoryshow');
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
