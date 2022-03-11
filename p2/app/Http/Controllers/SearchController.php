<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class SearchController extends Controller
{
public function search(Request $request)
    {
       # Get the form nput values (default to null if no values exist)
    $category = $request->input('categories', null);
    $suggestionNumber = $request->input('suggestionNumber', null);

    # Load our json book data and convert it to an array
    $hobbyData = file_get_contents(database_path('hobbies.json'));
    $hobbies = json_decode($hobbyData, true);
    
    # Do search
    $searchResults = [];
   foreach ($hobbies as $hobby) {
        $filterCategory = array_filter($hobby[$category]);
        $arrayResults = array_rand($filterCategory,$suggestionNumber);
        foreach ($arrayResults as $result){
            array_push($searchResults,$filterCategory[$result]);
        }
        return $searchResults;
    }
   

    
    # Redirect back to the form with data/results stored in the session
    # Ref: https://laravel.com/docs/responses#redirecting-with-flashed-session-data
    return redirect('/')->with([
        'category' => $category,
        'suggestionNumber' => $suggestionNumber,
        'searchResults' => $searchResults
    ]);
    }
}