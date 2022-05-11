@extends('layouts/main')

@section('title')
    {{ $post ? $post['title'] : 'Post not found' }}
@endsection


@section('content')
    @if (!$post)
        Post not found. <a href='/'>Check out the other posts...</a>
    @else
        <h2>{{ $post->title }}</h2>
        <p>Written by: <a test='user-profile-link' href='/profile/{{ $post->user->id }}'>{{ $post->user->name }}</a></p>

        <p>Category: {{ $post->category }}
        <p>


        <p class='post'>
            {{ $post->post }}
            @if (Auth::user() && $post->user_id == Auth::user()->id)
                <form action='/posts/{{ $post->id }}/delete' method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button test='delete-post-button' type='submit' class='btn btn-danger btn-small'>Delete</button>
                </form>
            @endif
        </p>

        <h3 id="comments-title">Comments</h3>
        @if (Auth::user())
            <h4 id="new-comment-title">Create a new comment</h4>

            @if (session('flash-alert'))
                <div class='flash-alert'>{{ session('flash-alert') }}</div>
            @endif

            <form method='POST' action='/posts/{{ $post->id }}/comments'>
                <div class='details'>* Required fields</div>
                {{ csrf_field() }}

                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" />

                <label for='comment'>Comment</label>
                <textarea test='comment-textarea' name='comment'>{{ old('comment') }}</textarea>
                @include('includes/error-field', ['fieldName' => 'comment'])

                <button test='new-comment-button' type='submit' class='btn btn-primary'>New Comment</button>

                @if (count($errors) > 0)
                    <div test='global-error-feedback' class='alert alert-danger'>
                        Please correct the above errors.
                    </div>
                @endif

            </form>
        @else
            <p id="login-new-user-comment">Login to add a comment!</p>
        @endif

        <div id='comments'>
            @if (count($comments) > 0)
                <ul id="comments-list">
                    @foreach ($comments as $comment)
                        <li id="comment">{{ $comment->comment }} - by <a
                                href='/profile/{{ $comment->user_id }}'>{{ $comment->user->name }}</a></li>
                        @if (Auth::user() && $comment->user_id == Auth::user()->id)
                            <form action='/comments/{{ $comment->id }}/delete' method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type='submit' class='btn btn-danger btn-small'
                                    test='delete-comment-button'>Delete</button>
                            </form>
                        @endif
                    @endforeach
                </ul>
        </div>
    @else
        <p>No comments have been added yet...Login to add one!</p>
    @endif
    @endif
@endsection
