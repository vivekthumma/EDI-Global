<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = DB::table('roles')->where('status', 0)->get();
        return view('admin.roles', compact('roles'));
    }

    public function store(Request $request)
    {
        DB::table('roles')->insert([
            'name' => $request->role_name,
        ]);
        return redirect()->back()->with('success', 'Role added successfully!');
    }

    public function update(Request $request, $id)
    {
        DB::table('roles')->where('id', $id)->update([
            'name' => $request->edit_role_name,
        ]);
        return redirect()->back()->with('success', 'Role updated successfully!');
    }

    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Role deleted successfully!');
    }
}
