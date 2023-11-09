<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartItemController extends Controller
{
    public function index()
    {

        $items = Auth::user()->cartItems;

        return view('buyer.pages.cart-items', compact('items'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $product_id = $request->input('product_id');
            $product_quantity = $request->input('quantity');
            $cartItem = CartItem::where('product_id', $product_id)
                ->where('cart_id', '=', Auth::user()->cart->id)
                ->first();
            if (!empty($cartItem)) {
                $cartItem->quantity += $product_quantity;
                $cartItem->save();
            } else {
                $cartItem = new CartItem();
                $cartItem->product_id = $product_id;
                $cartItem->cart_id = Auth::user()->cart->id;
                $cartItem->quantity = $product_quantity;
                $cartItem->save();
            }
            DB::commit();
            return response()->json($cartItem);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function checkout($item)
    {
        try {
            $item = CartItem::find($item);
            $order = new Order();
            $order->order_id = (string) Str::uuid();
            $order->product_id = $item->product_id;
            $order->user_id = Auth::user()->id;
            $order->quantity = $item->quantity;
            $order->gross_amount = $item->quantity * $item->product->price;


            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $order->order_id,
                    'gross_amount' => $order->gross_amount,
                ),
                'item_details' => array([
                    'id' => $item->product->id,
                    'price' => $item->product->price,
                    'quantity' => $order->quantity,
                    'name' => $item->product->name
                ]),
                'customer_details' => array(
                    'first_name' => Auth::user()->first_name,
                    'last_name' => Auth::user()->first_name,
                    'email' => Auth::user()->email,
                    'phone' => '08111222333',
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $order->snapToken = $snapToken;
            $order->save();

            $item->delete();

            return view('buyer.pages.payment', compact('snapToken', 'order'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function showOrder()
    {
        $orders = Order::where('user_id', '=', Auth::user()->id)->get();

        return view('buyer.pages.order', compact('orders'));
    }
}
