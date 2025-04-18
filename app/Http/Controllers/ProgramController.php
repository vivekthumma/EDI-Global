<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use DB;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        return view('admin.programs.index', compact('programs'));
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
            'name' => 'required|string|max:255',
            'duractions' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        // Store the program
        Program::create([
            'name' => $validatedData['name'],
            'duractions' => $validatedData['duractions'],
            'status' => $validatedData['status'],
        ]);

        // Redirect back with success message
        return redirect()->route('programs.index')->with('success', 'Program added successfully!');
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
        $request->validate([
            'name' => 'required|string|max:255',
            'duractions' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        $program = Program::findOrFail($id);
        $program->update([
            'name' => $request->name,
            'duractions' => $request->duractions,
            'status' => $request->status,
        ]);

        return redirect()->route('programs.index')->with('success', 'Program updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->back()->with('success', 'Program deleted successfully.');
    }

}
