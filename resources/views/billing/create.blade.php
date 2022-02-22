@extends('layouts.admin')


@section('main-content')
    <div class="card p-3">
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
        <form action="{{ route('clients.bills.store', ['client' => $client->id]) }}" method="POST">
            @csrf
            <div class="col">
                <label for="cubic_meter" class="form-label">Cubic Meter</label>
                <input type="text" id="cubic_meter" class="form-control" name="cubic_meter" placeholder="CU.m">
            </div>
            <button class="btn-primary btn mt-4 ml-3 mr-4 w-25" type="submit">Calculate</button>
        </form>
    </div>
@endsection
