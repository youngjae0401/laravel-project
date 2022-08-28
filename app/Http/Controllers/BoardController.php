<?php
namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BoardController extends Controller
{
    protected function view()
    {
        $getData = array(
            'boards.id',
            'boards.title',
            'boards.content',
            'boards.created_at',
            'users.user_id',
        );
        $boards = Board::join('users', 'users.id', '=', 'boards.user_id')->get($getData);

        $param = [];
        $param['lists'] = $boards;
        return view('board.index', $param);
    }

    protected function create()
    {
        return view('board.create');
    }
    
    protected function store(Request $request)
    {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Board::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => Auth::id(),
        ]);

        return redirect("/");
    }

    protected function validator(array $data)
    {
        $rules = [
            "title" => "required",
            "content" => "required",
        ];
        
        $messages = [
            "title.required" => "제목을 입력해주세요.",
            "content.required" => "내용을 입력해주세요.",
        ];

        return Validator::make($data, $rules, $messages);
    }
}
