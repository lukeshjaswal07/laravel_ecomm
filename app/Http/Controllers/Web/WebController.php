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

    public function updateCart(Request $request)
    {
        $cart = Cart::where('id', $request->id)->where('user_id', session('user_id'))->first();

        if (!$cart) return response()->json(['error' => 'Not found'], 404);

        if ($request->action == 'increase') {

            $cart->quantity += 1;

        } else if ($request->action == 'decrease' && $cart->quantity > 1) {

            $cart->quantity -= 1;

        }

        $cart->save();

        $total = Cart::where('user_id', session('user_id'))->with('product')->get()->sum(function($item){ 
            
                return $item->product->price * $item->quantity;
            
            });

        return response()->json([
  
            'quantity' => $cart->quantity,
  
            'total' => $total
  
        ]);
    }

    public function removeItem($id)
    {
        $item = Cart::findOrFail($id);   

        $item->delete();                 

        return redirect()->back()->with('success', 'Item removed from cart');
    }

}
