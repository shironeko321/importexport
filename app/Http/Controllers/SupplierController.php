<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.supplier.index", [
            "collection" => Supplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.supplier.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $supplier = $request->validate([
            'name' => "required|max:30",
            'email' => "required|email",
            'phone' => "required|numeric",
            'address' => "required|max:40",
            'description' => "required|max:100",
        ]);

        Supplier::create($supplier);

        return redirect()->route("supplier.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier, $id)
    {
        return view("dashboard.supplier.show", [
            "supplier" => $supplier->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier, $id)
    {
        return view("dashboard.supplier.edit", [
            "supplier" => $supplier->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier, $id)
    {
        $data = $request->validate([
            'name' => "required|max:30",
            'email' => "required|email",
            'phone' => "required|numeric",
            'address' => "required|max:40",
            'description' => "required|max:100",
        ]);

        $supplier->find($id)->update($data);

        return redirect()->route("supplier.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier, $id)
    {
        $supplier->find($id);
        $supplier->delete();

        return redirect()->route("supplier.index");
    }
}
