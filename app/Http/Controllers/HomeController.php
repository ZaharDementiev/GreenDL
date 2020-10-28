<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function cart() {
        return view('cart');
    }

    public function order() {
        return view('order');
    }

    public function orderSuccess() {
        return view('order_success');
    }

    public function nextPage($pageNumber) {
        return view('catalog', compact('pageNumber'));
    }

    public function updateQTI(Request $request) {
        $products = $request->session()->get(Product::KEY_OF_COOKIES);

        session()->remove(Product::KEY_OF_COOKIES);
        for ($i = 0; $i < count($products); $i++) {
            if ($products[$i]['product_id'] == $request->input('id')) {
                if ($request->input('count') > 0) {
                    $products[$i]['count'] = $request->input('count');
                } else {
                    unset($products[$i]);
                }
            }
        }

        foreach ($products as $product) {
            session()->push(Product::KEY_OF_COOKIES, $product);
        }

        return response()->json($products,200);
    }

    public function ebalnahui() {
        $products = session()->get(Product::KEY_OF_COOKIES);
        foreach ($products as $key => &$product) {
            if ($product['product_id'] == 3) {
                $product['count'] = 2;
            }
        }
        dd($products);
    }
}
