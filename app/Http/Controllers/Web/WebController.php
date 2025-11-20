<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class WebController extends Controller
{
    public function view_product($id){
        
        $product = \App\Models\Product::findOrFail($id);
        
        return view('view-product', compact('product'));
    
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $existing = Cart::where('user_id', auth()->id())->where('product_id', $id)->first();

        if ($existing) {

            $existing->quantity += 1;

            $existing->save();

        } else {

            Cart::create([

                'user_id'    => auth()->id(),

                'product_id' => $id,

                'quantity'   => 1,

            ]);
        }

        return redirect()->back()->with('success', 'Item has been added to cart!');
    }


    public function viewCart()
    {
        $cartItems = \App\Models\Cart::where('user_id', auth()->id())->with('product')->get();

        return view('cart', compact('cartItems'));

    }

}
