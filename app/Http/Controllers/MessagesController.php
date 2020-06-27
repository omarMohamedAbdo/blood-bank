<?php

namespace App\Http\Controllers;

use App\Message;
use App\Hospital;
use App\User;
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
        $receivedMessages = Message::where('receiver_user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $sentMessages = Message::where('sender_user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $hospitals = Hospital::all();
        return view('donor.messages',
        [
         'receivedMessages' => $receivedMessages ,
         'sentMessages' => $sentMessages ,
         'hospitals' => $hospitals ,
        ]);
    }

    public function hospitalInbox()
    {
        $receivedUserMessages = Message::where('receiver_hospital_id',Auth::user()->id)
        ->whereNotNull('sender_user_id')
        ->orderBy('created_at', 'DESC')
        ->get();
        $receivedHospitalMessages = Message::where('receiver_hospital_id',Auth::user()->id)
        ->whereNotNull('sender_hospital_id')
        ->orderBy('created_at', 'DESC')
        ->get();
        $sentMessages = Message::where('sender_hospital_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $users = User::all();
        $hospitals = Hospital::all()->except(Auth::user()->id);
        return view('hospital.messages',
            ['receivedUserMessages' => $receivedUserMessages 
            , 'receivedHospitalMessages' => $receivedHospitalMessages
            , 'sentMessages' => $sentMessages
            , 'users' => $users
            , 'hospitals' => $hospitals
            ]);
    }

    public function sendUserMessage(Request $request )
    {
        $request->validate([
            "inputSubject" => "required",
            "hospital" => "required",
        ]);

        Message::create([
            "sender_user_id" => Auth::user()->id,
            "receiver_hospital_id" =>  $request["hospital"],
            "subject" => $request["inputSubject"],
            "message" => $request["inputBody"],
        ]);

        Session::flash('succes', "Your Message is Sent Successfully");
        return back()->withInput($request->only('subject'));
    }

    public function sendToUserMessage(Request $request )
    {
        $request->validate([
            "inputSubject" => "required",
            "user" => "required",
        ]);

        Message::create([
            "sender_hospital_id" => Auth::user()->id,
            "receiver_user_id" =>  $request["user"],
            "subject" => $request["inputSubject"],
            "message" => $request["inputBody"],
        ]);

        Session::flash('succes', "Your Message is Sent Successfully");
        return back()->withInput($request->only('subject'));
    }

    public function sendToHospitalMessage(Request $request )
    {
        $request->validate([
            "inputSubject" => "required",
            "hospital" => "required",
        ]);

        Message::create([
            "sender_hospital_id" => Auth::user()->id,
            "receiver_hospital_id" =>  $request["hospital"],
            "subject" => $request["inputSubject"],
            "message" => $request["inputBody"],
        ]);

        Session::flash('succes', "Your Message is Sent Successfully");
        return back()->withInput($request->only('subject'));
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
