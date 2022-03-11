@extends('layouts/main')

@section('content')
    <form method='GET' action='/search'>
        <h2>Search for a hobby under a specific category.</h2>

        <fieldset>

            <label for="categories">Choose a Category:</label>

            <select name="categories" id="categories">
                <option value="physical-hobbies">Physical</option>
                <option value="creative-hobbies">Creative</option>
                <option value="mental-hobbies">Mental</option>
                <option value="food-hobbies">Food</option>
                <option value="collecting-hobbies">Collecting</option>
                <option value="games-hobbies">Games/Puzzles</option>
            </select>

            <label for='sugesstionNumber'>
                Enter the amount of suggestions you want:
                <input type='text' name='suggestionNumber'>
            </label>
        </fieldset>

        <button type='submit' class='btn btn-primary'>Enter</button>
    </form>

    @if (!is_null($searchResults))
        @if (count($searchResults) == 0)
            <div class='results alert alert-warning'>
                No results found.
            </div>
        @else
            <div class='results alert alert-primary'>

                {{ count($searchResults) }}
                {{ Str::plural('Result', count($searchResults)) }}:

                <ul class='clean-list'>
                    @foreach ($searchResults as $result)
                        <li>{{ $result }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endif
@endsection
