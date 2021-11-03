<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	return new UserCollection( User::all() );
    }

    public function store( Request $request )
    {
        $request->validate([
            "email" => "required|email|unique:users,email",
            "name" => "required",
            "password" => "required|min:8"
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return new UserResource($user);
    }
}
