@extends('layouts.app')

@section('content')
    @php
        $page = $pageNumber * 2 - 1;
        $page = intval($page);
    @endphp
    <div class="wrapper">
        <div class="container">
            <div class="section__salesHits">
                <h1>МИКРОЗЕЛЕНЬ</h1>
                <div class="section__salesHits-list">
                    @foreach(\App\Product::where('id', '>=', $page ?? '')->limit(\App\Product::PRODUCT_ON_PAGE)->get() as $product)
                        <div class="item">
                            <div class="item__img">
                                <a href="{{route('store-product', $product->slug)}}">
                                    <img src="{{$product->image}}" alt="">
                                </a>
                            </div>
                            <div class="item__name"><a href="product.html">{{$product->title}}</a></div>
                            <div class="item__price">{{$product->price}}р</div>
                            <a href="cart.html" class="item__btn">купить</a>
                        </div>
                    @endforeach
                </div>
                <div class="section__salesHits-pagination">
                    <ul>
                        @for($i = 0; $i < \App\Product::count() / \App\Product::PRODUCT_ON_PAGE; $i++)
                            @if ($pageNumber == $i + 1)
                                <li class="active">
                            @else
                                <li>
                            @endif
                                <a href="{{route('catalog', $i + 1)}}"></a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
