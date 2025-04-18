<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VsCompareDetailsController extends Controller
{
    public function index()
    {
        $vscompares = DB::table('vs_compare')->get();
        return view('admin.vs_compare', compact('vscompares'));
    }

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'university_first_name' => 'required|string|max:255',
        //     'university_second_name' => 'required|string|max:255',
        //     'status' => 'required|in:active,inactive',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        try {
            DB::table('vs_compare')->insert([
                'university_first_name' => $request->university_first_name,
                'university_second_name' => $request->university_second_name,
                'status' => $request->status,
            ]);

            return redirect()->route('vscompare_details.index')
                ->with('success', 'Comparison added successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error adding comparison: '.$e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'university_first_name' => 'required|string|max:255',
        //     'university_second_name' => 'required|string|max:255',
        //     'status' => 'required|in:active,inactive',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        try {
            DB::table('vs_compare')->where('id', $id)->update([
                'university_first_name' => $request->university_first_name,
                'university_second_name' => $request->university_second_name,
                'status' => $request->status,
            ]);

            return redirect()->route('vscompare_details.index')
                ->with('success', 'Comparison updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error updating comparison: '.$e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = DB::table('vs_compare')->where('id', $id)->delete();

            if ($deleted) {
                return redirect()->route('vscompare_details.index')
                    ->with('success', 'Comparison deleted successfully!');
            }

            return redirect()->route('vscompare_details.index')
                ->with('error', 'Comparison not found');

        } catch (\Exception $e) {
            return redirect()->route('vscompare_details.index')
                ->with('error', 'Error deleting comparison: '.$e->getMessage());
        }
    }


}
