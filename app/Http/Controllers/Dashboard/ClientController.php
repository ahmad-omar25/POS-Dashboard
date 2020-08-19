<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Clients\Store;
use App\Http\Requests\Dashboard\Clients\Update;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends DashboardController
{
    public function __construct(Client $model)
    {
        parent::__construct($model);
        // Permissions Ulr
        $this->middleware('permission:clients_read')->only('index');
        $this->middleware('permission:clients_create')->only('create');
        $this->middleware('permission:clients_update')->only('edit');
        $this->middleware('permission:clients_delete')->only('destroy');
    }

    public function index(Request $request)
    {
        $routeName = $this->routeName();
        $rows = $this->model::when($request->search, function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->input('search') . '%')
                ->orWhere('phone', 'like', '%' . $request->input('search') . '%')
                ->orWhere('address', 'like', '%' . $request->input('search') . '%');
        })->latest()->paginate(5);
        return view('dashboard.'.$routeName.'.index', compact('rows', 'routeName'));
    }

    public function store(Store $request) {
        $routeName = $this->routeName();
        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);
        $this->model::create($request_data);
        alert()->success(__('global.add_successfully'));
        return redirect()->route($routeName.'.index');
    }

    public function update(Update $request, Client $client) {
        $routeName = $this->routeName();
        $client->update($request->all());
        alert()->success(__('global.update_successfully'));
        return redirect()->route($routeName.'.index');
    }

    public function destroy($id) {
        try {

            $routeName = $this->routeName();
            $client =  $this->model::findOrFail($id);
            if (!$client) {
                alert()->error(__('global.error_message'));
                return redirect()->route($routeName.'.index');
            } else {
                $clients = $client->orders();
                if (isset($clients) && $clients->count() > 0) {
                    alert()->error(__('global.delete_error'));
                    return redirect()->route($routeName.'.index');
                } else {
                    $client->delete();
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
