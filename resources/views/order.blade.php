@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="section__order">
                <h1>оформление заказа</h1>
                <div class="section__order-steps">
                    <div class="steps__nav">
                        <ul>
                            <li id="navStep-1" class="active">шаг 1</li>
                            <li id="navStep-2">шаг 2</li>
                            <li id="navStep-3">шаг 3</li>
                        </ul>
                    </div>
                    <div class="steps__content">
                        <div id="step-1" class="item active">
                            <div class="form__group">
                                <label for="">фио</label>
                                <input type="text">
                            </div>
                            <div class="form__group">
                                <label for="">номер телефона</label>
                                <input type="tel">
                            </div>
                            <div class="form__group">
                                <label for="">E-mail</label>
                                <input type="email">
                            </div>
                            <div class="btn">далее</div>
                        </div>
                        <div id="step-2" class="item">
                            <div class="form__group">
                                <label for="">адрес</label>
                                <input type="text">
                            </div>
                            <div class="form__group">
                                <label for="">дата доставки</label>
                                <input type="tel">
                            </div>
                            <div class="form__group">
                                <label for="">время доставки</label>
                                <input type="email">
                            </div>
                            <div class="btn">далее</div>
                        </div>
                        <div id="step-3" class="item">
                            <div class="form__groups">
                                <div class="form__radio">
                                    <input type="radio" class="radio" id="radio1" name="order" checked/>
                                    <label for="radio1">оплата картой на сайте</label>
                                </div>
                                <div class="form__radio">
                                    <input type="radio" class="radio" id="radio2" name="order"/>
                                    <label for="radio2">наличными курьеру</label>
                                </div>
                            </div>
                            <a href="order__success.html" class="btn">оплатить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
