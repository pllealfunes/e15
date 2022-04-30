<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Post;
use App\Models\Comment;
//use App\Actions\Book\StoreNewBook;

class PostController extends Controller
{
    /**
    * GET /posts/create
    * Display the form to add a new post
    */
 
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
        $post->user_id = $request->user();
        $post->save();

        
        return redirect('/posts/create')->with(['flash-alert' => 'Your post was added.']);
    }

   
    /**
     * GET /posts
     * Show all posts
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'ASC')->get();
        
        return view('/welcome', [
            'posts' => $posts
        ]);
    }

    /**
     * GET /posts/{id}
     * Show the details for an individual post
     */
    public function show(Request $request, $id)
    {
        $post = Post::find($id);
        $comment = Comment::where('post_id', '=', $id)->get();

        if (!$post) {
            return redirect('/')->with(['flash-alert' => 'Post not found.']);
        }

        //$onList = $post->users()->where('user_id', $request->user()->id)->count() >= 1;

        return view('/show', [
            'post' => $post,
            'comment' => $comment
        ]);
    }

    
    /**
    * Asks user to confirm they want to delete the post
    * GET /posts/{id}/delete
    */
    public function delete($id)
    {
        $post = Post::findBySlug($id);

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
        $post = Post::findBySlug($id);

        # Before we delete this post we first have to delete
        # any relationships connected to this user

        $post->users()->detach();

        $post->delete();

        return redirect('/posts')->with([
            'flash-alert' => '“' . $post->title . '” was removed.'
        ]);
    }

    /**
     * GET /posts/filter
     */
    public function filter($category, $subcategory)
    {
        return 'Show all books in these categories: ' . $category . ' , ' . $subcategory;
    }
}