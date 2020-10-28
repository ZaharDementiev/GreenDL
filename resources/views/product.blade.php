@extends('layouts.app')

@section('content')
    @php $product = \App\Product::where('slug', $slug)->first() @endphp
    <div class="wrapper">
        <div class="product">
            <div class="container">
                <div class="product__content">
                    <div class="image">
                        <img src="{{$product->image}}" alt="">
                    </div>
                    <div class="info">
                        <h1>{{$product->title}}</h1>
                        <div class="price">
                            {{$product->price}}р
                        </div>
                        <ul class="options">
                            <li><b>наличие:</b> {{$product->available ? 'ЕСТЬ В НАЛИЧИИ' : 'НЕТ В НАЛИЧИИ'}}</li>
                            <li><b>вкус:</b> {{$product->taste}}</li>
                        </ul>
                        <form class="buttons" action="{{route('add-product-to-list')}}" method="post">
                            @csrf
                            <div class="form__group" id="number">
                                <div class="plus">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="7" viewBox="0 0 12 7"><defs><clipPath id="27w8a"><path fill="#fff" d="M1 6.42L6 0l5 6.42"/></clipPath></defs><g><g><path fill="none" stroke="#000001" stroke-miterlimit="20" stroke-width="2" d="M1 6.42v0L6 0v0l5 6.42v0" clip-path="url(&quot;#27w8a&quot;)"/></g></g></svg>
                                </div>
                                <input type="number" name="count" value="1">
                                <input type="hidden" name="slug" value={{$product->slug}}>
                                <div class="minus">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="7" viewBox="0 0 12 7"><defs><clipPath id="oi5da"><path fill="#fff" d="M1.718.853L6 6.61 10.282.853"/></clipPath></defs><g><g><path fill="none" stroke="#000001" stroke-miterlimit="20" stroke-width="2" d="M1.718.853v0L6 6.61v0L10.282.853v0" clip-path="url(&quot;#oi5da&quot;)"/></g></g></svg>
                                </div>
                            </div>
                            <button type="submit" @if(!$product->available) disabled @endif>в корзину</button>
                        </form>
                    </div>
                </div>
                <div class="product__description">
                    <h2>описание</h2>
                    <div class="desc">
                        {{$product->description}}
                    </div>
                </div>
                <div class="section__salesHits">
                    <h2>рекомендуем</h2>
                    <div class="section__salesHits-list">
                        @foreach(\App\Product::orderBy('sales', 'DESC')->limit(3)->get() as $product)
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
                </div>
            </div>
        </div>
    </div>
@endsection
