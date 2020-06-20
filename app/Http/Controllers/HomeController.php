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
        foreach($donations as $row) {
            $Data[$i] = array
            (
              "value" => $row->donations_amount,
              "name" => $row->request->name,
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
        return view('home',['Data' => $Data]);
    }
}
