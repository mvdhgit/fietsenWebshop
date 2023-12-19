<?php

namespace App\Http\Controllers;

use App\Models\Product;
class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) 
        {
            abort(404);
        }

        $cart = session()->get('cart', []);

        if (array_key_exists($id, $cart)) 
        {
            // Increment quantity if the product is already in the cart
            $cart[$id]['quantity']++;
        } else {
            // Add the product to the cart
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
        session()->put('cart', $cart);
        return redirect('/cart')->with('success', 'Product added to cart');
    }

        // logica om winkelwagen inhoud op te halen en totaal berekenen
    public function index()
        {
            $cart = session()->get('cart', []);
        
            // Calculate the total price
            $totalPrice = 0;
            foreach ($cart as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
        
            return view('cart', compact('cart', 'totalPrice'));
        }
        
    public function emptyCart()
        {
            session()->forget('cart');
            
            return redirect()->route('pages.cart')->with('success', 'Cart has been emptied.');
        }
    
    public function checkout()
    {
        $cart = session()->get('cart', []);

        // Calculate the total price
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
    
        return view('checkout', compact('cart', 'totalPrice'));
        
    }
    
}




// public function checkout(Request $request)
// {
//     $cart = session()->get('cart', []);

//     // Calculate the total price
//     $totalPrice = 0;
//     foreach ($cart as $item) {
//         $totalPrice += $item['price'] * $item['quantity'];
//     }

//     // Create a new order
//     $order = new Order();
//     $order->user_id = auth()->user()->id; // Assuming you have a user associated with the order
//     $order->name = $request->input('name');
//     $order->address = $request->input('address');
//     $order->city = $request->input('city');
//     $order->zipcode = $request->input('zipcode');
//     $order->payment_method = $request->input('payment_method');
//     // Add other order-related data as needed
//     $order->save();

//     // Attach the ordered products to the order with quantity and price
//     foreach ($cart as $productId => $item) {
//         $order->products()->attach($productId, [
//             'quantity' => $item['quantity'],
//             'price' => $item['price'],
//         ]);
//     }

//     // Optionally, you can clear the cart after the order is created
//     session()->forget('cart');

//     // Redirect to a success page or do further processing
//     return view('pages.completed'); // Redirect to a success page
// }
