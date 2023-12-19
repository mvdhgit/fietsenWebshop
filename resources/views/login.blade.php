@extends('layouts.base')

@section('title', 'Login')
<x-navbar /> <!-- navbar -->
@section('content')
    <!-- Login Form -->
    <form class="login-form" method="POST" action="{{ route('pages.login') }}">
        @csrf

        <div class="form-group">
            <label for="email">E-mailadres</label>
            <br>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Wachtwoord</label>
            <br>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Inloggen
            </button>
        </div>
    </form>
@endsection
