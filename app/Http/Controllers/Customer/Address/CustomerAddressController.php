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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
