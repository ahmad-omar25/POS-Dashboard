<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Client;
use Illuminate\Http\Request;

class OrderController extends DashboardController
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
        // Permissions Ulr
        $this->middleware('permission:orders_read')->only('index');
        $this->middleware('permission:orders_create')->only('create');
        $this->middleware('permission:orders_update')->only('edit');
        $this->middleware('permission:orders_delete')->only('destroy');
    }

    // All Users Controller And Search Input
    public function index(Request $request)
    {
        $routeName = $this->routeName();
        $rows = Order::whereHas('client', function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->input('search') . '%');
        })->latest()->paginate(5);
        return view('dashboard.' . $routeName . '.index', compact('rows', 'routeName'));
    }// end of index

    public function products(Order $order) {
        $products = $order->products()->get();
        return view('dashboard.orders._products', compact('products', 'order'));
    }
}
