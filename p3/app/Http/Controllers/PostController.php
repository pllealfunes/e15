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

        
        return redirect('/posts/create')->with(['flash-alert' => 'Your post was added.']);
    }

   
    /**
     * GET /posts
     * Show all posts
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        $categories = [
           "Physical",
           "Creative",
           "Mental",
           "Food",
           "Collecting",
           "Games"
        ];
        
        return view('/welcome', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    /**
     * GET /posts/{id}
     * Show the details for an individual post with their comments
     */
    public function show($id)
    {
        $post = Post::find($id);
        $postAuthor = User::where('id','=',$post->user_id)->first();

        $comments = Comment::where('post_id', '=', $id)->get();

        $commentAuthor = '';
        foreach ($comments as $comment) {
            $commentAuthor = User::where('id','=', $comment->user_id)->first();
        }

        if (!$post) {
            return redirect('/posts/show')->with(['flash-alert' => 'Post not found.']);
        }

        return view('/posts/show', [
            'post' => $post,
            'postAuthor' => $postAuthor,
            'comments' => $comments,
            'commentAuthor' => $commentAuthor,
        ]);
    }

    
    /**
    * Asks user to confirm they want to delete the post
    * GET /posts/{id}/delete
    */
    public function delete($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect('/posts')->with([
                'flash-alert' => 'Post not found'
            ]);
        }

        return view('posts/delete', ['post' => $post]);
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

        $post->users()->detach();

        $post->delete();

        return redirect('/');
    }

    /**
     * GET /posts/filter
     */
    public function filter()
    {
        
    }
}