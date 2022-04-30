<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{

/**
    * POST /comments
    * Process the form for adding a new comment
    */
    
    
    public function store(Request $request,$id)
    {
        $request->validate([
            'comment' => 'required|min:100'
        ]);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->post_id = $id;
        $comment->user_id = $request->user()->id;
        $comment->save();

        
        return redirect()->back()->with(['flash-alert' => 'Your comment was added.']);
    }
}