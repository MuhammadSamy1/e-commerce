<?php

namespace App\Http\Controllers\Customer\Cart;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        $totalAmount = 0;
        foreach($orders as $item){
            $totalAmount += $item['amount'] * $item['quantity'];
        }
        return view('home.cart',[
            'orders'=>$orders,
            'products'=>Product::all(),
            'categories'=>Category::all(),
            'totalAmount'=>$totalAmount
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Order $order)
    {
        Order::destroy($request->id);
        $order->notifications()->delete();
        session()->flash('success','All Items Cart cleared Successfully');
        return redirect()->route('showcart.index')->with([
            'success'=>'DELETE'
        ]);
    }
}
