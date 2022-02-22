@extends('layouts.admin')


@section('main-content')
    <div>
        <button type="button" class="btn btn-primary my-3"><a href="{{ route('admins.create') }}"
                class="text-white">Create Admin</a></button>
        <livewire:admins-table />
    </div>
@endsection
