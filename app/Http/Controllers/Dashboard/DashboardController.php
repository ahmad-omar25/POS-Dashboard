<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create()
    {
        $routeName = $this->routeName();
        $categories = Category::get();
        return view('dashboard.'.$routeName.'.create', compact( 'routeName', 'categories'));
    } // End of create

    public function edit($id) {
        try {
            $categories = Category::get();
            $routeName = $this->routeName();
            $row = $this->model->findOrFail($id);
            return view('dashboard.'.$routeName.'.edit', compact('routeName', 'row', 'categories'));
        } catch (\Exception $exception) {
            alert()->error(__('global.error_message'));
            return redirect()->route($routeName.'.index');
        }
    } // End of edit

    public function destroy($id) {
        try {
            $routeName = $this->routeName();
            $this->model->findOrFail($id)->delete();
            alert()->success(__('global.delete_successfully'));
            return redirect()->route($routeName.'.index');
        } catch (\Exception $exception) {
            alert()->error(__('global.error_message'));
            return redirect()->route($routeName.'.index');
        }
    } // End of destroy

    // Get Route Name Model
    protected function routeName() {
        return Str::plural(strtolower(class_basename($this->model)));
    }
}
