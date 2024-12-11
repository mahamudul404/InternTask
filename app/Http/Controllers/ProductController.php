<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::paginate(5);

        return view('products.index', compact('products'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products',
                'price' => 'required|numeric',
            ],
            [
                'name.required' => 'Product name is required',
                'name.unique' => 'Product name already exists',
                'price.required' => 'Product price is required',
            ]
        );

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'update_name' => 'required|unique:products,name,' . $request->update_id,
                'update_price' => 'required|numeric',
            ],
            [
                'update_name.required' => 'Product name is required',
                'update_name.unique' => 'Product name already exists',
                'update_price.required' => 'Product price is required',
            ]
        );

        Product::where('id', $request->update_id)->update([
            'name' => $request->update_name,
            'price' => $request->update_price
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }


    public function destroy(Request $request)
    {
        Product::find($request->product_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
