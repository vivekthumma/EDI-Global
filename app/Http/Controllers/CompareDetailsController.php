<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompareDetailsController extends Controller
{
    public function index()
    {
        $universities = DB::table('compare_details')
                        ->select('id', 'university', 'student_rating', 'satisfaction_rate', 
                                'naac_score', 'naac_grade', 'credite_points', 'nirf_ranking',
                                'wes', 'online_classes', 'status')
                        ->get();
        
        return view('admin.compare_details', compact('universities'));
    }

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'university' => 'required|string|max:255',
        //     'student_rating' => 'nullable|numeric|min:0|max:5',
        //     'satisfaction_rate' => 'nullable|numeric|min:0|max:100',
        //     'naac_score' => 'nullable|numeric|min:0|max:100',
        //     'naac_grade' => 'nullable|string|max:10',
        //     'credite_points' => 'nullable|string|max:100',
        //     'nirf_ranking' => 'nullable|integer',
        //     'examination_mode' => 'nullable|string|max:100',
        //     'sample_certificate' => 'nullable|string|max:255',
        //     'wes' => 'nullable|boolean',
        //     'online_classes' => 'nullable|boolean',
        //     'industry_ready' => 'nullable|boolean',
        //     'emi_facility' => 'nullable|boolean',
        //     'status' => 'nullable|boolean',
        //     'eligibility' => 'nullable|string',
        //     'examination_pattern' => 'nullable|string',
        //     'pros' => 'nullable|string',
        //     'learning_facility' => 'nullable|string',
        //     'placement' => 'nullable|string',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        DB::table('compare_details')->insert([
            'university' => $request->university,
            'student_rating' => $request->student_rating ?? null,
            'satisfaction_rate' => $request->satisfaction_rate ?? null,
            'naac_score' => $request->naac_score ?? null,
            'naac_grade' => $request->naac_grade ?? null,
            'credite_points' => $request->credite_points ?? null,
            'eligibility' => $request->eligibility ?? null,
            'examination_pattern' => $request->examination_pattern ?? null,
            'pros' => $request->pros ?? null,
            'nirf_ranking' => $request->nirf_ranking ?? null,
            'sample_certificate' => $request->sample_certificate ?? null,
            'examination_mode' => $request->examination_mode ?? null,
            'learning_facility' => $request->learning_facility ?? null,
            'placement' => $request->placement ?? null,
            'wes' => $request->wes ?? 0,
            'online_classes' => $request->online_classes ?? 0,
            'industry_ready' => $request->industry_ready ?? 0,
            'emi_facility' => $request->emi_facility ?? 0,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('compare_details.index')->with('success', 'University added successfully!');
    }

    public function edit($id)
    {
        $university = DB::table('compare_details')->where('id', $id)->first();
        return response()->json($university);
    }

    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'university' => 'required|string|max:255',
        //     'student_rating' => 'nullable|numeric|min:0|max:5',
        //     'satisfaction_rate' => 'nullable|numeric|min:0|max:100',
        //     'naac_score' => 'nullable|numeric|min:0|max:100',
        //     'naac_grade' => 'nullable|string|max:10',
        //     'credite_points' => 'nullable|string|max:100',
        //     'nirf_ranking' => 'nullable|integer',
        //     'examination_mode' => 'nullable|string|max:100',
        //     'sample_certificate' => 'nullable|string|max:255',
        //     'wes' => 'nullable|boolean',
        //     'online_classes' => 'nullable|boolean',
        //     'industry_ready' => 'nullable|boolean',
        //     'emi_facility' => 'nullable|boolean',
        //     'status' => 'nullable|boolean',
        //     'eligibility' => 'nullable|string',
        //     'examination_pattern' => 'nullable|string',
        //     'pros' => 'nullable|string',
        //     'learning_facility' => 'nullable|string',
        //     'placement' => 'nullable|string',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        DB::table('compare_details')->where('id', $id)->update([
            'university' => $request->university,
            'student_rating' => $request->student_rating ?? null,
            'satisfaction_rate' => $request->satisfaction_rate ?? null,
            'naac_score' => $request->naac_score ?? null,
            'naac_grade' => $request->naac_grade ?? null,
            'credite_points' => $request->credite_points ?? null,
            'eligibility' => $request->eligibility ?? null,
            'examination_pattern' => $request->examination_pattern ?? null,
            'pros' => $request->pros ?? null,
            'nirf_ranking' => $request->nirf_ranking ?? null,
            'sample_certificate' => $request->sample_certificate ?? null,
            'examination_mode' => $request->examination_mode ?? null,
            'learning_facility' => $request->learning_facility ?? null,
            'placement' => $request->placement ?? null,
            'wes' => $request->wes ?? 0,
            'online_classes' => $request->online_classes ?? 0,
            'industry_ready' => $request->industry_ready ?? 0,
            'emi_facility' => $request->emi_facility ?? 0,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('compare_details.index')->with('success', 'University updated successfully!');
    }

    public function destroy($id)
    {
        DB::table('compare_details')->where('id', $id)->delete();
        return redirect()->route('compare_details.index')->with('success', 'University deleted successfully!');
    }
}