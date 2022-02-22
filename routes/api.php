<?php

use App\Models\Bill;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function() {
    $bills = Bill::with(['client'])
        ->select('bills.*', DB::raw('sum(if(created_at = "'. now()->format('Y-m-d'). '", billing_amount, 0)) as total_bill'))
        ->groupBy('bills.id')
        ->whereMonth('created_at', now()->month)
        ->get();
    return $bills;
});