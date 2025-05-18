<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderAdminController extends Controller
{
    public function index()
    {
        $orders = Order::orderByDesc('created_at')->get();
        return view('admin.orders.index', compact('orders'));
    }
}
