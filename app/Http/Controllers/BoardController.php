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
            'boards.user_id AS user_idx',
            'boards.created_at',
            'users.user_id',
        );
        $boards = Board::join('users', 'users.id', '=', 'boards.user_id')->get($getData);

        $param = [];
        $param['user_id'] = Auth::id();
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

        return redirect("board");
    }

    protected function show($id)
    {
        $board = Board::where('id', $id)->first();
        return view('board.show', compact('board'));
    }
    
    protected function edit(Request $request, $id)
    {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $board = Board::where('id', $id)->first();
        $board->title = $request['title'];
        $board->content = $request['content'];
        $board->save();

        return redirect('board');
    }
    
    protected function delete($id)
    {
        $board = Board::where('id', $id)->first();
        $board->delete();

        return redirect('board');
    }

    protected function validator(array $data)
    {
        $rules = [
            "title" => "required",
            "content" => "required",
        ];
        
        $messages = [
            "title.required" => "????????? ??????????????????.",
            "content.required" => "????????? ??????????????????.",
        ];

        return Validator::make($data, $rules, $messages);
    }
}
