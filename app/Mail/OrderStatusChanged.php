<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStatusChanged extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;
    public string $oldStatus;
    public string $newStatus;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order, string $oldStatus, string $newStatus)
    {
        $this->order = $order;
        $this->oldStatus = $oldStatus;
        $this->newStatus = $newStatus;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $subject = "Update Status Pesanan: {$this->order->order_number} - " . ucfirst($this->newStatus);

        return $this->subject($subject)
            ->view('emails.order_status_changed')
            ->with([
                'order' => $this->order,
                'oldStatus' => $this->oldStatus,
                'newStatus' => $this->newStatus,
            ]);
    }
}
