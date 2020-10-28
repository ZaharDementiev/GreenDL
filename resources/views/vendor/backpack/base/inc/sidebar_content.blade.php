<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Аутентификация</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Пользователи</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Роли</span></a></li>
     </ul>
</li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('products') }}"><i class="nav-icon la la-product-hunt"></i> <span>Товары</span></a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('orders') }}"><i class="nav-icon la la-shipping-fast"></i> <span>Заказы</span></a></li>
