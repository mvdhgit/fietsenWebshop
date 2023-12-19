@extends('layouts.base')

@section('title', 'Products')
@section('page-title', 'Product List')

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
                        <button type="submit" class="btn spaced-btn">Add to Cart</button>
                    </form>
                </div>
                <div class="divider"></div>
            </div>
        @endforeach 
    </div>

    <a href="{{ route('pages.cart') }}" class="btn spaced-btn">View Cart</a>
    <a href="{{ route('pages.categories') }}" class="btn spaced-btn">Back to Categories</a>
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
        border: 5px solid #ccc; /* Border styles */
        padding: 15px;
        margin: 5px 0;
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
</style>
