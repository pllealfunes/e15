<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class ProfileController extends Controller
{
/**
    * POST /comments
    * Process the form for adding a new comment
    */
    
    
    public function index($id)
    {
        $user = User::find($id);
        $post = Post::where('user_id', '=', $id)->orderBy('created_at', 'DESC')->get();


        
        return view('/profile/profile', [
            'user' => $user,
            'post' => $post
        ]);
    }

}