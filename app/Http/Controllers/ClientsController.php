<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;

class ClientsController extends Controller
{
    public function index() {
        return view('clients.index');
    }


    public function create() {
        return view('clients.create');
    }


    public function store(StoreClientRequest $request) {
        Client::create($request->validated());
        return redirect()->route('clients.index');
    }



    public function edit(Client $client) {
        return view('clients.edit', compact('client'));
    }


    public function update(StoreClientRequest $request, Client $client) {
        $client->update($request->validated());
        return redirect()->route('clients.index');
    }



    public function destroy(Client $client) {
        $client->delete();
        return back();
    }


    public function bills() {
        return view('billing.index');
    }
}
