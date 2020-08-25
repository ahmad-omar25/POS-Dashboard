<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Users\Store;
use App\Http\Requests\Dashboard\Users\Update;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class UserController extends DashboardController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
        // Permissions Ulr
        $this->middleware('permission:users_read')->only('index');
        $this->middleware('permission:users_create')->only('create');
        $this->middleware('permission:users_update')->only('edit');
        $this->middleware('permission:users_delete')->only('destroy');
    }

    // All Users Controller And Search Input
    public function index(Request $request)
    {
        $routeName = $this->routeName();
        $rows = User::whereRoleIs('admin')->where(function($q) use ($request) {
          return $q->when($request->input('search'), function($query) use ($request) {
            return $query->where('first_name', 'like', '%' . $request->input('search') . '%')
              ->orWhere('last_name', 'like', '%' . $request->input('search') . '%');
          });
        })->latest()->paginate(5);
        return view('dashboard.' . $routeName . '.index', compact('rows', 'routeName'));
    }

    // Save User In Database
    public function store(Store $request)
    {
        try {
            $routeName = $this->routeName();
            // User Password
            $request_data = $request->except(['password', 'password_confirmation', 'permissions']);
            $request_data['password'] = bcrypt($request->input('password'));
            // Create User
            $user = User::create($request_data);
            // User Permissions
            $user->attachRole('admin');
            $user->syncPermissions($request->input('permissions'));
            alert()->success(__('global.add_successfully'));
            return redirect()->route($routeName.'.index');
        } catch (\Exception $exception) {
            alert()->error(__('global.error_message'));
            return redirect()->route($routeName.'.index');
        }
    }

    // Update User From Database
    public function update(Update $request, User $user)
    {
        try {
            $routeName = $this->routeName();
            $request_data = $request->except('permissions', 'password', 'password_confirmation');
            if ($request->has('password') && !is_null($request->password)) {
                $user['password'] = bcrypt($request->password);
            }
            $user->update($request_data);
            $user->syncPermissions($request->input('permissions'));
            alert()->success(__('global.update_successfully'));
            return redirect()->route($routeName.'.index');
        } catch (\Exception $exception) {
            alert()->error(__('global.error_message'));
            return redirect()->route($routeName.'.index');
        }
    }
}
