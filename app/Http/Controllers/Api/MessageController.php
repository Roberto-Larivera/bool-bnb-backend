<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InfoMail;

// Models
use App\Models\Message;
use App\Models\Apartment;


use Exception;

class MessageController extends Controller
{
    // Message store

    public function store(Request $request)
    {
        $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_surname' => 'required|string|max:255',
            'sender_email' => 'required|email|max:255',
            'object' => 'required|string|max:255',
            'sender_text' => 'required|string',
            'apartment_id' => ''
        ]);

        $message = new Message();
        $message->sender_name = $request->input('sender_name');
        $message->sender_surname = $request->input('sender_surname');
        $message->sender_email = $request->input('sender_email');
        $message->object = $request->input('object');
        $message->sender_text = $request->input('sender_text');
        $message->apartment_id = $request->input('apartment_id');
        $message->save();


        $apartment = Apartment::find($request->input('apartment_id'));
        $hostEmail = $apartment->user->email;
        $contactEmail = $request->input('sender_email');
        $contactName = $request->input('sender_name');
        $messageContent = $request->input('sender_text');
        $messageObject = $request->input('object');
        $email = [
            'contactEmail' => $contactEmail,
            'contactName' => $contactName,
            'messageContent' => $messageContent,
            'messageObject' => $messageObject
        ];

        Mail::to($hostEmail)->send(new InfoMail($email));

        return response()->json([
            'success' => true,
            'message' => 'Message saved successfully',
            'data' => $message
        ]);
    }
}
