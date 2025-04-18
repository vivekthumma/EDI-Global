<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show(){
        return view('admin.user');
    }

    public function rolles_show(){
        return view('admin.roles');
    }

    public function counceler_show(){
        return view('admin.counceler');
    }

    public function category_show(){
        return view('admin.category');
    }

    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.user', compact('users'));
    }

    public function store(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'mob' => $request->mob,
            'status' => $request->status == 'active' ? 0 : 1,
        ]);
        return redirect()->route('users.index');
    }

    public function update(Request $request)
    {
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'mob' => $request->mob,
                'status' => $request->status == 'active' ? 0 : 1,
            ]);
        return redirect()->route('users.index');
    }

    public function delete(Request $request)
    {
        DB::table('users')->where('id', $request->id)->delete();
        return redirect()->route('users.index');
    }
}
