<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

//we can pass data to a view
Route::get('/', function () {
    return view('listings',[
        'listings'=>Listing::all()
    ]);
});


// single listing
Route::get('/listings/{listing}', function(Listing $listing){
    return view('listing', [
        'listing' => $listing
    ]);
});






