@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="section__order-success">
                <h1>СПАСИБО за покупку!</h1>
                <p>в ближайшее время с вами свяжется менеджер для подтверждения заказа</p>
                <a href="{{route('index')}}">на главную</a>
            </div>
        </div>
    </div>
@endsection
