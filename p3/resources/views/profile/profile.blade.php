@extends('layouts/main')

@section('title')
    All Books
@endsection

@section('head')
    <link href='/css/books/index.css' rel='stylesheet'>
@endsection

@section('content')
    <h1 test='all-books-heading'>{{ $user->name }} Profile</h1>
    <h2>Bio</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut
        nostrum
        explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates
        voluptas?</p>

    @if (count($post) == 0)
        <p>No posts have been added yet...</p>
    @else
        <div id='latestPosts'>
            <h2>Latest Posts</h2>
            @foreach ($post as $post)
                <a test='post-link-{{ $post->id }}' class='post' href='/posts/{{ $post->id }}'>
                    <h3>{{ $post->title }}</h3>
                </a>
            @endforeach
        </div>
    @endif
@endsection
