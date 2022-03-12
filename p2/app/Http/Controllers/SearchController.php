<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class SearchController extends Controller
{

public function userChoice(Request $request){
    $request->validate([
        'searchType' => 'required'
    ]);

    # If validation fails, it will redirect back to `/`

    # Get the form input values (default to null if no values exist)
    $searchType = $request->input('searchType', null);
    return redirect('/') -> withInput();
    }
public function search(Request $request)
    {

        $request->validate([
            'categories' => 'required',
            'suggestionNumber' => 'required|integer|between:1,10',
        ]);

       # Get the form nput values (default to null if no values exist)
    $categories = $request->input('categories', null);
    $suggestionNumber = $request->input('suggestionNumber', null);

    # Load our json book data and convert it to an array
    $hobbyData = file_get_contents(database_path('hobbies.json'));
    $hobbies = json_decode($hobbyData, true);
    
    # Do search
    $searchResults = [];

   foreach ($hobbies as $hobby) {
        $filterCategory = array_filter($hobby[$categories]);
        $arrayResults = array_rand($filterCategory,$suggestionNumber);

        if($suggestionNumber > 1){

        foreach ($arrayResults as $result){
            array_push($searchResults,$filterCategory[$result]);
        }
    } else{
        array_push($searchResults,$filterCategory[$arrayResults]);
    }
    }
   //dump($searchResults);

    
    # Redirect back to the form with data/results stored in the session
    # Ref: https://laravel.com/docs/responses#redirecting-with-flashed-session-data
    return redirect('/')->with([
        'searchResults' => $searchResults
    ]) -> withInput();
    }
}