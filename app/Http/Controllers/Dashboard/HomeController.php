<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\User;

class HomeController extends DashboardController
{
    protected $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function index() {
        $orders = Order::count();
        $products = Product::count();
        $clients = Client::count();
        $categories = Category::count();
        return view('dashboard.home', compact('orders', 'categories', 'clients', 'products'));
    }
}
