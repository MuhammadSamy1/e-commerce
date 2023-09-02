<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts=Order::all();
        return view('pages.cart.index',[
            'carts'=>$carts,
            'categories'=>Category::all(),
            'products'=>Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carts=Order::all();
        return view('home.product-detail',[
            'carts'=>$carts,
            'categories'=>Category::all(),
            'products'=>Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = Order::create([
            'customer_id'=>auth('customer')->user()->id,
            'user_id'=>1,
            'category_id'=>$request->category_id,
            'product_id'=>$request->product_id,
            'amount'=>$request->amount,
            'quantity'=>$request->quantity,
            'size'=>$request->size,
            'color'=>$request->color
        ]);
        $users = Customer::where('id','=',auth('customer')->user()->id)->get();
        $create_order=auth('customer')->user()->name;

        Notification::send($users,new Cart($cart->id,$create_order,$cart->product_id));

        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
