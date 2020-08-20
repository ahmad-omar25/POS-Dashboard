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

    public function products($id)
    {
        $routeName = $this->routeName();
        $orders = Order::with('products')->find($id);
        return view('dashboard.orders._products', compact('orders', 'routeName'));
    }
    public function destroy($id) {
        try {
            $routeName = $this->routeName();
            $order = Order::find($id);
            foreach ($order->products as $product) {
                $product->update([
                    'stock' => $product->stock + $product->pivot->quantity
                ]);
            }
            $order->delete();
            alert()->success(__('global.delete_successfully'));
            return redirect()->route($routeName.'.index');
        } catch (\Exception $exception) {
            alert()->error(__('global.error_message'));
            return redirect()->route($routeName.'.index');
        }
    } // End of destroy
}
