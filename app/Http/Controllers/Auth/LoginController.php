<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    protected function view()
    {
        return view('auth.login');
    }

    protected function login(Request $request)
    {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
   
        $credentials = $request->only("user_id", "password");

        if(!Auth::attempt($credentials)) {
            return redirect("login");
        }
        
        $request->session()->regenerate();
        return redirect()->intended("/board");
    }
    
    protected function validator(array $data)
    {
        $rules = [
            "user_id" => "required",
            "password" => "required",
        ];
        
        $messages = [
            "user_id.required" => "아이디를 입력해주세요.",
            "password.required" => "비밀번호를 입력해주세요.",
        ];

        return Validator::make($data, $rules, $messages);
    }
}
