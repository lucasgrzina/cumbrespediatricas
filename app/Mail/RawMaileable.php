<?php

namespace App\Mail;

use Dingo\Api\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RawMailable extends Mailable
{
    use Queueable, SerializesModels;

    private $mailTo;
    private $mailSubject;
    // the values that shouldnt appear in the mail should be private

    public $content;
    // public properties are accessible from the view

    /**
     * Create a new message instance.
     *
     * @param LayoutMailRawRequest $request
     */
    public function __construct($to, $subject, $content)
    {
        $this->content = $content;
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
        $this->view('emails.raw',['contents' => $this->content]);
        $pathToFile = asset('img/forosas/Confirmacion.jpg');
        $this->subject($this->mailSubject)
        //->from('no-reply@foro-sas.com.ar', 'Foro-Sas: Registro')
        ->attach($pathToFile)
        ->to($this->mailTo);
    }
}