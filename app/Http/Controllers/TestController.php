<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends AuthController
{
    public function read()
    {
        return \Inertia\Inertia::render('Test');
    }

    public function write()
    {

    }
}
