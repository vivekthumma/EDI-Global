<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CounsellorController extends Controller
{
    public function index()
    {
        // Get all counsellors
        $counsellors = DB::table('counsellor_details')->get();

        return view('admin.counsellor')->with('counsellors', $counsellors);

    }

    public function store(Request $request)
    {
        $request->validate([
            'counsellor'  => 'required',
            'experience'  => 'required',
            'rating'      => 'required|numeric|min:0|max:5',
            'image'       => 'nullable|image',
            'designation' => 'required',
            'aboutus'     => 'required',
        ]);

        // Handling file upload for profile image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Insert the new counsellor into the database
        DB::table('counsellor_details')->insert([
            'counsellor'  => $request->input('counsellor'),
            'experience'  => $request->input('experience'),
            'rating'      => $request->input('rating'),
            'image'       => $imagePath,
            'designation' => $request->input('designation'),
            'aboutus'     => $request->input('aboutus'),
            'status'      => 0, // Default is active
        ]);

        return redirect()->route('counsellors.index');
    }

    public function edit($id)
    {
        // Fetch the counsellor data for editing
        $counsellor = DB::table('counsellor_details')->where('id', $id)->first();
        return view('admin.counselor_edit', compact('counsellor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'counsellor'  => 'required',
            'experience'  => 'required',
            'rating'      => 'required|numeric|min:0|max:5',
            'image'       => 'nullable|image',
            'designation' => 'required',
            'aboutus'     => 'required',
        ]);

        // for old image
        // Store the old image if no new one is uploaded
        $imagePath = $request->hasFile('image')
        ? $request->file('image')->store('images', 'public')
        : DB::table('counsellor_details')->where('id', $id)->value('image');

        // Handling file upload for profile image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Update the counsellor data
        DB::table('counsellor_details')->where('id', $id)->update([
            'counsellor'  => $request->input('counsellor'),
            'experience'  => $request->input('experience'),
            'rating'      => $request->input('rating'),
            'image'       => $imagePath ?? DB::table('counsellor_details')->where('id', $id)->value('image'), // Retain the previous image if no new image is uploaded
            'designation' => $request->input('designation'),
            'aboutus'     => $request->input('aboutus'),
        ]);

        return redirect()->route('counsellors.index');
    }

    public function destroy($id)
    {
        // Delete the counsellor record
        DB::table('counsellor_details')->where('id', $id)->delete();
        return redirect()->route('counsellors.index');
    }
}
