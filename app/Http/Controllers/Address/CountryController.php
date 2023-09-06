<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        return view('pages.address.country.index',[
            'countries'=>$countries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('pages.address.country.create',[
            'countries'=>$countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Country::create([
           'name'=>$request->name,
           'status'=>$request->status
        ]);
        return redirect()->route('countries.index')->with([
            'Success'=>'Country added Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $country = Country::find($id);
        return view('pages.address.country.edit',[
           'country'=>$country
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $country=Country::find($request->id);
        $country->update([
            'name'=>$request->name,
            'status'=>$request->status
        ]);
        return redirect()->route('countries.index')->with([
           'Edited'=>'Country edited successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country,Request $request)
    {
        Country::destroy($request->id);
        return redirect()->route('countries.index')->with([
            'warning'=>'Delete'
        ]);
    }
}
