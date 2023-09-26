<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.product.index", [
            "collection" => Product::with("supplier")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.product.create", [
            "supplier" => Supplier::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $request->validate([
            "name" => "required|max:20",
            "price" => "required|numeric|min:0",
            "stock" => "required|numeric|min:0",
            "description" => "required|max:100",
            "supplier" => "required|exists:suppliers,id|exclude",
        ]);

        Product::create([...$product, "supplier_id" => $request->input("supplier")]);

        return redirect()->route("product.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        return view("dashboard.product.show", [
            "product" => $product->with("supplier")->find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        return view("dashboard.product.edit", [
            "product" => $product->find($id),
            "supplier" => Supplier::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = $request->validate([
            "name" => "required|max:20",
            "price" => "required|numeric|min:0",
            "stock" => "required|numeric|min:0",
            "description" => "required|max:100",
            "supplier" => "required|exists:suppliers,id|exclude",
        ]);

        Product::find($id)->update([...$product, "supplier_id" => $request->input("supplier")]);

        return redirect()->route("product.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product->find($id);
        $product->delete();

        return redirect()->route("product.index");
    }
}
