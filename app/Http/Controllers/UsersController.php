<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UsersController extends AuthController
{
    public function read()
    {
        return Inertia::render('Users', [
            'data' => User::select('id','name','email')->paginate($this->per_page())
        ]);
    }

    public function write(Request $request)
    {
        if($request->req == 'write') {
            $this->validate($request, [
                'name' => "required",
                'email' => "required|unique:users",
                'password' => "required"
            ]);

            $user = User::find($request->id);
            
            if(!$user)
                $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->save();

            return redirect()->route('users');
        }

    }

}