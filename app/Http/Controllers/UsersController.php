<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UsersController extends AuthController
{
    public function read(Request $request)
    {
        if($request->req == 'single') {
            $obj = User::find($request->id);
            return response()->json($obj);
        }

        return Inertia::render('Users', [
            'data' => User::select('id','name','email')->paginate($this->per_page()),
        ]);
    }

    public function write(Request $request)
    {
        
        if($request->req == 'write') {

            $this->validate($request, [
                'name' => "required",
                'email' => "required|unique:users,email," . $request->id,
                //'password' => "required"
            ]);

            // $user = User::find($request->id);
            
            // if(!$user)
            //     $user = new User();

            // $user->name = $request->name;
            // $user->email = $request->email;
            
            // if($request->password)
            //     $user->password = bcrypt($request->password);

            // $user->save();
            
            return back()->withFlash(['banner' => "Sukes"]);
        }

    }

}