@extends('layouts/main')

@section('title')
    {{ $post ? $post['title'] : 'Post not found' }}
@endsection


@section('content')
    @if (!$post)
        Post not found. <a href='/'>Check out the other posts...</a>
    @else
        <h1>{{ $post->title }}</h1>
        <p>Written by: {{ $post->user_id }}</p>
        <p>Category: {{ $post->category }}
        <p>


        <p class='post'>
            {{ $post->post }}
            @if ($post->user_id == Auth::user()->id)
                <form action='/posts/{{ $post->id }}/delete' method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type='submit' class='btn btn-danger btn-small' test='confirm-delete-button'>Delete</button>
                </form>
            @endif
        </p>

        <h2>Comments</h2>
        <h2>Create a new comment</h2>

        <form method='POST' action='/posts/{{ $post->id }}/comments'>
            <div class='details'>* Required fields</div>
            {{ csrf_field() }}

            <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" />

            <label for='comment'>Comment</label>
            <textarea test='comment-textarea' name='comment'>{{ old('comment') }}</textarea>
            @include('includes/error-field', ['fieldName' => 'comment'])

            <button test='submit-button' type='submit' class='btn btn-primary'>New Comment</button>

            @if (count($errors) > 0)
                <div test='global-error-feedback' class='alert alert-danger'>
                    Please correct the above errors.
                </div>
            @endif

        </form>

        <div id='comments'>
            @if (count($comment) > 0)
                <ul>
                    @foreach ($comment as $comment)
                        <li>{{ $comment->comment }} - by {{ $comment->user_id }}</li>
                        @if ($comment->user_id == Auth::user()->id)
                            <form action='/comments/{{ $comment->id }}/delete' method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type='submit' class='btn btn-danger btn-small'
                                    test='confirm-delete-button'>Delete</button>
                            </form>
                        @endif
                    @endforeach
                </ul>
        </div>
    @endif
    @endif
@endsection
