<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Cart;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
     public $cart;
     public $pdfpath;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart, $pdfpath)
    {
       $this->cart=$cart; 
       $this->pdfpath=$pdfpath; 
    }  

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Pages.mail')->attach($this->pdfpath);
    }
}
