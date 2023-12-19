@extends('layouts.base')

@section('title', 'Categories')
@section('page-title', 'Categorieën')

<x-navbar /> <!-- navbar -->

<!-- @section('content')
    @foreach($categories as $category)
        <a href="{{ route('products.index', ['name' => $category->name]) }}" class="btn spaced-btn">
            {{ $category->name }}
        </a>
        
        <br>
    @endforeach -->
    
@section('content')
    <a href="{{ route('products.fietsen') }}" class="btn spaced-btn">Fietsen</a>
    <br>
    <a href="{{ route('products.elektrischefietsen') }}" class="btn spaced-btn">Elektrische Fietsen</a>
    <br>
@endsection