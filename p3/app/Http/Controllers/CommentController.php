<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        
        return redirect()->back()->with(['flash-alert' => 'Your Comment was Added.']);
    }

   /**
    * Deletes the post
    * DELETE /comments/{id}/delete
    */

    public function destroy($id)
    {
        $comment = Comment::find($id);

        # Before we delete this post we first have to delete
        # any relationships connected to this user

        $comment->user()->dissociate();

        $comment->delete();

        return redirect()->back()->with([
            'flash-alert' => 'Your Comment was deleted.'
        ]);
    }

}