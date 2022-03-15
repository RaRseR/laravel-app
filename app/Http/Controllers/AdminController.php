<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function main()
    {
        $orders = Order::get();
        $categories = Category::get();
        return view('admin', ['orders' => $orders, 'categories' => $categories]);
    }
    public function addCategory(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'newCategoryName' => 'required|string',
        ]);
        if ($validator->fails()) return response()->json(['result' => 'error', 'errors' => $validator->errors()], 400);
        Category::create([
            'name' => $r->newCategoryName,
        ]);
        return response()->json(['result' => 'success'], 200);
    }
    public function deleteCategory(Request $r)
    {
        $categories = explode(',',$r->categories);
        // $categories = str_split($categories);
        foreach($categories as $category){
            Category::where('id', $category)->delete();
        }
        return response()->json(['result' => 'success'], 200);
    }
}
