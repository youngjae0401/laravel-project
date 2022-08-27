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

    protected function store(Request $request)
    {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return User::create([
            'user_id' => $request['user_id'],
            'user_pw' => Hash::make($request['user_pw']),
            'user_email' => $request['user_email'],
        ]);
    }

    protected function validator(array $data)
    {
        $rules = [
            "user_id" => "required|min:8|max:16|unique:users",
            "user_pw" => "required|min:8|max:16",
            "user_email" => "required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",
        ];
        
        $messages = [
            "user_id.required" => "아이디를 입력해주세요.",
            "user_id.min" => "아이디는 8 ~ 16자까지 입력이 가능합니다.",
            "user_id.max" => "아이디는 8 ~ 16자까지 입력이 가능합니다.",
            "user_id.unique" => "이미 사용 중인 아이디입니다.",
            "user_pw.required" => "비밀번호를 입력해주세요.",
            "user_pw.min" => "비밀번호는 8 ~ 16자까지 입력이 가능합니다.",
            "user_pw.max" => "비밀번호는 8 ~ 16자까지 입력이 가능합니다.",
            "user_email.required" => "이메일을 입력해주세요.",
            "user_email.regex" => "이메일이 잘못된 형식입니다.",
        ];

        return Validator::make($data, $rules, $messages);
    }
}
