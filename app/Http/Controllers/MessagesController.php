<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function userInbox()
    {
        $receivedMessages = Auth::user()->receivedMessages;
        $sentMessages = Auth::user()->sentMessages;
        return view('donor.messages',['receivedMessages' => $receivedMessages , 'sentMessages' => $sentMessages]);
    }

    public function hospitalInbox()
    {
        $receivedUserMessages = Message::where('receiver_hospital_id',Auth::user()->id)
        ->whereNotNull('sender_user_id')
        ->get();
        $receivedHospitalMessages = Message::where('receiver_hospital_id',Auth::user()->id)
        ->whereNotNull('sender_hospital_id')
        ->get();
        $sentMessages = Auth::user()->sentMessages;
        return view('hospital.messages',
            ['receivedUserMessages' => $receivedUserMessages 
            , 'receivedHospitalMessages' => $receivedHospitalMessages
            , 'sentMessages' => $sentMessages
            ]);
    }

    public function index()
    {
        //
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
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
