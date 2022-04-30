@extends('layouts/main')

@section('title')
    All Books
@endsection

@section('head')
    <link href='/css/books/index.css' rel='stylesheet'>
@endsection

@section('content')
    @if (Auth::user())
        <h2>
            Hello {{ Auth::user()->name }}!
        </h2>
    @endif

    <h1 test='all-books-heading'>All Posts</h1>

    @if (count($posts) == 0)
        <p>No posts have been added yet...</p>
    @else
        <div id='posts'>
            @foreach ($posts as $post)
                <a test='post-link-{{ $post->id }}' class='post' href='/posts/{{ $post->id }}'>
                    <h3>{{ $post->title }}</h3>
                </a>
            @endforeach
        </div>
    @endif
@endsection
