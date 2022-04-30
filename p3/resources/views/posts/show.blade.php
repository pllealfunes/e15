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
        </p>

        <h2>Comments</h2>
        <div id='posts'>
            @foreach ($comment as $comment)
                <div>{{ $comment->comment }}</div>
            @endforeach
        </div>
    @endif
@endsection
