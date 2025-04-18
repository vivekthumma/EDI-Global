<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkestimateMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $mpdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mpdf)
    {
        $this->mpdf = $mpdf;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Work Estimate')->view('emails.workestimate')->attachData($this->mpdf->output('Work_estimate.pdf','S'),'Work_estimate.pdf');
    }
}
