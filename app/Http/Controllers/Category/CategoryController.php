<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use AttachFilesTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.category.index',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'name'=>$request->name,
            'image'=>$request->file('image')->getClientOriginalName(),
        ]);
        $this->uploadFile($request,'image','upload_attachments');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //for showing list of products
        $products=Product::where('category_id',$id)->get();
        return view('home.product-list',[

            'products'=>$products,
            'categories'=>Category::all(),
            'showProduct'=>Product::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('pages.category.edit',[
            'category' => $category
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::find($request->id);
        $category->update([
            'name'=>$request->name,
            'image'=>$request->file('image')->getClientOriginalName(),
        ]);
        if ($request->hasFile('image')){
            $this->deleteFile($category->image);

            $this->uploadFile($request,'image','upload_attachments');
            $image_new = $request->file('image')->getClientOriginalName();
                   $category->image = $category->image !== $image_new ? $image_new : $category->image;
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Category::destroy($request->id);
        return redirect()->route('category.index');
    }
}
