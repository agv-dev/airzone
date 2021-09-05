<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json(['body' => ['categories_index' => $categories]], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store_data = $request->validate([
            'parent_id' => 'sometimes|exists:categories,id',
            'name' => 'required|unique:categories|max:128',
            'slug' => 'required|unique:categories|regex:/[a-z0-9-]/|max:128',
            'visible' => 'required|boolean'
        ]);

        $category = Category::create($store_data);

        return response()->json(['body' => ['category_store' => $category]], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $category = Category::findOrFail($id);

        return response()->json(['body' => ['category' => $category]], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $update_data = $request->validate([
            'parent_id' => 'sometimes|exists:categories,id',
            'name' => 'required|unique:categories|max:128',
            'slug' => 'required|unique:categories|regex:/[a-z0-9-]/|max:128',
            'visible' => 'required|boolean'
        ]);

        Category::whereId($id)->update($update_data);

        $category = Category::whereId($id)->get();

        return response()->json(['body' => ['category_update' => $category]], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['body' => ['category_detroyed' => (bool)$category]], 200);
    }
}
