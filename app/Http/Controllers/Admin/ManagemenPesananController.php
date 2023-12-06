<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ManagemenPesananController extends Controller
{
    public function index()
    {
        $user = User::all();
        $management_pesanan = Order::orderBy('updated_at')->get();
        return view('admin.pages.managemen-pesanan.index', compact('management_pesanan', 'user'));
    }
    public function show($management_pesanan)
    {
        $product = Product::all();
        $order_items = OrderItem::all();
        $management_pesanan = Order::findOrFail($management_pesanan);
        $user = $management_pesanan->user;
        return view('admin.pages.managemen-pesanan.detail', compact('management_pesanan', 'user', 'order_items', 'product'));
    }
}
