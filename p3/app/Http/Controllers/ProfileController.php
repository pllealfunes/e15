<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{
/**
    * GET User profile /profile/{id}
    * and show their posts from descending order
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