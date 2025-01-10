<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The body of the message.
     *
     * @var string
     */
    public $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        //
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.exception')->from('ict@veritas.edu.ng', 'Institute of Consecrated Life in Africa (InCLA)')
            ->subject('ECampus Password Reset')

            ->bcc("ict@veritas.edu.ng", $name = "ICT Unit")
            ->bcc("lawrencechrisojor@gmail.com", $name = "ICT Unit")

        ->with('content', $this->content);
    }
}
