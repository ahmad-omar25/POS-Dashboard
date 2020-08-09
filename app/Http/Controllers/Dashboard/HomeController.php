<?php

namespace App\Http\Controllers\Dashboard;

use App\User;

class HomeController extends DashboardController
{
    protected $model;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function index() {
        return view('dashboard.home');
    }
}
