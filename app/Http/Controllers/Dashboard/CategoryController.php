<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Categories\Store;
use App\Http\Requests\Dashboard\Categories\Update;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends DashboardController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
        // Permissions Ulr
        $this->middleware('permission:categories_read')->only('index');
        $this->middleware('permission:categories_create')->only('create');
        $this->middleware('permission:categories_update')->only('edit');
        $this->middleware('permission:categories_delete')->only('destroy');
    }

    public function index(Request $request)
    {
        $routeName = $this->routeName();
        $rows = $this->model::when($request->search, function ($query) use ($request) {
            return $query->whereTranslationLike('name', '%' . $request->input('search') . '%');
        })->latest()->paginate(5);
        return view('dashboard.'.$routeName.'.index', compact('rows', 'routeName'));
    }

    public function store(Store $request) {
        $routeName = $this->routeName();
        $this->model::create($request->all());
        alert()->success(__('global.add_successfully'));
        return redirect()->route($routeName.'.index');
    }

    public function update(Update $request, Category $category) {
        $routeName = $this->routeName();
        $category->update($request->all());
        alert()->success(__('global.update_successfully'));
        return redirect()->route($routeName.'.index');
    }
    public function destroy($id) {
        try {

            $routeName = $this->routeName();
            $category =  $this->model::findOrFail($id);
            if (!$category) {
                alert()->error(__('global.error_message'));
                return redirect()->route($routeName.'.index');
            } else {
                $categories = $category->products();
                if (isset($categories) && $categories->count() > 0) {
                    alert()->error(__('global.delete_error'));
                    return redirect()->route($routeName.'.index');
                } else {
                    $category->delete();
                }
            }
            alert()->success(__('global.delete_successfully'));
            return redirect()->route($routeName.'.index');
        } catch (\Exception $exception) {
            alert()->error(__('global.error_message'));
            return redirect()->route($routeName.'.index');
        }
    }
}
