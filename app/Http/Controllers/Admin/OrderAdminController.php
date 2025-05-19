<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
class OrderAdminController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
            ->select(
                'name',
                'email',
                'phone',
                DB::raw('MAX(created_at) as created_at'),
                DB::raw('COUNT(*) as total_orders'),
                DB::raw('SHA1(CONCAT(name, email, phone)) as customer_hash')
            )->groupBy('name', 'email', 'phone')
            ->orderByDesc('created_at')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show($customer_hash)
    {
        $orders = Order::with('orderItem.product')
            ->whereRaw("SHA1(CONCAT(name, email, phone)) = ?", [$customer_hash])
            ->orderByDesc('created_at')->get();

        return view('admin.orders.show', compact('orders'));
    }
}
