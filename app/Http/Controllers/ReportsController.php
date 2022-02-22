<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index() {
        $reports = Bill::whereMonth('created_at', now()->month)->get();
        $total_amount = collect($reports)->map(function ($report) {
            return $report->billing_amount;
        })->sum();

        $total_consumption = collect($reports)->map(function ($report) {
            return $report->consumption;
        })->sum();

        return view('reports', compact('total_amount', 'total_consumption'));
    }
}
