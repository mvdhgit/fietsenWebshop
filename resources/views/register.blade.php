@extends('layouts.base')

@section('title', 'Register')
<x-navbar /> <!-- navbar -->

@section('content')
<form method="POST" action="{{ route('register.post') }}">
    @csrf
    <div>
        <label for="name">Name:</label>
        <br>
        <input type="text" id="name" name="name" required autofocus>
    </div>
    <div>
        <label for="email">Email:</label>
        <br>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <br>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <br>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>
    <br>
        <button type="submit" class="btn btn-primary">
                Register
        </button>
    </div>
</form>
@endsection