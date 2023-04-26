<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class payment extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_data)
    {
        $this->data = $_data;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope();
    }

    // public function build(Request $request)
    // {
    //     $data = [
    //         'apartment_name' => $request->input('apartment_name'),
    //         'sponsor_price' => $request->input('sponsor_price'),
    //         'sponsor_duration' => $request->input('sponsor_duration'),
    //         'sponsor_name' => $request->input('sponsor_name'),
    //     ];

    //     return $this->from($data['email'], $data['name'].' '.$data['surname'])
    //         ->subject($data['object'])
    //         ->view('emails.contacthost', compact('data'));
    // }

    public function build()
    {
        $data = $this->data;

        return $this->from('ciao@it', 'ciccio bello')
        ->subject('prego dio')
        ->view('emails.contacthost', compact('data'));
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'admin.messages.mail.newpaymentsuccess',
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
