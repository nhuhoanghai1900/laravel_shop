<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
class OrderAdminController extends Controller
{
    public function index()
    {
        $users = User::withCount('orders')
            ->with('latestOrder')
            ->having('orders_count', '>', 0)
            ->get();
        return view('admin.orders.index', compact('users'));
    }

    public function show($userId)
    {
        $user = User::with(['orders.orderItems.product'])->findOrFail($userId);
        $user->orders = $user->orders->sortByDesc('created_at')->values();
        return view('admin.orders.show', compact('user'));
    }
}
