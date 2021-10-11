<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class MeController extends Controller
{
    public function __invoke( Request $request )
    {
        // dd($request->user()->can('create video'));
        return new UserResource( $request->user() );
    }
}
