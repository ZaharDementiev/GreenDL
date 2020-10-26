<?php

namespace App\Http\Controllers;

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

    protected function nextPage($pageNumber) {
        return view('catalog', compact('pageNumber'));
    }
}
