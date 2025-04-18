<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cource;
use App\Models\SubCource;
use DB;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SubCourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cources = Cource::all();
        $subCources = SubCource::all();
        return view('admin.subCource.index', compact('cources', 'subCources'));
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
            'cource_id' => 'required|exists:cources,id',
            'sub_cource_name' => 'required',
            'slug' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brochure' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'eligibility' => 'required',
            'short_content' => 'required',
            'syllabus' => 'required',
            'about' => 'required',
            'admission_process' => 'required',
            'carrier_scope' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',

            
        ]);

        $data = $request->only(['cource_id', 'sub_cource_name', 'slug', 'eligibility', 'short_content', 'syllabus', 'about', 'admission_process', 'carrier_scope', 'meta_title', 'meta_description']);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/subCource'), $imageName);
            $data['image'] = 'uploads/subCource/' . $imageName;
        }
        if ($request->hasFile('brochure')) {
            $imageName = time() . '_' . $request->brochure->getClientOriginalName();
            $request->brochure->move(public_path('uploads/subCource'), $imageName);
            $data['brochure'] = 'uploads/subCource/' . $imageName;
        }
        if ($request->hasFile('icon')) {
            $imageName = time() . '_' . $request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads/subCource'), $imageName);
            $data['icon'] = 'uploads/subCource/' . $imageName;
        }

        SubCource::create($data);

        return redirect()->back()->with('success', 'Sub cource added successfully!');
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
    public function subCourcesUpdate(Request $request, SubCource $subCource)
    {
        $subCource = SubCource::findOrFail($request->id);

        $request->validate([
            'cource_id' => 'required|exists:cources,id',
            'sub_cource_name' => 'required',
            'slug' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brochure' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'eligibility' => 'required',
            'short_content' => 'required',
            'syllabus' => 'required',
            'about' => 'required',
            'admission_process' => 'required',
            'carrier_scope' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ]);

        
        $subCource->cource_id = $request->cource_id;
        $subCource->sub_cource_name = $request->sub_cource_name;
        $subCource->slug = $request->slug;
        $subCource->eligibility = $request->eligibility;
        $subCource->short_content = $request->short_content;
        $subCource->syllabus = $request->syllabus;
        $subCource->about = $request->about;
        $subCource->admission_process = $request->admission_process;
        $subCource->carrier_scope = $request->carrier_scope;
        $subCource->meta_title = $request->meta_title;
        $subCource->meta_description = $request->meta_description;
        $subCource->carrier_scope = $request->carrier_scope;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/subCource'), $imageName);
            $subCource->image = 'uploads/subCource/' . $imageName;
        }

        if ($request->hasFile('brochure')) {
            $brochureName = time() . '_' . $request->brochure->getClientOriginalName();
            $request->brochure->move(public_path('uploads/subCource'), $brochureName);
            $subCource->brochure = 'uploads/subCource/' . $brochureName;
        }

        if ($request->hasFile('icon')) {
            $iconName = time() . '_' . $request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads/subCource'), $iconName);
            $subCource->icon = 'uploads/subCource/' . $iconName;
        }

        $subCource->save();

        return redirect()->route('sub-co.index')->with('success', 'Sub cource updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCource = SubCource::findOrFail($id);
        $subCource->delete();

        return redirect()->back()->with('success', 'Sub cource deleted successfully.');
    }
}
