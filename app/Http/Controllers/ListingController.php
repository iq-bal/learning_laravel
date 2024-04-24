<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index(){
        // dd(request());
        // we can see the request object by this method
        return view('listings.index',[
            'listings'=>Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // show single listings
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // show create form
    public function create(){
        return view('listings.create'); 
    }

    // store Listing Data
    public function store(Request $request){
        // photo upload er jonno fileSystem a public kore dite hbe
        $formFields = $request->validate([
            'title'=> 'required',
            'company' => ['required',Rule::unique('listings','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        // php artisan storage:link
        Listing::create($formFields);

        return redirect('/')->with('message','Listing created successfully!'); 
    }

    //show edit form
    public function edit(Listing $listing){
        // dd($listing->title); 
        return view('listings.edit',['listing'=>$listing]);
    }

    // update listing data
    public function update(Request $request, Listing $listing){
        // photo upload er jonno fileSystem a public kore dite hbe
        $formFields = $request->validate([
            'title'=> 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        // php artisan storage:link
        $listing->update($formFields);

        return back()->with('message','Listing updated successfully!'); 
    }

    // delete listing 
    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message','Listing Deleted Succesfully');
    }
}
