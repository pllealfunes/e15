@extends('layouts/main')

@section('content')
    <h1>Practice</h1>
    @if (Auth::user())
        <h2>
            Hello {{ Auth::user()->name }}!
        </h2>
    @endif
@endsection
