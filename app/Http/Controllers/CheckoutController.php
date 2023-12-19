<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Order;

// class CheckoutController extends Controller
// {
//     public function formHandler(Request $request)
//     {
//         //validate form data
//         $validatedData = $request->validate([
//             'name'=>'required|string',
//             'adress'=>'required|string',
//             'city'=>'required|string',
//             'zipcode'=>'required|string',
//             'payment_method'=>'required|string',
//             // 'dutch_bank'=>'nullable|string',
//         ]);

//         // Create a new order record in the database
//         $order = new Order();
//         $order->name = $validatedData['name'];
//         $order->address = $validatedData['address'];
//         $order->city = $validatedData['city'];
//         $order->zipcode = $validatedData['zipcode'];
//         $order->payment_method = $validatedData['payment_method'];
//         $order->dutch_bank = $validatedData['dutch_bank'] ?? null; // Set to null if not provided

//         // Save the order
//         $order->save();
//         session()->forget('cart');
//         // dd($request->all());
//         return redirect()->route('pages.succes');
//     }

//     public function showSucces(){
//         return view('/checkout-completed');
//     }
// }
