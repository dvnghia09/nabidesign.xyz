<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\NewOrder;

class NewJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $orderId;
    public $cart;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($orderId, $cart)
    {
        $this->orderId = $orderId;
        $this->cart = $cart;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   

        for ($i=0; $i < 3; $i++) {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NewOrder($i, $this->cart));
        }
    }
}
