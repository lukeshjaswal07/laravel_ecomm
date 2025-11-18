<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'products' => Product::all()
        ]);
    }

    public function show($id)
    {
        try{

            $product = Product::find($id);
            
            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }
            
            return response()->json([
                'status' => true,
                'product' => $product
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => true,
                'error' => $e->getMessage()
            ]);
        }
    }
}
