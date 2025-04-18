<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCource;
use App\Models\Cource;
use DB;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FaqCourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqCources = FaqCource::all();
        $cources = Cource::all();
        return view('admin.faqCources.index', compact('faqCources', 'cources'));
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
            'cource_id' => 'required|exists:cources,id',
            'answer' => 'required',
            'question' => 'required',
            'status' => 'required|in:0,1',
        ]);

        // Store the program
        FaqCource::create([
            'cource_id' => $validatedData['cource_id'],
            'answer' => $validatedData['answer'],
            'question' => $validatedData['question'],
            'status' => $validatedData['status'],
        ]);

        // Redirect back with success message
        return redirect()->route('faq-cources.index')->with('success', 'Faq cource added successfully!');
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
            'cource_id' => 'required|exists:cources,id',
            'answer' => 'required',
            'question' => 'required',
            'status' => 'required|in:0,1',
        ]);

        $faqCources = FaqCource::findOrFail($id);
        $faqCources->update([
            'cource_id' => $request->cource_id,
            'answer' => $request->answer,
            'question' => $request->question,
            'status' => $request->status,
        ]);

        return redirect()->route('faq-cources.index')->with('success', 'Faq cource updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqCources = FaqCource::findOrFail($id);
        $faqCources->delete();

        return redirect()->back()->with('success', 'Faq cource deleted successfully.');
    }
}
