<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
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
        $categories = Category::with('products')->get();
        $routeName = 'clients.orders';
        return view('dashboard.clients.orders.create', compact('routeName', 'client', 'categories'));
    }// end of create

    public function store(Request $request, Client $client)
    {
        $routeName = 'clients.orders';
        $order = $client->orders()->create([]);
        $order->products()->attach($request->products);
        $total_price = 0;
        foreach ($request->input('products') as $id => $quantity) {
            $product = Product::FindOrFail($id);
            $order->total_price += $product->sale_price * $quantity['quantity'];
            $product->update([
                'stock' => $product->stock - $quantity['quantity']
            ]);

        } // end foreach
        $order->update([
            'total_price' => $total_price
        ]);
        alert()->success(__('global.add_successfully'));
        return redirect()->route('orders.index');
    }// end of store

//    public function edit(Client $client, Order $order)
//    {
//        $routeName = 'clients.orders';
//        $categories = Category::with('products')->get();
//        return view('dashboard.clients.orders.edit', compact('client', 'order', 'routeName', 'categories'));
//    }// end of edit

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
