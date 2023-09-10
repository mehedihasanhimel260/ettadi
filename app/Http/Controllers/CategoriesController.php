<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::get();
        return view('backend.admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        // Create a new Category instance and set its attributes.
        $category = new Categories();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        // Save the category to the database.
        $category->save();

        return redirect()->route('categories.index')
                        ->with('message', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories,$id)
    {
        $categories = Categories::findOrFail($id);
        return view('backend.admin.categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories,$id)
    {
        $category = Categories::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->route('categories.index')
        ->with('message', 'Category update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories,$id)
    {
        $categori=Categories::findOrFail($id);
        $categori->delete();
        return redirect()->route('categories.index')
        ->with('warning', 'Category delete successfully.');
    }
}
