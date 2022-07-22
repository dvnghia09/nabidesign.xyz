<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $idOrder;
    public $cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $cart)
    {
        $this->idOrder = $id;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nabi Thông báo đơn hàng mới')->view('mail.new-order', ['id' => $this->idOrder, 'cart' => $this->cart]);
    }
}
