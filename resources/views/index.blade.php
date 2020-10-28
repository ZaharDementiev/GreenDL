@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="section__sliderHome">
            <div class="slider" id="homeSlider">
                <div class="slider__item" style="background-image: url('./image/slider-1.png')">
                    <div class="slider__item-content">
                        <h2>МИКРОЗЕЛЕНЬ</h2>
                        <div class="desc">
                            Молодые побеги ваших любимых растений с насыщенным вкусом и повышенным содержанием питательных веществ.
                        </div>
                        <div class="buttons">
                            <a href="javascript:void(0)" data-href="#popups__about" class="btn-full popupsBTN">подробнее</a>
                            <a href="{{route('catalog', 1)}}" class="btn-border">купить</a>
                        </div>
                    </div>
                </div>
                <div class="slider__item" style="background-image: url('./image/slider-1.png')">
                    <div class="slider__item-content">
                        <h2>МИКРОЗЕЛЕНЬ</h2>
                        <div class="desc">
                            Молодые побеги ваших любимых растений с насыщенным вкусом и повышенным содержанием питательных веществ.
                        </div>
                        <div class="buttons">
                            <a href="javascript:void(0)" data-href="#popups__about" class="btn-full popupsBTN">подробнее</a>
                            <a href="{{route('catalog', 1)}}" class="btn-border">купить</a>
                        </div>
                    </div>
                </div>
                <div class="slider__item" style="background-image: url('./image/slider-1.png')">
                    <div class="slider__item-content">
                        <h2>МИКРОЗЕЛЕНЬ</h2>
                        <div class="desc">
                            Молодые побеги ваших любимых растений с насыщенным вкусом и повышенным содержанием питательных веществ.
                        </div>
                        <div class="buttons">
                            <a href="javascript:void(0)" data-href="#popups__about" class="btn-full popupsBTN">подробнее</a>
                            <a href="{{route('catalog', 1)}}" class="btn-border">купить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="section__benefits">
                <ul>
                    <li>
                        <h3>бесплатная доставка</h3>
                        <p>от 2000р</p>
                    </li>
                    <li>
                        <h3>высокое качество</h3>
                        <p>свежий продукт</p>
                    </li>
                    <li>
                        <h3>минимальный заказ</h3>
                        <p>2000р</p>
                    </li>
                </ul>
            </div>
            <div class="section__salesHits">
                <h2>ХИТЫ ПРОДАЖ</h2>
                <div class="section__salesHits-list">
                    @foreach(\App\Product::orderBy('sales', 'DESC')->limit(6)->get() as $product)
                        <div class="item">
                            <div class="item__img">
                                <a href="{{route('store-product', $product->slug)}}">
                                    <img src="{{$product->image}}" alt="">
                                </a>
                            </div>
                            <div class="item__name"><a href="product.html">{{$product->title}}</a></div>
                            <div class="item__price">{{$product->price}}р</div>
                            <a href="{{route('store-product', $product->slug)}}" class="item__btn">купить</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="section__about">
            <div class="container">
                <h2>о нас</h2>
            </div>
            <div class="section__about-img">
                <img src="/image/img__about.png" alt="">
            </div>
            <div class="container">
                <div class="section__about-desc">
                    <b>Greendl</b> - это высококачественный бренд, который гарантирует доставку свежих продуктов и услуг прямиком от наших трудолюбивых фермеров. Мы продолжаем соответствовать ожиданиям клиентов, постоянно предлагая продукты, соответствующие самым высоким стандартам. Greendl специализируется исключительно на эталонных стандартах выращивания микрозелени, бейби-лифов и производстве растительногг масла на их основе.
                </div>
                <a href="javascript:void(0)" data-href="#popups__about" class="section__about-btn popupsBTN">подробнее</a>
            </div>
        </div>
    </div>
@endsection
