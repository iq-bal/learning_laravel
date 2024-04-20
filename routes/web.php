<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//never forget to import Model if you are using one
use App\Models\Listing;

//we can pass data to a view
Route::get('/', function () {
    return view('listings',[
        'heading'=>'latest listings',
        // 'listings'=>[
        //     [
        //         'id'=>1,
        //         'title'=>'Listing One',
        //         'description'=>'Loren lpsum'
        //     ],
        //     [
        //         'id'=>2,
        //         'title'=>'Listing two',
        //         'description'=>'Loren lpsum'
        //     ]
        // ]
        // Listing class er static method all ke call kora holo
        'listings'=>Listing::all()
    ]);
});


// single listing
Route::get('/listings/{id}', function($id){
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});


// we can change header, and add custom header with a response.
Route::get('/hello', function(){
   return response('<h1>hello world</h1>',200)->header('Content-Type','text/plain')->header('foo','bar'); 
});

// we can use wild-card in a route, which is just a {} .
// we can add constraints to wild cards by where clause
// id can only be a number in this case
// Route::get('/posts/{id}',function($id){
//     //dd is die and dump
//     // dd($id);
//     // ddd is die dump and debug
//     // ddd($id); 
//     return response('Post ' . $id);
// })->where('id','[0-9]+');

// param query route
// Route::get('/search', function(Request $request){
//     // dd($request);
//     // dd($request->name . ' ' . $request->city);
//     return $request->name . ' ' . $request->city;

// });

