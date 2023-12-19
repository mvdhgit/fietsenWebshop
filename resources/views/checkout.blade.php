@extends('layouts.base')

@section('title', 'Checkout')
@section('page-title', 'Checkout')

<x-navbar /> <!-- navbar -->

@section('content')
            <!-- Cart Overview -->
            <h2>Winkelwagen overzicht</h2>
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
            <p>Totaal prijs: ${{ $totalPrice }}</p>
            
    <div class="container">
        <form action="{{ route('order.place') }}" method="post">
            @csrf

            <!-- Shipping Information -->
            <h2>Afleveradres</h2>
            <div class="form-group">
                <input type="text" placeholder="Full Name" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" placeholder="Shipping Address" id="address" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" placeholder="City" id="city" name="city" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" placeholder="Zip Code" id="zipcode" name="zipcode" class="form-control" required>
            </div>

            <!-- Payment Information -->
            <h2>Betaalmethode</h2>
            <div class="form-group">
                <select id="payment_method" name="payment_method" class="form-control" required>
                    <option value="Select_payment_method">--Select payment method--</option>
                    <option value="postduif">Postduif</option>
                    <option value="ideal">Ideal</option>
                    <option value="paypal">PayPal</option>

                </select>
            </div>

            <!-- Dutch Banks Dropdown (Initially Hidden) -->
            <div class="form-group" id="dutch_banks" style="display: none;">
                <select id="dutch_bank" name="dutch_bank" class="form-control">
                    <option value="selct_bank">--Select Bank--</option>
                    <option value="abn_amro">ABN AMRO</option>
                    <option value="rabobank">Rabobank</option>
                    <option value="ing">ING</option>

                </select>
            </div>

            <script>
                // JavaScript to show/hide the Dutch Banks dropdown
                document.getElementById('payment_method').addEventListener('change', function () {
                    const dutchBanksDropdown = document.getElementById('dutch_banks');
                    const selectedPaymentMethod = this.value;

                    // If iDEAL is selected, show the Dutch Banks dropdown; otherwise, hide it
                    dutchBanksDropdown.style.display = selectedPaymentMethod === 'ideal' ? 'block' : 'none';
                });
            </script>

            <button type="submit" class="btn spaced-btn">Betaal</button>
            <br>
        </form>
    </div>
@endsection
