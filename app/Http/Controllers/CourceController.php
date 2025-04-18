<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cource;
use App\Models\Program;
use App\Models\Category;
use DB;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cources = Cource::all();
        $programs = Program::all();
        $categories = Category::all();
        return view('admin.cources.index', compact('cources', 'programs', 'categories'));
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
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'category_id' => 'required|exists:category,id',
            'cource_name' => 'required',
            'short_name' => 'required',
            'slug' => 'required',
            'fees' => 'required',
            'eligibility' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brochure' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'short_content' => 'required',
            'about' => 'required',
            'key_highlights' => 'required',
            'subject_syllabus' => 'required',
            'eligibility_duration' => 'required',
            'program_fee' => 'required',
            'admission_process' => 'required',
            'course_specialization' => 'required',
            'education_loan' => 'required',
            'worth_it' => 'required',
            'carrier_scope' => 'required',
        ]);

        $data = $request->only(['category_id', 'program_id', 'cource_name', 'short_name', 'slug', 'duration', 'fees', 'eligibility', 'meta_title', 'meta_description', 'short_content', 'about', 'key_highlights', 'subject_syllabus', 'eligibility_duration', 'program_fee', 'admission_process', 'course_specialization', 'education_loan', 'worth_it', 'carrier_scope']);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/cources'), $imageName);
            $data['image'] = 'uploads/cources/' . $imageName;
        }
        if ($request->hasFile('brochure')) {
            $imageName = time() . '_' . $request->brochure->getClientOriginalName();
            $request->brochure->move(public_path('uploads/cources'), $imageName);
            $data['brochure'] = 'uploads/cources/' . $imageName;
        }
        if ($request->hasFile('icon')) {
            $imageName = time() . '_' . $request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads/cources'), $imageName);
            $data['icon'] = 'uploads/cources/' . $imageName;
        }

        Cource::create($data);

        return redirect()->back()->with('success', 'Cource added successfully!');
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
    public function courcesUpdate(Request $request, Cource $cource)
    {
        $cource = Cource::findOrFail($request->id);



        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'category_id' => 'required|exists:category,id',
            'cource_name' => 'required',
            'short_name' => 'required',
            'slug' => 'required',
            'fees' => 'required',
            'eligibility' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brochure' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'short_content' => 'required',
            'about' => 'required',
            'key_highlights' => 'required',
            'subject_syllabus' => 'required',
            'eligibility_duration' => 'required',
            'program_fee' => 'required',
            'admission_process' => 'required',
            'course_specialization' => 'required',
            'education_loan' => 'required',
            'worth_it' => 'required',
            'carrier_scope' => 'required',
        ]);

        $cource->category_id = $request->category_id;
        $cource->program_id = $request->program_id;
        $cource->cource_name = $request->cource_name;
        $cource->short_name = $request->short_name;
        $cource->slug = $request->slug;
        $cource->duration = $request->duration;
        $cource->fees = $request->fees;
        $cource->eligibility = $request->eligibility;
        $cource->meta_title = $request->meta_title;
        $cource->meta_description = $request->meta_description;
        $cource->short_content = $request->short_content;
        $cource->about = $request->about;
        $cource->key_highlights = $request->key_highlights;
        $cource->subject_syllabus = $request->subject_syllabus;
        $cource->eligibility_duration = $request->eligibility_duration;
        $cource->program_fee = $request->program_fee;
        $cource->admission_process = $request->admission_process;
        $cource->course_specialization = $request->course_specialization;
        $cource->education_loan = $request->education_loan;
        $cource->worth_it = $request->worth_it;
        $cource->carrier_scope = $request->carrier_scope;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/cources'), $imageName);
            $cource->image = 'uploads/cources/' . $imageName;
        }

        if ($request->hasFile('brochure')) {
            $brochureName = time() . '_' . $request->brochure->getClientOriginalName();
            $request->brochure->move(public_path('uploads/cources'), $brochureName);
            $cource->brochure = 'uploads/cources/' . $brochureName;
        }

        if ($request->hasFile('icon')) {
            $iconName = time() . '_' . $request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads/cources'), $iconName);
            $cource->icon = 'uploads/cources/' . $iconName;
        }

        $cource->save();

        return redirect()->route('cources.index')->with('success', 'Cource updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cource = Cource::findOrFail($id);
        $cource->delete();

        return redirect()->back()->with('success', 'Cource deleted successfully.');
    }
}
