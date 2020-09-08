<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMailAdmin extends Mailable
{
    use Queueable, SerializesModels;

   

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($qwe)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

   

    public function build()
    {
        return $this->from('example@example.com')->view('emails.sendAdmin')->with($request);
    }
}
