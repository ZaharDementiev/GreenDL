<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request) {
        if ($request->session()->get(Product::KEY_OF_ORDER) == null ||
            $request->session()->get(Product::KEY_OF_COOKIES) == null) {
            return redirect(route('cart'));
        }

//        for ($i = 0; $i < count($request->session()->get(Product::KEY_OF_COOKIES)); $i++) {
//            $product = Product::where('id', $request->session()->get(Product::KEY_OF_COOKIES)[$i]['product_id']);
//            $product->sales += $request->session()->get(Product::KEY_OF_COOKIES)[0]['count'];
//            $product->save();
//        }

        $ids = $request->session()->get(Product::KEY_OF_ORDER);
        $order = Order::where('id', array_pop($ids))->first();

        $order->fio = $request->input('fio');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->day_of_delivery = $request->input('day');
        $order->time_of_delivery = $request->input('time');
        $order->payment_method = $request->input('order');
        $order->status = Order::PAID;

        $order->save();

        session()->remove(Product::KEY_OF_COOKIES);
        session()->remove(Product::KEY_OF_ORDER);

        return redirect(route('orderSuccess'));
    }
}
