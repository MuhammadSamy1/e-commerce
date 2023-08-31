<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use AttachFilesTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.product.index',[
            'products'=>$products,
            'categories'=>Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.product.create',[
            'categories'=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$request->file('image')->getClientOriginalName(),
            'price'=>$request->price,
            'discount_price'=>$request->discount_price,
            'category_id'=>$request->category_id,
        ]);
        $this->uploadFile($request,'image','upload_attachments');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //for showing product details when we press on buy now
        $categories=Category::all();
        $product=Product::find($id);
        return view('home.product-detail',[
            'product'=>$product,
            'categories'=>$categories,
            'products'=>Product::all(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.product.edit',[
            'product'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product = Product::find($request->id);
        $product->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'discount_price'=>$request->discount_price,
            'category_id'=>$request->category_id,
        ]);
        if ($request->hasFile('image')){
            $this->deleteFile($product->image);

            $this->uploadFile($request,'image','upload_attachments');
            $image_new = $request->file('image')->getClientOriginalName();
            $product->image = $product->image !== $image_new ? $image_new : $product->image;
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Product::destroy($request->id);
        return redirect()->route('product.index');
    }
}
