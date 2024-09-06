<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header__top__inner">
                        <div class="header__top__left">
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
                                @guest
                                    <li><a href="{{ route('register') }}">Sign Up</a></li>
                                @endguest
                                @auth
                                    <li>{{ Auth::user()->first_name }} <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li>Profile</li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button class="logout-btn" type="submit">Logout</button>
                                                </form>

                                            </li>
                                        </ul>
                                    </li>

                                @endauth
                            </ul>
                        </div>
                        <div class="header__logo">
                            <a href="./index.html">
                                <img src="{{ asset('assets/store/img/logo.png') }}" alt="" width="158px"
                                    height="107px">
                            </a>
                        </div>
                        <div class="header__top__right">
                            <div class="header__top__right__links">
                                <a href="#" class="search-switch"><img
                                        src="{{ asset('assets/store/img/icon/search.png') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('assets/store/img/icon/heart.png') }}"
                                        alt=""></a>
                            </div>
                            <div class="header__top__right__cart">
                                <a href="#"><img src="{{ asset('assets/store/img/icon/cart.png') }}"
                                        alt=""> <span>0</span></a>
                                <div class="cart__price">Cart: <span>$0.00</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('home.about') }}">About</a></li>
                        @php
                            $categories = \App\Models\Category::whereNull('parent_id')->get();
                        @endphp
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('home.categories', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach

                        {{-- <li><a href="#">Categories</a>
                            <ul class="dropdown">
                                <li><a href="./shop-details.html">Shop Details</a></li>
                                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                <li><a href="./checkout.html">Check Out</a></li>
                                <li><a href="./wisslist.html">Wisslist</a></li>
                                <li><a href="./Class.html">Class</a></li>
                                <li><a href="./blog-details.html">Blog Details</a></li>
                            </ul>
                        </li> --}}
                        <li><a href="./blog.html">Blog</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
