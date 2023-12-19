@extends('layouts.base')

<x-navbar /> <!-- navbar -->

@section('content')

<h1>Profielpagina</h1>
<p>Name: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<!-- Add more user information here -->

<div class="profile-picture-form">
    <h2>Profile Picture</h2>
    <form action="{{ route('profile.updatePicture') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Other profile fields -->
        <div class="form-group">
            <label for="image">Select an image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Upload Picture</button>
    </form>

    <br>
    <img src="{{ asset('storage/images/' . auth()->user()->profile_picture) }}" alt="Profile Picture" width="100" height="100">
</div>

<div class="container">
    <div class="table-responsive">
        <h2>Orders</h2>
        @if ($user->orders && count($user->orders) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Totaal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->orders as $order)
                        <tr>
                            <td>
                                <a href="{{ route('order.show', ['id' => $order->id]) }}">{{ $order->id }}</a>
                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td>€{{ $order->total_amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No orders</p>
        @endif
    </div>
</div>
<div class="container">
    <h2>Change Password</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('profile.updatePassword') }}">
        @csrf

        <div class="form-group">
            <input type="password" placeholder="Huidige wachtwoord" name="current_password" id="current_password" class="form-control" required>
            @error('current_password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" placeholder="Nieuw wachtwoord" name="new_password" id="new_password" class="form-control" required>
            @error('new_password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" placeholder="Herhaal wachtwoord" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
</div>
</div>

<style>
    .profile-picture-form {
        border: 1px solid #ccc;
        padding: 20px;
        background-color: #f8f8f8;
        border-radius: 5px;
        margin-top: 20px;
    }
</style>

@endsection
