<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;



class PageController extends Controller
{
public function home()
    {
        # Redirect back to the form with data/results stored in the session
        # Ref: https://laravel.com/docs/responses#redirecting-with-flashed-session-data
        return view('pages/home',[
            'categories' => session('categories', null),
            'suggestionNumber' => session('suggestionNumber', null),
            'searchResults' => session('searchResults', null)
        ]);
    }
}