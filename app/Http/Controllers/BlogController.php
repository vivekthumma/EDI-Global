<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = DB::table('blog')->orderBy('created_at', 'desc')->get();
        return view('admin.blogs', compact('blogs'));
    }

    // Store a new blog
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'slug' => 'required|string|max:255|unique:blogs,slug',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'blog_cat' => 'nullable|string|max:255',
        //     'meta_title' => 'nullable|string|max:255',
        //     'meta_description' => 'nullable|string',
        //     'short_content' => 'nullable|string',
        //     'content' => 'nullable|string',
        //     'promoted' => 'nullable|boolean',
        //     'status' => 'nullable|boolean',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }

        DB::table('blog')->insert([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imagePath,
            'blog_cat' => $request->blog_cat,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'promoted' => $request->promoted ?? 0,
            'status' => $request->status ?? 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog added successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $blog = DB::table('blog')->where('id', $id)->first();
        
        if (!$blog) {
            return redirect()->route('blogs.index')->with('error', 'Blog not found');
        }

        $blogs = DB::table('blog')->orderBy('created_at', 'desc')->get();
        return view('admin.blogs', compact('blog', 'blogs'));
    }

    // Update a blog
    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'slug' => 'required|string|max:255|unique:blogs,slug,'.$id,
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'blog_cat' => 'nullable|string|max:255',
        //     'meta_title' => 'nullable|string|max:255',
        //     'meta_description' => 'nullable|string',
        //     'short_content' => 'nullable|string',
        //     'content' => 'nullable|string',
        //     'promoted' => 'nullable|boolean',
        //     'status' => 'nullable|boolean',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $blog = DB::table('blog')->where('id', $id)->first();
        
        if (!$blog) {
            return redirect()->route('blogs.index')->with('error', 'Blog not found');
        }

        $imagePath = $blog->image;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }

        DB::table('blog')->where('id', $id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imagePath,
            'blog_cat' => $request->blog_cat,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'promoted' => $request->promoted ?? 0,
            'status' => $request->status ?? 0,
            'updated_at' => now(),
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    // Delete a blog
    public function destroy($id)
    {
        $blog = DB::table('blog')->where('id', $id)->first();
        
        if (!$blog) {
            return redirect()->route('blogs.index')->with('error', 'Blog not found');
        }
        
        // Delete image if exists
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        
        DB::table('blog')->where('id', $id)->delete();
        
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }
    
}
