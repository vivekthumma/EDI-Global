<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniversitiesDetailsController extends Controller
{
    public function index()
    {
        $universities = DB::table('universities')->get();

        $universityDetails = DB::table('university_details')
            ->join('universities', 'university_details.university_id', '=', 'universities.id')
            ->select('university_details.*', 'universities.name as university_name') // change this line
            ->get();

        return view('admin.universities_details', compact('universities', 'universityDetails'));
    }

    // Store
    public function store(Request $request)
{
    // $request->validate([
    //     'university_id' => 'required|exists:universities,id',
    //     'offer' => 'required',
    // ]);

    $filePath = null;

    if ($request->hasFile('university_prospect_file')) {
        $filePath = $request->file('university_prospect_file')->store('uploads/university_prospect', 'public');
    }

    DB::table('university_details')->insert([
        'university_id' => $request->university_id,
        'offer_name' => $request->offer, // make sure input is named "offer"
        'rating' => $request->rating,
        'short_content' => $request->short_content,
        'university_about' => $request->about,
        'jobs_internships' => $request->jobs_internships,
        'sample_certificate' => $request->sample_certificate,
        'education_loan_emi' => $request->education_loan_emi,
        'admission_process' => $request->admission_process,
        'exam_pattern' => $request->exam_pattern,
        'placement' => $request->placement,
        'summary' => $request->summary,
        'meta_description' => $request->meta_description,
        'meta_title' => $request->meta_title,
        'university_prospect_path' => $filePath,
        'status' => $request->status,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'University detail added!');
}


    // Update
    public function update(Request $request)
    {
        // $request->validate([
        //     'id' => 'required',
        //     'university_id' => 'required',
        //     'offer' => 'required',
        // ]);

        $data = [
            'university_id'      => $request->university_id,
            'offer_name'         => $request->offer,
            'rating'             => $request->rating,
            'short_content'      => $request->short_content,
            'university_about'   => $request->about,
            'jobs_internships'   => $request->jobs_internships,
            'sample_certificate' => $request->sample_certificate,
            'education_loan_emi' => $request->education_loan_emi,
            'admission_process'  => $request->admission_process,
            'exam_pattern'       => $request->exam_pattern,
            'placement'          => $request->placement,
            'summary'            => $request->summary,
            'meta_description'   => $request->meta_description,
            'meta_title'         => $request->meta_title,
            'status'             => $request->status,
            'updated_at'         => now(),
        ];

        if ($request->hasFile('university_prospect_file')) {
            $data['university_prospect_path'] = $request->file('university_prospect_file')->store('uploads/university_prospect', 'public');
        }

        DB::table('university_details')->where('id', $request->id)->update($data);

        return redirect()->back()->with('success', 'University detail updated!');
    }

    // Delete
    public function delete(Request $request)
    {
        DB::table('university_details')->where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'University detail deleted!');
    }
}
