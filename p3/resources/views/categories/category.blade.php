@extends('layouts/main')

@section('title')
    All Books
@endsection

@section('head')
    <link href='/css/books/index.css' rel='stylesheet'>
@endsection

@section('content')
    <h1 test='all-books-heading'>All Posts</h1>
    <h3>Filter by Category<h3>
            <ul>
                @foreach ($categories as $category)
                    <li> <a class='post' href='/category/{{ $category->category }}'>
                            <h3>{{ $category->category }}</h3>
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
