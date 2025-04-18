<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceiptMail extends Mailable
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
        return $this->subject('Your Receipt')->view('emails.receipt')->attachData($this->mpdf->output('Receipt.pdf','S'),'Receipt.pdf');
    }
}
