<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order = null;
    public $subject = null;
    public $title = null;
    public $content = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $subject, $title, $content)
    {
        $this->order = $order;
        $this->subject = $subject;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->view('store.orders.mails.order-mail');
    }
}
