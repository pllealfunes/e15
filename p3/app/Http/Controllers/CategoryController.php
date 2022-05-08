<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class CategoryController extends Controller
{
/**
    * GET /category/{category}
    * Display page wiith all posts belonging to category and get all categories from database to display
    */
    
    
    public function index($category)
    {
        $posts = Post::where('category','=',$category)->orderBy('created_at', 'DESC')->get();
        $categories = Post::select('category')->get();
        
        return view('/categories/category', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

}