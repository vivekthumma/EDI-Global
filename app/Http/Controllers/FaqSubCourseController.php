<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqSubCourse;
use App\Models\SubCource;
use DB;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FaqSubCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqSubCourse = FaqSubCourse::all();
        $subCources = SubCource::all();
        return view('admin.faqSubCourse.index', compact('faqSubCourse', 'subCources'));
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
            'sub_cource__id' => 'required|exists:sub_cources,id',
            'answer' => 'required',
            'question' => 'required',
            'status' => 'required|in:0,1',
        ]);

        // Store the program
        FaqSubCourse::create([
            'sub_cource__id' => $validatedData['sub_cource__id'],
            'answer' => $validatedData['answer'],
            'question' => $validatedData['question'],
            'status' => $validatedData['status'],
        ]);

        // Redirect back with success message
        return redirect()->route('faq-subCourse.index')->with('success', 'Faq sub cource added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sub_cource__id' => 'required|exists:sub_cources,id',
            'answer' => 'required',
            'question' => 'required',
            'status' => 'required|in:0,1',
        ]);

        $faqSubCourse = FaqSubCourse::findOrFail($id);
        $faqSubCourse->update([
            'sub_cource__id' => $request->sub_cource__id,
            'answer' => $request->answer,
            'question' => $request->question,
            'status' => $request->status,
        ]);

        return redirect()->route('faq-subCourse.index')->with('success', 'Faq sub cource updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqSubCourse = FaqSubCourse::findOrFail($id);
        $faqSubCourse->delete();

        return redirect()->back()->with('success', 'Faq sub cource deleted successfully.');
    }
}
