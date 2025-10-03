<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function index() {
        $cart = session('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product) {
        $cart = session('cart', []);
        $cart[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $cart[$product->id]['quantity'] ?? 0 + 1
        ];
        session(['cart' => $cart]);
        return redirect()->back()->with('success','Product added to cart');
    }

    public function remove(Product $product) {
        $cart = session('cart', []);
        unset($cart[$product->id]);
        session(['cart' => $cart]);
        return redirect()->back()->with('success','Product removed from cart');
    }

    public function checkout() {
        $cart = session('cart', []);
        if(empty($cart)) {
            return redirect()->back()->with('error','Cart is empty');
        }

        $total = array_sum(array_map(fn($item)=> $item['price']*$item['quantity'], $cart));

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'pending'
        ]);

        foreach($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('/', $order)->with('success','Order placed!');
    }
}