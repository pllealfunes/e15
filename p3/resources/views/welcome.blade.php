@extends('layouts/main')

@section('title')
    All Books
@endsection

@section('head')
    <link href='/css/books/index.css' rel='stylesheet'>
@endsection

@section('content')
    @if (session('flash-alert'))
        <div class='flash-alert'>{{ session('flash-alert') }}</div>
    @endif

    @if (Auth::user())
        <h2>
            Hello {{ Auth::user()->name }}!
        </h2>
    @endif

    <h1 test='all-books-heading'>All Posts</h1>
    <h3>Filter by Category<h3>
            <ul>
                @foreach ($posts as $post)
                    <li> <a test='post-link-{{ $post->id }}' class='post' href='/category/{{ $post->category }}'>
                            <h3>{{ $post->category }}</h3>
                        </a>
                    </li>
                @endforeach
            </ul>

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
