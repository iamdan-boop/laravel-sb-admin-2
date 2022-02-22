@extends('layouts.admin')


@section('main-content')
    <div class="card p-4">
        <form action="{{ route('clients.update', ['client' => $client->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row align-items-center">
                <div class="col">
                    <label for="first_name" class="form-label">Firstname</label>
                    <input type="text" id="first_name" class="form-control" name="first_name"
                        value="{{ $client->first_name }}">
                </div>
                <div class="col">
                    <label for="middle_initial" class="form-label">Middle Initial</label>
                    <input type="text" id="middle_initial" class="form-control" name="middle_initial"
                        value="{{ $client->middle_initial }}">
                </div>
                <div class="col">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" class="form-control" name="last_name"
                        value="{{ $client->last_name }}">
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{ $client->email }}">
                </div>
                <div class="col">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <input type="text" id="contact_number" class="form-control" name="contact_number"
                        value="{{ $client->contact_number }}">
                </div>
            </div>

            <h3 class="mt-5">REQUIRED</h3>
            <div class="row align-items-center mt-3">
                <div class="col">
                    <label class="form-label">Type</label>
                    <select class="form-select form-control" name="type">
                        <option value="0" @if ($client->type == 0)
                            selected
                            @endif>Commercial</option>
                        <option value="1" @if ($client->type == 1)
                            selected
                            @endif>Residential</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">Route</label>
                    <select class="form-select form-control" aria-label="Default select example" name="route">
                        <option value="San Isidro" @if ($client->route == 'San Isidro')
                            selected
                            @endif>San Isidro</option>
                        <option value="Patun-An" @if ($client->route == 'Patun-An')
                            selected
                            @endif>Patun-An</option>
                        <option value="Bantayanon" @if ($client->route == 'Bantayanon')
                            selected
                            @endif>Bantayanon</option>
                        <option value="Lo-ok" @if ($client->route == 'Lo-ok')

                            @endif>Lo-ok</option>
                        <option value="Calampisawan" @if ($client->route == 'Calampisawan')
                            selected
                            @endif>Calampisawan</option>
                        <option value="Suba" @if ($client->route == 'Suba')
                            selected
                            @endif>Suba</option>
                    </select>
                </div>

                <div class="col">
                    <label class="form-label">Status</label>
                    <select class="form-select form-control" aria-label="Default select example" name="status">
                        <option value="0" @if ($client->status == 0)
                            selected
                            @endif>Disconnected</option>
                        <option value="1" @if ($client->status == 1)
                            selected
                            @endif>Active</option>
                    </select>
                </div>
            </div>


            <div class="row align-items-center mt-3">
                <div class="col">
                    <label for="stub_number" class="form-label">Stub-out Number</label>
                    <input type="number" id="stub_number" class="form-control" name="stub_number"
                        value="{{ $client->stub_number }}">
                </div>
                <div class="col">
                    <label for="meter_number" class="form-label">Meter Number</label>
                    <input type="number" id="meter_number" class="form-control" name="meter_number"
                        value="{{ $client->meter_number }}">
                </div>
            </div>

            <div class="row justify-content-end">
                <button type="submit" class="btn btn-primary mt-3">Save Client</button>
            </div>
        </form>
    </div>
@endsection
