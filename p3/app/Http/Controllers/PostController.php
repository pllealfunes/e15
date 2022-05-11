<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

//use App\Actions\Book\StoreNewBook;

class PostController extends Controller
{
    /**
    * GET /posts/create
    * Display the form to add a new post
    */
    public function create(Request $request)
    {
        return view('/posts/create');
    }
 
    /**
    * POST /posts
    * Process the form for adding a new post
    */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'post' => 'required|min:100'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->category = $request->category;
        $post->post = $request->post;
        $post->user_id = $request->user()->id;
        $post->save();

        
        return redirect('/posts/create')->with(['flash-alert' => 'Your Post was Added.']);
    }

   
    /**
     * GET /posts
     * Show all posts
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('/welcome', [
            'posts' => $posts
        ]);
    }

    /**
     * GET /posts/{id}
     * Show the details for an individual post with their comments
     */
    public function show($id)
    {
        $post = Post::find($id);

        $comments = Comment::where('post_id', '=', $id)->get();

        if (!$post) {
            return redirect('/')->with(['flash-alert' => 'Post not found.']);
        }

        return view('/posts/show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    
 
    /**
    * Deletes the post
    * DELETE /posts/{id}/delete
    */
    public function destroy($id)
    {
        $post = Post::find($id);

        # Before we delete this post we first have to delete
        # any relationships connected to this user

        $post->user()->dissociate();

        $post->delete();

        return redirect('/')->with(['flash-alert' => 'Your Post was Deleted.']);
    }
}