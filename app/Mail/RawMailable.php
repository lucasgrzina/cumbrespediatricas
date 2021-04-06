<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RawMailable extends Mailable
{
    use Queueable, SerializesModels;

    private $mailTo;
    private $mailSubject;
    private $mailFrom;

    public $content;
    private $template;

    /**
     * Create a new message instance.
     *
     * @param LayoutMailRawRequest $request
     */
    public function __construct($to, $subject, $content,$from=[],$template="raw")
    {
        $this->content = $content;
        $this->mailSubject = $subject;
        $this->mailTo = $to;
        $this->mailFrom = $from;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @throws \Exception
     */
    public function build()
    {
        $this->view('emails.'. $this->template,['contents' => $this->content]);
        //$pathToFile = asset('img/forosas/Confirmacion.jpg');
        $this->subject($this->mailSubject)
        ->from($this->mailFrom[0], $this->mailFrom[1])
        //->attach($pathToFile)
        ->to($this->mailTo);
    }
}
