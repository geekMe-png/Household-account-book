<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Carbon\Carbon;

class InputController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'date' => 'required|date',
            'flow' => 'required|string',
            'category_id' => 'numeric',
            'amount' => 'required|numeric',
        ]);

        $validated['user_id'] = auth()->id();

        $post = Post::create($validated);

        $request->session()->flash('message', '追加完了！');
        return back()->with('message', '追加完了！');
    }

    public function index() {
        if(Post::where('user_id')) {
            $posts = Post::where('user_id', auth()->id())->get();
        }else{
            $posts = Post::wherenull('user_id');
        }
        $amount_income = Post::where('flow', '=', 'income')->where('user_id', auth()->id())->sum('amount');
        $amount_expenditure = Post::where('flow', '=', 'expenditure')->where('user_id', auth()->id())->sum('amount');
        $amount_balance = $amount_income - $amount_expenditure;
        $details = Category::all();
        $date = Carbon::parse('2023-11')->isoFormat('YYYY年MM月');
        return view('/home', compact('posts', 'amount_income', 'amount_expenditure', 'amount_balance', 'details', 'date'));
    }
}
