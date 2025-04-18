<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
{
    $categories = DB::table('category')->get();
    return view('admin.category', compact('categories'));
}


public function store(Request $request)
{
    DB::table('category')->insert([
        'category_name' => $request->category_name,
        'slug' => $request->slug,
        'status' => $request->status == 'active' ? 0 : 1
    ]);

    return redirect()->back()->with('success', 'Category added successfully.');
}


public function update(Request $request)
{
    DB::table('category')->where('id', $request->id)->update([
        'category_name' => $request->category_name,
        'slug' => $request->slug,
        'status' => $request->status == 'active' ? 0 : 1
    ]);

    return redirect()->back()->with('success', 'Category updated successfully.');
}



public function delete(Request $request)
{
    DB::table('category')->where('id', $request->id)->delete();
    return redirect()->back()->with('success', 'Category deleted successfully.');
}


}
