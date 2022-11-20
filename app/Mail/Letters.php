<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Letters extends Mailable
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
        return $this->view('emails.exception')->from('info@veritas.edu.ng', 'Veritas University')
            ->subject('Resumption Letter from the Vice Chancellor')
            ->attach(public_path('storage/letter5.pdf'), [

                'as' => 'Letter to Parents, Staff and Students.pdf',

                'mime' => 'application/pdf',

            ])
           // ->bcc("lawrencechrisojor@gmail.com", $name = "All Staff")
           //->replyTo('info@veritas.edu.ng', 'Veritas University')

        ->with('content', $this->content);
    }
}
