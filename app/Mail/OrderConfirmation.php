<?php

namespace App\Mail;  

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orderItems;

    public function __construct(Order $order, $orderItems)
    {
        $this->order = $order;
        $this->orderItems = $orderItems;
    }

    public function build()
    {
        return $this->subject('Order Confirmation - #' . $this->order->tracking_id)
                    ->view('emails.order_confirmation');
    }
}