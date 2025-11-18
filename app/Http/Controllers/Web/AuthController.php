<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        
        try{

            $request->validate([
                'name' => 'required',

                'email' => 'required|email|unique:users,email',

                'password' => 'required|min:6|confirmed'

            ]);

            $user = User::create([

                'name' => $request->name,

                'email' => $request->email,

                'password' => Hash::make($request->password)

            ]);

            return redirect('/login')->with('success', 'User has been registered successfully!');
        } 
        catch (Exception $e) {
            
            return back()->withErrors(['error' => 'Something went wrong. Try again later.']);

        }    
    }

    public function login(Request $request)
    {
        try{

            $request->validate([

                'email' => 'required|email',

                'password' => 'required'

            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {

                return back()->withInput()->withErrors(['email' => 'Invalid credentials']);

            }

            session(['user_id' => $user->id]);

            return redirect("/dashboard");
        } 
            catch (Exception $e) {

            return back()->withErrors(['error' => 'Something went wrong. Try again later.']);

        }
    }

    public function dashboard(){

        $products = Product::paginate(8);

        return view('welcome', compact('products'));

    }

    public function logout() {

        session()->forget('user_id');

        return redirect('login');

    }
}
