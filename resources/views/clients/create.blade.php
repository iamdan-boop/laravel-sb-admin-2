@extends('layouts.admin')


@section('main-content')
    <div class="card p-4">
        @if (count($errors) > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="row align-items-center">
                <div class="col">
                    <label for="first_name" class="form-label">Firstname</label>
                    <input type="text" id="first_name" class="form-control" name="first_name">
                </div>
                <div class="col">
                    <label for="middle_initial" class="form-label">Middle Initial</label>
                    <input type="text" id="middle_initial" class="form-control" name="middle_initial">
                </div>
                <div class="col">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" class="form-control" name="last_name">
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" name="email">
                </div>
                <div class="col">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <input type="text" id="contact_number" class="form-control" name="contact_number">
                </div>
            </div>

            <h3 class="mt-5">REQUIRED</h3>
            <div class="row align-items-center mt-3">
                <div class="col">
                    <label class="form-label">Type</label>
                    <select class="form-select form-control" name="type">
                        <option value="0" selected>Commercial</option>
                        <option value="1">Residential</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">Route</label>
                    <select class="form-select form-control" aria-label="Default select example" name="route">
                        <option value="San Isidro" selected>San Isidro</option>
                        <option value="Patun-An">Patun-An</option>
                        <option value="Bantayanon">Bantayanon</option>
                        <option value="Lo-ok">Lo-ok</option>
                        <option value="Calampisawan">Calampisawan</option>
                        <option value="Suba">Suba</option>
                    </select>
                </div>

                <div class="col">
                    <label class="form-label">Status</label>
                    <select class="form-select form-control" aria-label="Default select example" name="status">
                        <option value="0">Disconnected</option>
                        <option value="1" selected>Active</option>
                    </select>
                </div>
            </div>


            <div class="row align-items-center mt-3">
                <div class="col">
                    <label for="stub_number" class="form-label">Stub-out Number</label>
                    <input type="number" id="stub_number" class="form-control" name="stub_number">
                </div>
                <div class="col">
                    <label for="meter_number" class="form-label">Meter Number</label>
                    <input type="number" id="meter_number" class="form-control" name="meter_number">
                </div>
            </div>

            <div class="row justify-content-end">
                <button type="submit" class="btn btn-primary mt-3">Save Client</button>
            </div>
        </form>
    </div>
@endsection
