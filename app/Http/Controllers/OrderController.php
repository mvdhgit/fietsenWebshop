<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    { 
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'payment_method' => 'required',
        ]);
    
        // Create a new order and set the order details
        $order = new Order();
        $order->user_id = auth()->id(); // Assuming the user is authenticated
        $order->name = $validatedData['name'];
        $order->address = $validatedData['address'];
        $order->city = $validatedData['city'];
        $order->zipcode = $validatedData['zipcode'];
        $order->payment_method = $validatedData['payment_method'];
        $order->status = 'pending'; // Set an initial status
        // Initialize totalAmount to zero
        $totalAmount = 0.00;
        $order->total_amount = $totalAmount;
        $order->save();
        
        // Attach products to the order using Eloquent relationships
        $cart = session('cart', []);
    
        foreach ($cart as $productId => $cartItem) {
            $product = Product::find($productId);
    
            if ($product) {
                // Calculate the total price for each item and add it to the order total
                $itemTotal = $cartItem['quantity'] * $product->price;
                $totalAmount += $itemTotal;

                // Create OrderedProduct instances and store them in the $orderedProducts array
                $orderedProducts[] = OrderedProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $cartItem['quantity'],
                    'price' => $product->price,
                    'total' => $itemTotal, // Save the total price for this item
                ]);
            }
        }
    
        // Set the calculated total amount to the order
        $order->update(['total_amount' => $totalAmount]);

        // Clear the shopping cart (or perform any other necessary cleanup)
        session()->forget('cart');
    
        // Redirect to a thank you or order confirmation page
        return redirect()->route('pages.succes');
    }
    
    public function orderCompleted()
    {
        // Load the order completion view
        return view('checkout-completed'); // Make sure you have a view file named 'orderCompleted.blade.php'
    }

    public function showOrder($id)
    {   
        $order = Order::with('OrderedProduct.product')->find($id);
        return view('orderDetails', ['order' => $order]);
    }
    
}
