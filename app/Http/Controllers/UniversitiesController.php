<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniversitiesController extends Controller
{
    public function index()
    {
        $universities = DB::table('universities')->get();
        return view('admin.universities', compact('universities'));
    }

    public function store(Request $request)
    {
        DB::table('universities')->insert([
            'category'         => $request->category,
            'name'             => $request->name,
            'fees'             => $request->fees,
            'slug'             => $request->slug,
            'pincode'          => $request->pincode,
            'country'          => $request->country,
            'state'            => $request->state,
            'district'         => $request->district,
            'city'             => $request->city,
            'address'          => $request->address,
            'established_year' => $request->established_year,
            'logo'             => $request->file('logo') ? $request->file('logo')->store('logos') : '',
            'banner'           => $request->file('banner') ? $request->file('banner')->store('banners') : '',
            'working_status'   => $request->working_status,
            'emi'              => $request->emi,
            'status'           => $request->status,
        ]);

        return redirect()->back()->with('success', 'University added successfully!');
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $data = [
            'name'             => $request->name,
            'category'         => $request->category,
            'fees'             => $request->fees,
            'slug'             => $request->slug,
            'pincode'          => $request->pincode,
            'country'          => $request->country,
            'state'            => $request->state,
            'district'         => $request->district,
            'city'             => $request->city,
            'address'          => $request->address,
            'established_year' => $request->established_year,
            'working_status'   => $request->working_status,
            'emi'              => $request->emi,
            'status'           => $request->status,
        ];

        // Handle file uploads if available
        if ($request->hasFile('logo')) {
            $logo         = $request->file('logo')->store('logos', 'public');
            $data['logo'] = $logo;
        }

        if ($request->hasFile('banner')) {
            $banner         = $request->file('banner')->store('banners', 'public');
            $data['banner'] = $banner;
        }

        DB::table('universities')->where('id', $id)->update($data);

        return redirect()->back()->with('success', 'University updated successfully.');
    }

    public function delete(Request $request)
    {
        DB::table('universities')->where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'University deleted successfully!');
    }

}
