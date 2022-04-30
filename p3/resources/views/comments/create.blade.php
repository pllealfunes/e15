@extends('layouts/main')

@section('title')
    Create a new comment
@endsection

@section('content')
    <h1>Create a new comment</h1>

    <form method='POST' action='/comments'>
        <div class='details'>* Required fields</div>
        {{ csrf_field() }}

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
@endsection
