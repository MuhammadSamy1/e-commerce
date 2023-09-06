<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::all();
        return view('pages.address.state.index',[
           'states'=>$states,
           'countries'=>Country::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        return view('pages.address.state.create',[
            'states'=>$states,
            'countries'=>Country::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        State::create([
            'name'=>$request->name,
            'country_id'=>$request->country_id
        ]);
        return redirect()->route('states.index')->with([
           'success'=>'added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $state = State::find($id);
        return view('pages.address.state.edit',[
           'state'=>$state,
           'countries'=> Country::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $state = Country::find($request->id);
        $state->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('states.index')->with([
            'success'=>'Deleted'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        State::destroy($request->id);
        return redirect()->route('states.index')->with([
            'success'=>'Deleted'
        ]);
    }
}
