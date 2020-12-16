@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Please register</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('create-user') }}">
            @csrf
            <div class="form-group">
                <label for="userName">Full Name</label>
                <input type="text" name="name" class="form-control" id="userName" aria-describedby="emailHelp"
                    value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="userEmail">Email address</label>
                <input type="email" name="email" class="form-control" id="userEmail" aria-describedby="emailHelp"
                    value="{{old('email')}}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    value="{{old('password')}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password Confirmation</label>
                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1"
                    value="{{old('password_confirmation')}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('login') }}">Already have an account ?</a>
        </form>
    </div>
</div>
@endsection