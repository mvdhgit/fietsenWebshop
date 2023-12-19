@extends('layouts.base')

@section('title', 'Shopping Cart')
@section('page-title', 'Winkelwagen')

<x-navbar /> <!-- navbar -->

@section('content')
    <div class="container">
        @if(empty($cart))
            <p>Your cart is empty.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Prijs</th>
                        <th>Aantal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>€{{ $item['price'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Totaal: ${{ $totalPrice }}</p>
            <a href="/checkout" class="btn spaced-btn">Naar betalen</a>
            <form action="{{ route('cart.empty') }}" method="POST" class="empty-cart-form">
                @csrf
                <button type="submit" class="btn spaced-btn">Winkelwagen legen</button>
            </form>
        @endif
    </div>
@endsection

<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    table th {
        background-color: #f2f2f2;
    }

    p {
        color: #333;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .spaced-btn {
        margin-right: 10px; /* spacing */
    }

    /* empty cart button form */
    .empty-cart-form {
        display: inline-block;
    }
</style>
