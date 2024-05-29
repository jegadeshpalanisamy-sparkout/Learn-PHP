<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderConfirmation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\=OrderPlaced  $event
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
        //
        $order=$event->order;
        print_r($order);
        // dd($event);
        dd($event->order);
        // $order=$event->order;
        // Mail::to('jegadesh54321@gmail.com')->send(new WelcomeMail($order));
        

        
    }
}
