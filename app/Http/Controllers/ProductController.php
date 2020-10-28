<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store($slug) {
        return view('product', compact('slug'));
    }

    public function addProductToList(Request $request) {
        $product = Product::where('slug', $request->input('slug'))->first();
        $productsInCookie = $request->session()->pull(Product::KEY_OF_COOKIES);

        if ($productsInCookie == null) {
            $productsInCookie = array();
            $newProduct = [
                'product_id' => $product->id,
                'count' => $request->input('count')
            ];
            array_push($productsInCookie, $newProduct);
        } else {
            $productWasChosenBefore = false;
            for ($i = 0; $i < count($productsInCookie); $i++) {
                if ($productsInCookie[$i]['product_id'] == $product->id) {
                    $productsInCookie[$i]['count'] += $request->input('count');
                    $productWasChosenBefore = true;
                    break;
                }
            }

            if (!$productWasChosenBefore) {
                $newProduct = [
                    'product_id' => $product->id,
                    'count' => $request->input('count')
                ];
                array_push($productsInCookie, $newProduct);
            }
        }

        foreach ($productsInCookie as $item) {
            $request->session()->push(Product::KEY_OF_COOKIES, $item);
        }
        return redirect('cart');
    }

    public function confirmProducts(Request $request) {
        $order = new Order();
        $order->save();

        session()->push(Product::KEY_OF_ORDER, $order->id);

        for($i = 0; $i < count($request->input('count')); $i++) {
            $order->product()->attach('product_order', [
                'product_id' => $request->input('id')[$i],
                'order_id' => $order->id,
                'product_count' => $request->input('count')[$i],
            ]);
        }

        return redirect(route('order'));
    }
}
