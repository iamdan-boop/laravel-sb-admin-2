<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'admins' => User::count(), 
            'users' => Client::count(),
            'earnings_monthly' => Bill::whereMonth('created_at', now()->month)->sum('billing_amount'),
            'earnings_yearly' => Bill::whereYear('created_at', now()->year)->sum('billing_amount')
        ]);
    }
}
