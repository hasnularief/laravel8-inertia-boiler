<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends AuthController
{
    public function read(Request $request)
    {
        return \Inertia\Inertia::render('Dashboard');
    }
}
