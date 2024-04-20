<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

//we can pass data to a view
Route::get('/', [ListingController::class, 'index'] );

// show create form
Route::get('/listings/create',[ListingController::class,'create']); 

// store listing data
Route::post('/listings',[ListingController::class,'store']); 



// single listing
Route::get('/listings/{listing}', [ListingController::class,'show']);

// Common Resource Routes: just a convention
// index - Show all listings
//  show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing




