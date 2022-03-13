@extends('layouts/main')

@section('content')

    <form method='GET' action='/search'>
        <h2>Search for a hobby under a specific category.</h2>

        <fieldset>

            <label for="categories">Choose a Category:</label>

            <select name="categories" id="categories" value="'{{ old('categories') }}'">
                <option selected disabled>Select a Category</option>
                <option value="physical">Physical</option>
                <option value="creative">Creative</option>
                <option value="mental">Mental</option>
                <option value="food">Food</option>
                <option value="collecting">Collecting</option>
                <option value="games">Games/Puzzles</option>
            </select>

            <label for="sugesstionNumber">
                Enter the amount of suggestions you want:
                <input type="text" name="suggestionNumber" value='{{ old('suggestionNumber') }}'>
            </label>

            <label for="inspirationalQuote">
                Want a motivational quote? Yes!
                <input type="checkbox" name="inspirationalQuote" value="yes" id='inspirationalQuote'
                    {{ old('inspirationalQuote') == 'yes' ? 'checked' : '' }}>
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

    @if (!is_null($inspirationalQuote))
        <div>{{ $inspirationalQuote['text'] }}</div>
        <div>{{ $inspirationalQuote['author'] }}</div>
    @endif

@endsection
