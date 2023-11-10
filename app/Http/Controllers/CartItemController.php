<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
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
            $product_id = $request->input('product_id');
            $product_quantity = $request->input('quantity');

            $product = Product::getProductByCart($product_id);
            $price = $product->price;


            $cart  = Cart::instance('shopping')->content();
            $search = $cart->search(function ($cartItem, $rowId) use ($product_id) {
                return $cartItem->id === $product_id;
            });

            $cart = [];
            foreach (Cart::instance('shopping')->content() as $item) {
                $cart[] = $item->id;
            }
            if (in_array($product_id, $cart)) {
                $qty = Cart::get($search)->qty;
                $result = Cart::update($search, $qty + $product_quantity);
                $result = Cart::get($search);
            } else {
                $result = Cart::instance('shopping')->add($product_id,  $product->name, $product_quantity, $price)->associate('App\Models\Product');
            }




            $response['status'] = true;
            $response['product_id'] = $product_id;
            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();

            if ($request->ajax()) {
                $header = view('layouts.partials.navbar')->render();
                $response['header'] = $header;
            }

            return response()->json($response);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroyCart(Request $request)
    {

        try {
            Cart::instance('shopping')->remove($request->input('cart_id'));
            $response['status'] = true;
            $response['message'] = "Produk Behasil Dihapus!";
            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();


            if ($request->ajax()) {
                $header = view('layouts.partials.navbar')->render();
                $response['header'] = $header;
            }

            return response()->json($response);
        } catch (\Exception $ex) {
            return json_encode($ex->getMessage());
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
