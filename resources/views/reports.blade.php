@extends('layouts.admin')


@section('main-content')
    <div class="my-5 row">
        <div class="mx-3 font-weight-bold">Total Amount: <span>{{ $total_amount }}</span></div>
        <div class="mx-3 font-weight-bold">Total Consumption <span>{{ $total_consumption }}</span></div>
    </div>
    <livewire:reports-table />
@endsection
