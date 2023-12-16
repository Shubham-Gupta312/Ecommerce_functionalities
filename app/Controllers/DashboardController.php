<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function user_dashboard()
    {
        return view('dashboard/user_dashboard');
    }
}
