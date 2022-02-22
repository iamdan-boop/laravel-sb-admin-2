<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index() {
        return view('admin.index');
    }



    public function create() {
        return view('admin.create');
    }


    public function store(StoreAdminRequest $request) {
        User::create($request->validated());
        return redirect()->route('admins.index');
    }


    public function edit(User $user) {
        return view('admin.edit', compact('user'));
    }


    public function update(UpdateAdminRequest $request, User $user) {
        $user->update($request->validated());
        return redirect()->route('admins.index');
    }


    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('admins.index');
    }
}
