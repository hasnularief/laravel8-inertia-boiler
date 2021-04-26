<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('verified');
        //$this->middleware('check-permissions');
    }

    public function user()
    {
        return request()->user();
    }
}
