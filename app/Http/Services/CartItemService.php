<?php

namespace App\Http\Services;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemService
{

    public function getItems()
    {
        return Auth::user()->cartItems;
    }

    public function insertToCart(Request $request)
    {
        $item = new CartItem();
        $item->cart_id = Auth::user()->cart->id;
        $item->product_id = $request->product_id;
        $item->quantity = $request->quantity;
        $item->save();

        return $item;
    }

    public function updateQuantity(CartItem $item)
    {
        return $item->update([
            'quantity' => $item->quantity + 1
        ]);
    }

    public function execDeleteItem(Request $request)
    {
        return CartItem::getProductByCartUser($request->product_id)->delete();
    }
}
