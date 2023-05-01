<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class InfoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_email)
    {
        $this->email = $_email;
    }

    // public function build(Request $request)
    // {
    //     $data = array(
    //         'name' => $request->input('sender_name'),
    //         'email' => $request->input('sender_email'),
    //         'message' => $request->input('sender_text')
    //     );

    //     return $this->from($request->input('sender_email'), $request->input('sender_name'))
    //         ->subject('Nuovo messaggio da ' . $data['name'])
    //         ->view('emails.contacthost', compact('data'));
    // }

    // public function build()
    // {
    //     return $this->subject('Mail from ItSolutionStuff.com')
    //                 ->view('admin.dashboard');
    // }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            
        );
    }

    public function build(Request $request)
    {
        $data = [
            'name' => $request->input('sender_name'),
            'surname' => $request->input('sender_surname'),
            'email' => $request->input('sender_email'),
            'message' => $request->input('sender_text'),
            'object' => $request->input('object'),
        ];

        return $this->from($data['email'], $data['name'].' '.$data['surname'])
            ->subject($data['object'])
            ->view('admin.messages.mail.newmessage', compact('data'));
    }


    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'admin.messages.mail.newmessage',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
