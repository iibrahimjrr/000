<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    public function index()
    {
        return Comment::with([
            'user', 'article'
        ])->get();
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'comment'    => 'required',
            'user_id'    => 'required|exists:users,id',
            'article_id' => 'required|exists:articles,id'
        ]);

        return Comment::create($validate);
    }

    public function show(Comment $comment)
    {
        return $comment->load(['user', 'article']);
    }

    public function update(Request $request, Comment $comment)
    {
        $validate = $request->validate([
            'comment' => 'sometimes|required'
        ]);

        $comment->update($validate);
        return $comment;
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json(['Message' => 'التعليق اتسمح يا قلب اخوك']);
    }
}    
