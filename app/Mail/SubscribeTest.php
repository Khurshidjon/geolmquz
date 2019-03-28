<?php

namespace App\Mail;

use App\XObject;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscribeTest extends Mailable
{
    use Queueable, SerializesModels;
    public $object;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->object;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.test', ['object' => $this->object]);
    }
}
