<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Products\Store;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends DashboardController
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
        // Permissions Ulr
        $this->middleware('permission:products_read')->only('index');
        $this->middleware('permission:products_create')->only('create');
        $this->middleware('permission:products_update')->only('edit');
        $this->middleware('permission:products_delete')->only('destroy');
    }
    public function index(Request $request)
    {
        $routeName = $this->routeName();
        $categories = Category::get();
        $rows = $this->model::when($request->search, function ($query) use ($request) {
            return $query->whereTranslationLike('name', '%' . $request->input('search') . '%');

        })->when($request->category_id, function ($q) use ($request) {
            return $q->where('category_id', $request->category_id);
        })->latest()->paginate(5);
        return view('dashboard.'.$routeName.'.index', compact('rows', 'routeName', 'categories'));
    }

    public function store(Store $request) {
        if ($request->has('image')) {
            uploadImage('products', $request->image);
        }
        $routeName = $this->routeName();
        $product = Product::create($request->all());
        alert()->success(__('global.add_successfully'));
        return redirect()->route($routeName.'.index');
    }


    public function update(Request $request, Product $product) {
        $routeName = $this->routeName();
        $product->update($request->all());
        alert()->success(__('global.update_successfully'));
        return redirect()->route($routeName.'.index');
    }
}
