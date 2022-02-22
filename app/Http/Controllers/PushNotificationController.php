<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendNotificationRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Twilio\Rest\Client as TwilioClient;

class PushNotificationController extends Controller
{
    public function index() {
        return view('push-notification', [
            'clients' => Client::all(),
        ]);
    }


    public function store(Request $request) {
        if (is_string($request->clients[0])) {
            $value = (array) json_decode($request->clients[0]);
            foreach ($value as $client) {
                $client_model = Client::find($client->id);
                $twilio_client = new TwilioClient(env('TWILIO_SID'), env('TWILIO_TOKEN'));
                $twilio_client->messages->create(
                    '+63'.ltrim($client_model->contact_number, '0'),
                    [
                        'from' => '+18305829612',
                        'body' => $request->message
                    ]
                );
            }   
            return back();
        }
        foreach ($request->clients as $client) {
            $client_model = Client::find($client);
            $twilio_client = new TwilioClient(env('TWILIO_SID'), env('TWILIO_TOKEN'));
            $twilio_client->messages->create(
                '+63'.ltrim($client_model->contact_number, '0'),
                [
                    'from' => '+18305829612',
                    'body' => $request->message
                ]
            );
        }
    }
} 
