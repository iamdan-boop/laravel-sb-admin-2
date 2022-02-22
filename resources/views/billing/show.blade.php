@extends('layouts.admin')


@section('main-content')
    {{-- <livewire:bills-table /> --}}
    @livewire('bills-table', ['client_id' => $client->id])
@endsection
