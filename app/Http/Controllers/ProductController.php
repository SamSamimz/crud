<?php

namespace App\Http\Controllers;

use App\Models\Api\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->get();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image'
        ];
        $validator  = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors(),422]);
        }
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
        ]);
        return response()->json(['success' => 'You enter a product successfuly!']);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        if($product){
            return response()->json($product);
        }else {
            return response()->json(['error' => 'Not found Product!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if($product) {
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $request->image,
            ]);
            return response()->json(['update' => 'Product updated successfully!']);
        }else {
            return response()->json(['error' => 'Product Not Found!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product) {
            $product->delete();
            return response()->json(['delete' => 'Product deleted successfully!']);
        }else {
            return response()->json(['error' => 'Product Not Found!']);
        }
    }
}
