@extends('layouts/main')

@section('content')

    <form method='GET' action='/searchType'>
        <fieldset>
            <label>
                Search type:
            </label>

            <input type='radio' name='searchType' id='byCategory' value='byCategory'
                {{ old('searchType', 'byCategory') == 'byCategory' ? 'checked' : '' }}>
            <label for='searchType'>By Category</label>

            <input type='radio' name='searchType' id='randomSuggestion' value='randomSuggestion'
                {{ old('randomSuggestion') == 'randomSuggestion' ? 'checked' : '' }}>
            <label for='searchType'>3 Random suggestions</label>

        </fieldset>

    </form>


    <form method='GET' action='/search'>
        <h2>Search for a hobby under a specific category.</h2>

        <fieldset>

            <label for="categories">Choose a Category:</label>

            <select name="categories" id="categories" value='{{ old('categories') }}'>
                <option value="physical" value='{{ old('categories') == 'physical' ? 'selected' : '' }}'>Physical
                </option>
                <option value="creative" value='{{ old('categories') == 'creative' ? 'selected' : '' }}'>Creative
                </option>
                <option value="mental" value='{{ old('categories') == 'mental' ? 'selected' : '' }}'>Mental</option>
                <option vallue="food" value='{{ old('categories') == 'food' ? 'selected' : '' }}'>Food</option>
                <option value="collecting" value='{{ old('categories') == 'collecting' ? 'selected' : '' }}'>Collecting
                </option>
                <option value="games" value='{{ old('categories') == 'games' ? 'selected' : '' }}'>Games/Puzzles</option>
            </select>

            <label for=' sugesstionNumber'>
                Enter the amount of suggestions you want:
                <input type='text' name='suggestionNumber' value='{{ old('suggestionNumber') }}'>
            </label>
        </fieldset>

        <button type='submit' class='btn btn-primary'>Enter</button>

        @if (count($errors) > 0)
            <ul class='alert alert-danger'>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
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
