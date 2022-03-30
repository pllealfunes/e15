@extends('layouts/main')

@section('content')

    <form method='GET' action='/search' class="col-lg-6 align-items-start">
        <div class="text-center">
            <h3>Search for a new hobby under specific category.</h3>
        </div>

        <fieldset>
            <div class="row my-5">
                <label for="categories" class="form-label col-form-label">Choose a Category:</label>
                <select name="categories" id="categories" class="form-select">
                    <option selected disabled>Select a Category</option>
                    <option value=" physical" {{ old('categories') == 'physical' ? 'selected' : '' }}>Physical
                    </option>
                    <option value="creative" {{ old('categories') == 'creative' ? 'selected' : '' }}>Creative
                    </option>
                    <option value="mental" {{ old('categories') == 'mental' ? 'selected' : '' }}>Mental</option>
                    <option value="food" {{ old('categories') == 'food' ? 'selected' : '' }}>Food</option>
                    <option value="collecting" {{ old('categories') == 'collecting' ? 'selected' : '' }}>Collecting
                    </option>
                    <option value="games" {{ old('categories') == 'games' ? 'selected' : '' }}>Games/Puzzles</option>
                </select>
            </div>

            <div class="form-group row my-5">
                <label for="sugesstionNumber" class="form-label col-form-label">
                    Enter the amount of suggestions you want:
                    <input type="text" class="form-control form-control-sm"" name=" suggestionNumber"
                        value='{{ old('suggestionNumber') }}'>
                </label>
            </div>

            <div class="form-check row my-5">
                <label for="inspirationalQuote" class="form-check-label col-form-label">
                    Want a motivational quote? Yes!
                    <input type="checkbox" class="form-check-input" name="inspirationalQuote" value="yes"
                        id='inspirationalQuote' {{ old('inspirationalQuote') == 'yes' ? 'checked' : '' }}>
                </label>
            </div>
        </fieldset>

        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-primary p-2" type="button">Submit</button>
        </div>

        @if (count($errors) > 0)
            <ul class='alert alert-danger my-2 p5'>
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
            <div class='results alert alert-primary m-3 p1 fs-4'>

                {{ count($searchResults) }}
                {{ Str::plural('Result', count($searchResults)) }}:

                <ul class='p5 fs-4'>
                    @foreach ($searchResults as $result)
                        <li>{{ $result }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endif

    @if (!is_null($inspirationalQuote))
        <div class="results alert alert-primary text-center fs-4">
            <div>{{ $inspirationalQuote['text'] }}</div>
            <div> ~ {{ $inspirationalQuote['author'] }}</div>
        </div>
    @endif

@endsection
