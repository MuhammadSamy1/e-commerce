<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Notifications\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // for admin to show orders in admin side bar
    public function index()
    {
        $carts=Order::all();
        return view('pages.cart.index',[
            'carts'=>$carts,
            'customers'=>Customer::all(),
            'categories'=>Category::all(),
            'products'=>Product::all(),


        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // creating order is only for customers.that’s why when admin try to create order it won’t work.
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
        $admin = User::all();
        $create_order=auth('customer')->user()->name;

        Notification::send($users,new Cart($cart->id,$create_order,$cart->product_id));
        $admin->each->notify(new Cart($cart->id,$create_order,$cart->product_id));
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('pages.cart.show',[
            'order'=>$order,
            'categories'=>Category::all(),
            'products'=>Product::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('pages.cart.edit',[
            'order'=>$order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order = Order::find($request->id);
        $order->update([
            'amount'=>$request->amount,
            'quantity'=>$request->quantity,
            'size'=>$request->size,
            'color'=>$request->color
        ]);
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, Request $request)
    {
        Order::destroy($request->id);
        $order->notifications()->delete();
        return redirect()->route('orders.index')->with([
            'success'=>'DELETE'
        ]);
    }
}
