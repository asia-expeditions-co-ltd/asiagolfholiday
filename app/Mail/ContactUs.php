<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$
        // $this->req = $req;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $req)
    {
        // return $this->markdown('emails.contact.contactus');
        return $this->from($req->email)
            ->markdown('emails.contact.contactus')
            ->with([
                'username' => $req->username,
                'email' => $req->email,
                'phone' => $req->phone,
                'topic' => $req->topic,
                'message' => $req->message
            ]);
    }
}
