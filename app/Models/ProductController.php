<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Fetch all products
    public function index()
    {
        $products = DB::table('products')->get();
        return response()->json($products);
    }

    // Show a single product by ID
    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return response()->json($product);
    }

    // Create a new product
    public function store(Request $request)
    {
        $data = $request->only(['company_id', 'name', 'description', 'category', 'price', 'image', 'status']);
        DB::table('products')->insert($data);
        return response()->json(['message' => 'Product created successfully.']);
    }

    // Update a product by ID
    public function update(Request $request, $id)
    {
        $data = $request->only(['company_id', 'name', 'description', 'category', 'price', 'image', 'status']);
        DB::table('products')->where('id', $id)->update($data);
        return response()->json(['message' => 'Product updated successfully.']);
    }

    // Delete a product by ID
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return response()->json(['message' => 'Product deleted successfully.']);
    }
}
