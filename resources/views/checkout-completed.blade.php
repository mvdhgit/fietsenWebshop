@extends('layouts.base')

@section('title', 'Checkout Completed')
@section('page-title', 'Betaling is gelukt')

@section('head-scripts')
    <!-- Include particles.js library -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
@endsection

@section('content') <!-- werkt nog niet -->
    <!-- Fireworks Animation -->
    <div id="fireworks-container" class="fireworks-container"></div>

    <!-- Confirmation Message -->
    <p>Betaling is gelukt</p>

    <!-- Return to Webshop Link -->
    <a href="{{ route('pages.home') }}" class="btn spaced-btn">Terug naar de webshop</a>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            particlesJS('fireworks-container', {
                particles: {
                    number: { value: 50 },
                    color: { value: '#ff0000' },
                    shape: { type: 'circle' },
                },
                interactivity: {
                    events: {
                        onhover: { enable: false },
                        onclick: { enable: false },
                    },
                },
            });
        });
    </script>
@endsection
<!-- fireworks werkt niet mee bezig. login scherm werkt nog niet validatie nog niet auth nog niet-->