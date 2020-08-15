<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
        $this->middleware('permission:orders_read')->only('index');
        $this->middleware('permission:orders_create')->only('create');
        $this->middleware('permission:orders_update')->only('edit');
        $this->middleware('permission:orders_delete')->only('destroy');
    }

    public function index()
    {

    }// end of index

    public function create(Client $client)
    {
        $routeName = 'clients.orders';
        return view('dashboard.clients.orders.create', compact('routeName', 'client'));
    }// end of create

    public function store(Request $request, Client $client)
    {
        $routeName = 'clients.orders';
        $order = $client->orders()->create([]);
        foreach ($request->input('products') as $index => $product) {
            $order->products()->attach($product, ['quantity' => $request->input('quantities')[$index]]);
        }
    }// end of store

    public function edit(Client $client, Order $order)
    {

    }// end of edit

    public function update(Request $request, Client $client, Order $order)
    {

    }// end of update

    public function destroy(Client $client, Order $order)
    {

    }// end of destroy

    // Get Route Name Model
    protected function routeName()
    {
        return Str::plural(strtolower(class_basename($this->model)));
    }
}
