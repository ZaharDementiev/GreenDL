<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store($slug) {
        return view('product', compact('slug'));
    }

    public function addProductToList(Request $request) {
        //Код добавления товара в куки
        return redirect('cart');
    }
}
