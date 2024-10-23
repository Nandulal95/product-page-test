<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductDetailResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        try {
            $product = Product::query()->whereSlug($slug)->first();

            if(!$product){
                return response()->json(['status' => false, 'message' => 'Product not found!', "data" => []],404);
            }
            return response()->json(['data' => new ProductDetailResource($product)]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Something went wrong. Please try again later!', "data" => []]);
        }
    }
}
