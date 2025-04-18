<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogCatController extends Controller
{
    public function index()
    {
        $categories = DB::table('blog_cat')->get();
        return view('admin.blog_category', compact('categories'));
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => 'required|in:0,1', // 0 = active, 1 = inactive
        ]);

        DB::table('blog_cat')->insert([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
        ]);

        return redirect()->route('blogcat.details')->with('success', 'Category added successfully');
    }

    // Update a category
    public function update(Request $request)
{
    DB::table('blog_cat')
        ->where('id', $request->id)
        ->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
        ]);

    return redirect()->back()->with('success', 'Category updated successfully');
}

public function delete(Request $request)
{
    DB::table('blog_cat')->where('id', $request->id)->delete();

    return redirect()->back()->with('success', 'Category deleted successfully');
}


    
}
