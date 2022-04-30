@extends('layouts/main')

@section('title')
    Create a new post
@endsection

@section('content')
    <h1>Create a new post</h1>

    <form method='POST' action='/posts'>
        <div class='details'>* Required fields</div>
        {{ csrf_field() }}

        <label for='title'>* Title</label>
        <input test='title-input' type='text' name='title' id='title' value='{{ old('title') }}'>
        @include('includes/error-field', ['fieldName' => 'title'])


        <label for='category'>* Category</label>
        <select test='category-dropdown' name='category'>
            <option selected disabled>Choose one...</option>
            <option value=" physical" {{ old('category') == 'physical' ? 'selected' : '' }}>Physical
            </option>
            <option value="creative" {{ old('category') == 'creative' ? 'selected' : '' }}>Creative
            </option>
            <option value="mental" {{ old('category') == 'mental' ? 'selected' : '' }}>Mental</option>
            <option value="food" {{ old('category') == 'food' ? 'selected' : '' }}>Food</option>
            <option value="collecting" {{ old('category') == 'collecting' ? 'selected' : '' }}>Collecting
            </option>
            <option value="games" {{ old('category') == 'games' ? 'selected' : '' }}>Games/Puzzles</option>
        </select>
        @include('includes.error-field', ['fieldName' => 'category'])

        <label for='post'>Post</label>
        <textarea test='post-textarea' name='post'>{{ old('post') }}</textarea>
        @include('includes/error-field', ['fieldName' => 'post'])

        <button test='submit-button' type='submit' class='btn btn-primary'>New Post</button>

        @if (count($errors) > 0)
            <div test='global-error-feedback' class='alert alert-danger'>
                Please correct the above errors.
            </div>
        @endif

    </form>
@endsection
