@extends('layouts.base')
<x-navbar />
@section('content')
    <h1>Order Details</h1>
    <p>Order ID: {{ $order->id }}</p>
    <p>Order Date: {{ $order->created_at }}</p>
    <p>Total Amount: €{{ $order->total_amount }}</p>

    <h2>Order Items</h2>
    @if (count($order->OrderedProduct) > 0)
        <ul>
            @foreach ($order->OrderedProduct as $item)
                <li>{{ $item->product->name }} - Quantity: {{ $item->quantity }}</li>
            @endforeach
        </ul>
    @else
        <p>No items in this order.</p>
    @endif
@endsection
