@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="section__cart">
                <h1>корзина</h1>
                @php $total = 0 @endphp
                <form action="{{route('submit-products')}}" method="post">
                    @csrf
                    <div class="tableCart">
                        <div class="tableCart__header">
                            <div class="tr">
                                <div class="td"></div>
                                <div class="td">название товара</div>
                                <div class="td">колличество</div>
                                <div class="td">цена за единицу</div>
                                <div class="td">общая стоимость</div>
                            </div>
                        </div>
                        <div class="tableCart__body">
                            @if (session()->get('products') != null)
                                @foreach(session()->get('products') as $item)
{{--                                    {{dd(session()->get('products'))}}--}}
                                    @php $product = \App\Product::where('id', $item['product_id'])->first() @endphp
                                    <div class="tr">
                                        <div class="td image">
                                            <img src="{{$product->image}}" alt="">
                                        </div>
                                        <div class="td image">{{$product->title}}</div>
                                        <div class="td">
                                            <div class="quantity" >
                                                <div class="plus">
                                                    +
                                                </div>
                                                <input type="number" value="{{$item['count']}}" name="count[]">
                                                <div class="minus">
                                                    -
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{$item['product_id']}}" name="id[]">
                                        </div>
                                        <div class="td">{{$product->price}}р</div>
                                        <div class="td">{{$product->price * $item['count']}}р</div>
                                        @php $total += $product->price * $item['count'] @endphp
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="section__cart-info">
                        <div class="total">
                            <div class="total__text">итого</div>
                            <div class="total__price">{{$total}}р</div>
                        </div>
                        <button class="btn" type="submit">оформить заказ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
