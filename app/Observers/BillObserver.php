<?php

namespace App\Observers;

use App\Models\Bill;
use Twilio\Rest\Client;

class BillObserver
{
    /**
     * Handle the Bill "created" event.
     *
     * @param  \App\Models\Bill  $bill
     * @return void
     */
    public function created(Bill $bill)
    {
        $bill->load('client');
        $client = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        $client->messages->create(
            '+63'.ltrim($bill->client->contact_number, '0'),
            [
                'from' => '+18305829612',
                'body' => 'Hello this is Calavatra WaterWorks, we are notifying that your current bill is'. $bill->billing_amount,
            ]
        );
    }
}
