@extends('layouts.admin')


@section('main-content')
    <div>
        <button type="button" class="btn btn-primary mb-3" type="button"><a href="{{ route('clients.create')}}" class="text-white">Create Client</a></button>
        <livewire:clients-table/>
    </div>
@endsection