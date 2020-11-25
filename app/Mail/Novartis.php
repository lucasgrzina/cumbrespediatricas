<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Novartis extends Mailable
{
    use Queueable, SerializesModels;

    private $mailTo;
    private $mailSubject;
    // the values that shouldnt appear in the mail should be private

    public $imagen;
    // public properties are accessible from the view

    /**
     * Create a new message instance.
     *
     * @param LayoutMailRawRequest $request
     */
    public function __construct($to, $subject, $imagen)
    {
        $this->imagen = $imagen;
        $this->mailSubject = $subject;
        $this->mailTo = $to;
    }

    /**
     * Build the message.
     *
     * @throws \Exception
     */
    public function build()
    {
        $this->view('emails.novartis',['imagen' => $this->imagen]);
        //$pathToFile = asset('img/forosas/Confirmacion.jpg');
        $this->subject($this->mailSubject)
        ->from('dermatalks.2020@gmail.com', 'Novartis')
        ->to($this->mailTo);
    }
}