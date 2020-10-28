<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/reset.css">

    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">
</head>
<body>
<header>
    <div class="container">
        <div class="header">
            <div class="header__logo">
                <img src="/image/logo.svg" alt="">
            </div>
            <div class="header__menu">
                <ul>
                    <li class=@if(Request::is('/'))"active"@else "" @endif><a href="{{route('index')}}">главная</a></li>
                    <li class=@if(Request::is('catalog'))"active"@else "" @endif><a href="{{route('catalog', 1)}}">каталог</a></li>
                    <li><a href="javascript:void(0)" data-href="#popups__about" class="popupsBTN">о нас</a></li>
                    <li><a href="javascript:void(0)" data-href="#popups__contacts" class="popupsBTN">контакты</a></li>
                </ul>
            </div>
            <div class="header__cart">
                <a href="{{route('cart')}}">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="446.853px" height="446.853px" viewBox="0 0 446.853 446.853" style="enable-background:new 0 0 446.853 446.853;"
                         xml:space="preserve">
                            <g>
                                <path d="M444.274,93.36c-2.558-3.666-6.674-5.932-11.145-6.123L155.942,75.289c-7.953-0.348-14.599,5.792-14.939,13.708
                                    c-0.338,7.913,5.792,14.599,13.707,14.939l258.421,11.14L362.32,273.61H136.205L95.354,51.179
                                    c-0.898-4.875-4.245-8.942-8.861-10.753L19.586,14.141c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591
                                    l59.491,23.371l41.572,226.335c1.253,6.804,7.183,11.746,14.104,11.746h6.896l-15.747,43.74c-1.318,3.664-0.775,7.733,1.468,10.916
                                    c2.24,3.184,5.883,5.078,9.772,5.078h11.045c-6.844,7.617-11.045,17.646-11.045,28.675c0,23.718,19.299,43.012,43.012,43.012
                                    s43.012-19.294,43.012-43.012c0-11.028-4.201-21.058-11.044-28.675h93.777c-6.847,7.617-11.047,17.646-11.047,28.675
                                    c0,23.718,19.294,43.012,43.012,43.012c23.719,0,43.012-19.294,43.012-43.012c0-11.028-4.2-21.058-11.042-28.675h13.432
                                    c6.6,0,11.948-5.349,11.948-11.947c0-6.6-5.349-11.948-11.948-11.948H143.651l12.902-35.843h216.221
                                    c6.235,0,11.752-4.028,13.651-9.96l59.739-186.387C447.536,101.679,446.832,97.028,444.274,93.36z M169.664,409.814
                                    c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117s19.116,8.574,19.116,19.117S180.207,409.814,169.664,409.814z
                                     M327.373,409.814c-10.543,0-19.116-8.573-19.116-19.116s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117
                                    S337.916,409.814,327.373,409.814z"/>
                            </g>
                        </svg>
                    @php
                        $count = 0;
                        if (session()->get('products') != null)
                            foreach (session()->get('products') as $item)
                                $count += $item['count'];
                    @endphp
                    <span>{{$count}}</span>
                </a>
                <div class="menu-btn">
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:none;}</style></defs><title/><g data-name="Layer 2" id="Layer_2"><path d="M28,10H4A1,1,0,0,1,4,8H28a1,1,0,0,1,0,2Z"/><path d="M28,17H4a1,1,0,0,1,0-2H28a1,1,0,0,1,0,2Z"/><path d="M28,24H4a1,1,0,0,1,0-2H28a1,1,0,0,1,0,2Z"/></g><g id="frame"><rect class="cls-1" height="32" width="32"/></g></svg>
                </div>
            </div>
            <div class="header__phone">
                <a href="tel:79859239592">+7 (985) 923-95-92</a>
            </div>
        </div>
    </div>
</header>
    @yield('content')
<footer>
    <div class="container">
        <div class="footer">
            <div class="footer__contacts">
                <h2>контакты</h2>
                <p>
                    ооо эспро
                    143080, московская область
                    одинцовский р-н,
                    пос. внииссок, ул. селекционная, д. 14
                </p>
                <p>
                    <a href="tel:79859239592">+7 (985) 923 95 92</a>
                    <br>
                    <a href="mailto:zlobin19@mail.ru">zlobin19@mail.ru</a>
                </p>
            </div>
            <div class="footer__menu">
                <ul>
                    <li><a href="{{route('index')}}">главная</a></li>
                    <li><a href="{{route('catalog', 1)}}">каталог</a></li>
                    <li><a href="javascript:void(0)" data-href="#popups__about" class="popupsBTN">о нас</a></li>
                    <li><a href="javascript:void(0)" data-href="#popups__contacts" class="popupsBTN">контакты</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="popups" id="popups__about">
    <div class="popups__bgClose"></div>
    <div class="popups__content">
        <div class="close">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717
                                L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859
                                c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287
                                l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285
                                L284.286,256.002z"/>
                        </g>
                    </g>
                </svg>
        </div>
        <h2>О нас</h2>
        <div class="desc">
            В 2017 году в экологически чистом районе Московской области мы запустили производство проростков и микро-зелени по уникальной швейцарской технологии. Без малого 30ти летний опыт позволяет представить большой ассортимент вкусной и полезной продукции для наших многочисленных клиентов.
            Мы проводим постоянный контроль как семенной так и готовой продукции, что дает нам высочайшие  показатели качества. В процессе производства Greendl моделирует естественные природные условия, без применения каких либо добавок или примесей.
            <br>
            <br>
            Наша цель доставлять нашим клиентам свежую продукцию высокого качества прямиком с производства.
            <br><br>
            Мы стремимся обучать потребителей тому, как использовать уникальный вкус, текстуру и цвет микрозелени в качестве гарнира для салатов или в качестве дополнения к основным блюдам. Кроме того, мы надеемся помочь людям понять питательную ценность и уникальные свойства микрозелени.
        </div>
    </div>
</div>
<div class="popups" id="popups__contacts">
    <div class="popups__bgClose"></div>
    <div class="popups__content">
        <div class="close">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717
                                L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859
                                c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287
                                l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285
                                L284.286,256.002z"/>
                        </g>
                    </g>
                </svg>
        </div>
        <h2>КОНТАКТЫ</h2>
        <div class="desc">
            ООО ЭСПРО 143080, МОСКОВСКАЯ ОБЛАСТЬ ОДИНЦОВСКИЙ Р-Н, ПОС. ВНИИССОК, УЛ. СЕЛЕКЦИОННАЯ, Д. 14
            <br><br>
            <a href="tel:+7 (985) 923 95 92">+7 (985) 923 95 92</a> <br>
            <a href="mailto:ZLOBIN19@MAIL.RU">ZLOBIN19@MAIL.RU</a>
        </div>
    </div>
</div>
<script src="/lib/jquery.min.js"></script>
<script src="/lib/slick.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>
