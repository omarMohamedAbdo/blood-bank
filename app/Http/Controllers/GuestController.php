<?php

namespace App\Http\Controllers;
use App\Request as Campaign;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        // return view('welcome');
        $campaigns = Campaign::where('is_completed', 0)
        ->where('target_hospital_id',null)
        ->orderBy('received_amount', 'desc')
        ->limit(9)->get();
        return view('welcome',['campaigns' => $campaigns ]);
    }
}
