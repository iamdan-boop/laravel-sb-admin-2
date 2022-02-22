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
        <form action="{{ route('push-notication.store') }}" method="POST">
            @csrf
            <div class="mt-3 form-group">
                <label for="last_name" class="form-label">Select Users</label>
                <select class="form-control js-example-basic-multiple" name="clients[]" multiple="multiple">
                    <option value="{{ $clients }}">Select All</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">
                            {{ $client->first_name . ' ' . $client->middle_initial . ' ' . $client->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3" placeholder="Message..." name="message"></textarea>
            </div>

            <div class="container">
                <div class="row">
                    {{-- <div class="col-sm">
                    <button type="submit" class="btn btn-primary">Select All</button>
                </div> --}}
                    <div class="justify-content-end">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
    @endpush
@endsection
