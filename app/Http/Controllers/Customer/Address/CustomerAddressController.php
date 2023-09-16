<?php

namespace App\Http\Controllers\Customer\Address;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Customer_address;
use App\Models\Order;
use App\Models\State;
use Illuminate\Http\Request;

class CustomerAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer_address = Customer_address::all();
        return view('home.checkout',[
            'customer_address'=>$customer_address,
            'countries'=>Country::all(),
            'states'=>State::all(),
            'cities'=>City::all(),
            'orders'=>Order::all(),
            'categories'=>Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer_address = Customer_address::all();
        return view('home.checkout',[
            'customer_address'=>$customer_address,
            'countries'=>Country::all(),
            'states'=>State::all(),
            'cities'=>City::all(),
            'orders'=>Order::all(),
            'categories'=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer_address::create([
            'customer_id'=>$request->customer_id,
            'country_id'=>$request->country_id,
            'state_id'=>$request->state_id,
            'city_id'=>$request->city_id,
            'address_title'=>$request->address_title,
            'default_address'=>$request->default_address,
            'first_name'=>$request->first_name,
            'second_name'=>$request->second_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'zip_code'=>$request->zip_code,
            'po_box'=>$request->po_box
        ]);
        return redirect()->back()->with([
            'success'=>'The Address Created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer_address $customer_address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer_address $customer_address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer_address $customer_address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer_address $customer_address)
    {
        //
    }
}
