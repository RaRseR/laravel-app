<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function main()
    {
        $orders = Order::get();
        return view('main', ['orders'=>$orders]);
    }
}
