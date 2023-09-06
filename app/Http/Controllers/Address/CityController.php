<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('pages.address.city.index',[
            'cities'=>$cities,
            'states'=>State::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('pages.address.city.create',[
            'cities'=>$cities,
            'states'=>State::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        City::create([
            'name'=>$request->name,
            'status'=>$request->status,
            'state_id'=>$request->state_id
        ]);
        return redirect()->route('cities.index')->with([
            'success'=>'city added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $city = City::find($id);
        return view('pages.address.city.edit',[
            'city'=>$city,
            'state'=>State::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $city = City::find($request->id);
        $city->update([
            'name'=>$request->name,
            'status'=>$request->status
        ]);
        return redirect()->route('cities.index')->with([
            'success'=>'Deleted'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city, Request $request)
    {
        City::destroy($request->id);
        return redirect()->route('cities.index')->with([
            'success'=>'Deleted'
        ]);
    }
}
