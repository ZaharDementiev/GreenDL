@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="section__cart">
                <h1>корзина</h1>
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
                        <div class="tr">
                            <div class="td image">
                                <img src="./image/item-1.png" alt="">
                            </div>
                            <div class="td image">щавель</div>
                            <div class="td">
                                <div class="quantity" >
                                    <div class="plus">
                                        +
                                    </div>
                                    <input type="number" value="1">
                                    <div class="minus">
                                        -
                                    </div>
                                </div>
                            </div>
                            <div class="td">250р</div>
                            <div class="td">250р</div>
                        </div>
                        <div class="tr">
                            <div class="td image">
                                <img src="./image/item-1.png" alt="">
                            </div>
                            <div class="td image">щавель</div>
                            <div class="td">
                                <div class="quantity" >
                                    <div class="plus">
                                        +
                                    </div>
                                    <input type="number" value="1">
                                    <div class="minus">
                                        -
                                    </div>
                                </div>
                            </div>
                            <div class="td">250р</div>
                            <div class="td">250р</div>
                        </div>
                    </div>
                </div>
                <div class="section__cart-info">
                    <div class="total">
                        <div class="total__text">итого</div>
                        <div class="total__price">250р</div>
                    </div>
                    <a href="order.html" class="btn">оформить заказ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
