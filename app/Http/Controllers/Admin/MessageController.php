<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//Models
use App\Models\Message;
use App\Models\Apartment;

// Facades
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function index(Request $request)
     {
         $user = Auth::user();
     
         $apartment_id = $request->input('apartment_id');
         $search = $request->input('search');
     
        //  prova query per ordinare date messaggi
        $messages = Message::whereHas('apartment', function ($query) use ($user) {
            $query->where('user_id', '=', $user->id)
                ->orderBy('created_at', 'desc');
        });
        
         if ($apartment_id) {
             $messages = $messages->where('apartment_id', $apartment_id);
         }
     
         if ($search) {
             $messages = $messages->where(function ($query) use ($search) {
                 $query->where('sender_name', 'LIKE', '%' . $search . '%')
                       ->orWhere('object', 'LIKE', '%' . $search . '%')
                       ->orWhere('sender_surname', 'LIKE', '%' . $search . '%')
                       ->orWhere('sender_text', 'LIKE', '%' . $search . '%');
             });
        }
     
        $messages = $messages->get();
        $messages = $messages->sortByDesc('created_at');
        $apartments = Apartment::where('user_id', $user->id)->get();
     
         return view('admin.messages.index', [
             'messages' => $messages,
             'apartments' => $apartments,
             'selected_apartment_id' => $apartment_id,
             'search' => $search
         ]);
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
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update( Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
