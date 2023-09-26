<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.users.index", [
            "collection" => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $validate = $request->validate([
            "name" => "required|min:4|max:12",
            "email" => "required|email",
            "password" => "required|confirmed|min:8|max:12"
        ]);

        $user->create($validate);

        return redirect()->route("users.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, User $user)
    {
        return view("dashboard.users.show", [
            "user" => $user->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, User $user)
    {
        return view("dashboard.users.edit", [
            "user" => $user->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, string $id)
    {
        $user->find($id);
        $user->delete();

        return redirect()->route("users.index");
    }
}
