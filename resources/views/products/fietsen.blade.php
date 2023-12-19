@extends('layouts.base')

@section('title', 'Fietsen Products')
@section('page-title', 'Fietsen')

<x-navbar /> <!-- navbar -->

@section('content')
    <div class="products">
        @foreach ($products as $product)
            <div class="product-box">
                <div class="product">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <p>Price: ${{ $product->price }}</p>
                    <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <button type="submit" class="btn spaced-btn">Voeg toe aan winkelwagen</button>
                    </form>
                </div>
            </div>
        @endforeach 
    </div>
@endsection

<style>
    /* Add CSS for styling */
    .products {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .product-box {
        flex-basis: calc(33.33% - 20px); /* Adjust as needed for desired spacing */
        border: 1px solid #ccc; /* Add a 1px solid border around the product box */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        padding: 15px;
        margin: 10px;
        background-color: #fff;
        border-radius: 5px; /* Add rounded corners */
    }

    .add-to-cart-form {
        display: inline-block;
        vertical-align: top;
    }

    .divider {
        width: 100%;
        height: 1px;
        background-color: #fff; /* Adjust the color as needed */
        margin: 10px 0; /* Adjust the margin to control the spacing */
    }

    /* Add hover effect for the product box */
    .product-box:hover {
        border: 1px solid #007bff; /* Change border color on hover */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add a stronger box shadow on hover */
    }

    h2 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    p {
        font-size: 14px;
        margin: 5px 0;
    }

    button.btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
    }

    button.btn:hover {
        background-color: #0056b3;
    }
</style>
