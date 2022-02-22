<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Knp\Snappy\Pdf;

class ClientBillsContoller extends Controller
{
    public function index() {
        return view('billing.index');
    }


    public function create(Client $client) {
        return view('billing.create', compact('client'));
    }


    public function store(Request $request, Client $client) {
        $request->validate([
            'cubic_meter' => 'required|numeric'
        ]);

        if ($client->type == 0) {
            $total = $this->computeResidential($request->cubic_meter);
            Bill::create(['consumption' => $request->cubic_meter, 'billing_amount' => $total, 'status' => 0, 'client_id' => $client->id]);
        } else {
            $total = $this->computeCommercial($request->cubic_meter);
            Bill::create(['consumption' => $request->cubic_meter, 'billing_amount' => $total, 'status' => 0, 'client_id'=> $client->id ]);
        }
        return redirect()->route('clients.bills');
    }


    public function show(Client $client) {
        return view('billing.show', ['client' => $client]);
    }

    public function update(Bill $bill) {
        if ($bill->status == 0) {
            $bill->update(['status' => 1]);
        } else {
            $bill->update(['status' => 0]);
        }
        return back();
    }


    public function print(Bill $bill) {
        $current_bill = Bill::with(['client'])->find($bill->id);
        $pdf = SnappyPdf::loadView('pdf', ['bill' => $current_bill]);
        return $pdf->download($current_bill->created_at.$current_bill->billing_amount.'.pdf');
    }


    public function computeResidential(int|float $cubic_meter) : int|float {
        if ($cubic_meter > 0 && $cubic_meter <= 10) {
           return 5;
        }
        if ($cubic_meter > 10 && $cubic_meter <= 20) {
            return ($cubic_meter - 10) * 12 + 75;
        }
        if ($cubic_meter > 20 && $cubic_meter <= 30) {
            return ($cubic_meter - 20) * 13.5 + 195;
        }
        if ($cubic_meter > 30 && $cubic_meter <= 40) {
            return ($cubic_meter - 30) * 15 + 330;    
        }
        if ($cubic_meter > 40 && $cubic_meter <= 50) {
            return ($cubic_meter - 40) * 16.5 + 480;
        }
        if ($cubic_meter > 40) {
            return ($cubic_meter - 40) * 18 + 645;
        }
    }


    public function computeCommercial(int|float $cubic_meter): int|float {
        if ($cubic_meter > 0 && $cubic_meter <= 10) {
            return 100;
        }
        if ($cubic_meter > 10 && $cubic_meter <= 20) {
            return ($cubic_meter - 10) * 15 + 100;
        }
        if ($cubic_meter > 20 && $cubic_meter <= 30) {
            return ($cubic_meter - 20) * 16.5 + 200;
        }
        if ($cubic_meter > 30 && $cubic_meter <= 40) {
            return ($cubic_meter - 30) * 18 + 415;
        }
        if ($cubic_meter > 40 && $cubic_meter <= 50) {
            return ($cubic_meter - 40) * 19.5 + 595;
        }
        if ($cubic_meter > 50) {
            return ($cubic_meter - 40) * 21 + 805;
        }
    }



    public function destroy(Bill $bill) {
        $bill->delete();
        return back();
    }
}
