<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected function view() 
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            "user_id" => ["required", "string", "min:8", "max:16", "unique:users"],
            "user_pw" => ["required", "string", "min:8", "max:16"],
            "user_email" => ["required", "string", "max:100"],
        ]);
    }
}
