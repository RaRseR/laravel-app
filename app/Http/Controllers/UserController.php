<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function signUp(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'userName' => 'required|string|unique:App\Models\User,name',
            'userEmail' => 'required|email:rfc|unique:App\Models\User,email',
            'password1' => 'required|string',
            'password2' => 'required|string'
        ]);
        if ($validator->fails()) return response()->json(['result' => 'error', 'errors' => $validator->errors()], 400);

        if ($r->password1 === $r->password2) {
            User::create([
                'name' => $r->userName,
                'email' => $r->userEmail,
                'password' => Hash::make($r->password1),
            ]);
            return response()->json(['result' => 'success'], 200);
        }
        return response()->json(['result' => 'error', 'errors' => 'Different passwords'], 400);
    }

    public function signIn(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'userName' => 'required|string',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) return response()->json(['result' => 'error', 'errors' => $validator->errors()], 400);
        if (Auth::attempt(['name' => $r->userName, 'password' => $r->password], true))
            return response()->json(['result' => 'success'], 200);
        return response()->json(['result' => 'error'], 400);
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->route('main');
    }

    public function addOrder(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'orderName' => 'required|string',
            'orderCategory' => 'required',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        if ($validator->fails()) return response()->json(['result' => 'error', 'errors' => $validator->errors()], 400);
        if ($r->hasFile('image')) {
            $image = $r->file('image');
            $imageOriginalName = $image->getClientOriginalName();
            // $path = $image->store('public/images');
            // Order::create([
            //     'name' => $r->orderName,
            //     'category' => $r->orderCategory,
            //     'description' => $r->description,
            //     'user' => Auth::user()->id,
            //     'image_1'=> $r->$imageOriginalName
            // ]);
        } else {
            return response()->json(['result' => 'error', 'errors' => 'Please choose file'], 400);
        }

        // return response()->json([$imageOriginalName], 200);
        // return response()->json(['result' => 'success'], 200);
        // Storage::disk('local')->put('', $file_content);
    }
    public function profile()
    {
        $orders = Order::where('user', Auth::user()->id)->get();
        $categories = Category::get();
        return view('profile', ['orders' => $orders, 'categories' => $categories]);
    }
}
