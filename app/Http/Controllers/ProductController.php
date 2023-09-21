<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('backend.admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();
        return view('backend.admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'qty' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'inc/frontend/img/';
            // $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $productImage =$image->getClientOriginalName();
            $image->move($destinationPath, $productImage);
            $product['image'] = "$productImage";
        }

        Product::create($product);

        return redirect()->route('products.index')->with('message', 'Product created successfully.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Categories::all();
        return view('backend.admin.products.edit',compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'qty' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::find($id);

        $product->title = $request->input('title');
        $product->category = $request->input('category');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->discount_price = $request->input('discount_price');
        $product->qty = $request->input('qty');

        if ($image = $request->file('image')) {
            $destinationPath = 'inc/frontend/img/';
            // $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $productImage =$image->getClientOriginalName();
            $image->move($destinationPath, $productImage);

            // Delete old image if it exists
            if ($product->image && file_exists(public_path($destinationPath . $product->image))) {
                unlink(public_path($destinationPath . $product->image));
            }

            $product->image = $productImage;
        }

        $product->save();

        return redirect()->route('products.index')->with('message', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            $filePath = public_path('inc/backend/img/' . $product->image);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $product->delete();
          return redirect()->route('products.index')->with('message', 'Product deleted successfully.');
    }
}
