<?php

namespace App\Controllers;
use App\Models\EcomModel;

class AdminDashboardController extends BaseController
{
    public function index()
    {
        return view('admin_dashboard/dashboard');
    }
    public function users()
    {
        $ecomModel = new EcomModel();
        $users = $ecomModel->findAll();
        return view('admin_dashboard/users', ['users'=> $users]);
    }
}
