<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use Illuminate\Routing\Router;

//all listings
Route::get('/', [ListingController::class, 'index'] );

// show create form
Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth'); 

// store listing data
Route::post('/listings',[ListingController::class,'store'])->middleware('auth'); 

//show edit form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

// update listing
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//delete listing 
Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');


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


// show register/create form 
Route::get('/register',[UserController::class,'create'])->middleware('guest');

// create new user
Route::post('/users',[UserController::class, 'store']);

// Log User out 
Route::post('/logout',[UserController::class,'logout'])->middleware('auth'); 

// show login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

// log in user
Route::post('/users/authenticate',[UserController::class,'authenticate']);