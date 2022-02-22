@extends('layouts.admin')


@section('main-content')
    <div class="d-flex justify-content-center">

        <div class="card w-50 p-4">
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
            <form action="{{ route('admins.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row align-items-center">
                    <div class="col">
                        <label for="name" class="form-label">Firstname</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="col">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" class="form-control" name="last_name" value="{{ $user->last_name }}">
                    </div>
                </div>

                <div class="mt-3">
                    <label for="last_name" class="form-label">Email</label>
                    <input type="text" id="last_name" class="form-control" name="email" value="{{ $user->email }}">
                </div>


                <div class="mt-3">
                    <label for="last_name" class="form-label">Password</label>
                    <input type="password" id="last_name" class="form-control" name="password">
                </div>

                <div class="row align-items-end mt-3 mx-1 d-flex justify-content-end">
                    <button class="btn btn-danger mr-3" type="button"><a href="{{ route('admins.index') }}"
                            class="text-white border-0">CANCEL</a></button>
                    <button class="btn btn-primary" type="submit"><a>Submit</a></button>
                </div>
            </form>

        </div>

    </div>
@endsection
