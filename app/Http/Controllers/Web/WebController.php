<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function view_product($id){
        
        $product = \App\Models\Product::findOrFail($id);
        
        return view('view-product', compact('product'));
    
    }
}
