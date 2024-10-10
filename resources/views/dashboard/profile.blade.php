@extends('layouts.dashboard')

@section('content')
    <h1>Edit Profile</h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('/profile') }}">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input name="name" class="form-control" type="text" value="{{ auth()->user()->name }}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input name="email" class="form-control" type="email" value="{{ auth()->user()->email }}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input name="password" class="form-control" type="password">
                </div>
                <input type="clear" class="btn btn-secondary" value="Clear">
                <input type="submit" class="btn btn-primary" value="Save changes">
            </form>
        </div>
    </div>
@endsection