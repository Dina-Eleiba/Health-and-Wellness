<!DOCTYPE html>
<html lang="zxx">

@include('Store.partials.header')

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__cart">
            <div class="offcanvas__cart__links">
                <a href="#" class="search-switch"><img src="{{ asset('assets/store/img/icon/search.png') }}"
                        alt=""></a>
                <a href="#"><img src="{{ asset('assets/store/img/icon/heart.png') }}" alt=""></a>
            </div>
            <div class="offcanvas__cart__item">
                <a href="#"><img src="{{ asset('assets/store/img/icon/cart.png') }}" alt="">
                    <span>0</span></a>
                <div class="cart__price">Cart: <span>$0.00</span></div>
            </div>
        </div>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="{{ asset('assets/store/img/logo.png') }}" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__option">
            <ul>
                <li>USD <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>EUR</li>
                        <li>USD</li>
                    </ul>
                </li>
                <li>ENG <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>Spanish</li>
                        <li>ENG</li>
                    </ul>
                </li>
                <li><a href="#">Sign in</a> <span class="arrow_carrot-down"></span></li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @include('Store.partials.nav')
    <!-- Header Section End -->
    @if (session()->has('message'))
    <div class="my-5">
        <div class="alert alert-success w-50 text-center  m-auto">
            {{ session('message') }}
        </div>
    </div>
    @endif

    @if (session()->has('fail'))
    <div class="my-5">
        <div class="alert alert-danger w-50 text-center  m-auto">
            {{ session('fail') }}
        </div>
    </div>
    @endif
    @yield('content')

    <!-- Footer Section Begin -->
    @include('Store.partials.footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    @include('Store.partials.search')
    <!-- Search End -->

    @include('Store.partials.sidebar')

    <!-- Js Plugins -->
    @include('Store.partials.scripts')



</body>

</html>
