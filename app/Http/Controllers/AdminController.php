<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.admin.index", [
            "collection" => Admin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.admin.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Admin $admin)
    {
        $validate = $request->validate([
            "name" => "required|min:4|max:12",
            "email" => "required|email",
            "password" => "required|confirmed|min:8|max:12"
        ]);

        $admin->create($validate);

        return redirect()->route("admin.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($id, Admin $admin)
    {
        return view("dashboard.admin.show", [
            "admin" => $admin->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Admin $admin)
    {
        return view("dashboard.admin.edit", [
            "admin" => $admin->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin, $id)
    {
        $admin->find($id);
        $admin->delete();

        return redirect()->route("admin.index");
    }
}
