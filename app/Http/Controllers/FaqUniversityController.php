<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqUniversity;
use App\Models\University;
use DB;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FaqUniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqUniversityes = FaqUniversity::all();
        $universityes = University::all();
        return view('admin.faqUniversityes.index', compact('faqUniversityes', 'universityes'));
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
            'university_id' => 'required|exists:universities,id',
            'answer' => 'required',
            'question' => 'required',
            'status' => 'required|in:0,1',
        ]);

        // Store the program
        FaqUniversity::create([
            'university_id' => $validatedData['university_id'],
            'answer' => $validatedData['answer'],
            'question' => $validatedData['question'],
            'status' => $validatedData['status'],
        ]);

        // Redirect back with success message
        return redirect()->route('faq-universityes.index')->with('success', 'Faq university added successfully!');
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
            'university_id' => 'required|exists:universities,id',
            'answer' => 'required',
            'question' => 'required',
            'status' => 'required|in:0,1',
        ]);

        $faqUniversity = FaqUniversity::findOrFail($id);
        $faqUniversity->update([
            'university_id' => $request->university_id,
            'answer' => $request->answer,
            'question' => $request->question,
            'status' => $request->status,
        ]);

        return redirect()->route('faq-universityes.index')->with('success', 'Faq university updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqUniversity = FaqUniversity::findOrFail($id);
        $faqUniversity->delete();

        return redirect()->back()->with('success', 'Faq university deleted successfully.');
    }
}
