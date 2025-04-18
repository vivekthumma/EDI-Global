<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqBlog;
use App\Models\Blog;
use App\Models\University;
use DB;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class FaqBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqBlogs = FaqBlog::all();
        $blogs = Blog::all();
        return view('admin.faqBlogs.index', compact('faqBlogs', 'blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'blog_id' => 'required|exists:blog,id',
            'answer' => 'required',
            'question' => 'required',
            'status' => 'required|in:0,1',
        ]);

        // Store the program
        FaqBlog::create([
            'blog_id' => $validatedData['blog_id'],
            'answer' => $validatedData['answer'],
            'question' => $validatedData['question'],
            'status' => $validatedData['status'],
        ]);

        // Redirect back with success message
        return redirect()->route('faq-blogs.index')->with('success', 'Faq blog added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FaqBlog  $faqBlog
     * @return \Illuminate\Http\Response
     */
    public function show(FaqBlog $faqBlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FaqBlog  $faqBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(FaqBlog $faqBlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FaqBlog  $faqBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'blog_id' => 'required|exists:blog,id',
            'answer' => 'required',
            'question' => 'required',
            'status' => 'required|in:0,1',
        ]);

        $faqBlogs = FaqBlog::findOrFail($id);
        $faqBlogs->update([
            'blog_id' => $request->blog_id,
            'answer' => $request->answer,
            'question' => $request->question,
            'status' => $request->status,
        ]);

        return redirect()->route('faq-blogs.index')->with('success', 'Faq blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FaqBlog  $faqBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqBlog = FaqBlog::findOrFail($id);
        $faqBlog->delete();

        return redirect()->back()->with('success', 'Faq blog deleted successfully.');
    }
}
