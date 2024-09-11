<div id="cart-sidebar" class="cart-sidebar">
    <div class="cart-sidebar__content">
        <span class="closebtn" id="close-sidebar">&times;</span>
        <h3 class="pl-3">Cart</h3>

        <ul class="cart-list">
            @php
                $cart = session()->get('cart', []);
            @endphp
            @if ($cart)
                @foreach ($cart as $item)

                    <li>
                        <div class="" data-role="product-item">
                            <div class="product">
                                <a href="#" class="product-item-photo">
                                    <span class="product-image-container" style="width: 75px;">
                                        <span class="product-image-wrapper" style="padding-bottom: 100%;">
                                            <img class="product-image-photo"
                                                src="{{ asset('assets/images/products/' . $item['image']) }}"
                                                alt="T-shirt Contrast Pocket">
                                        </span>
                                    </span>
                                </a>
                                <div class="product-item-details">
                                    <div class="product-item-info-container">
                                        <strong class="product-item-name">
                                            <a href="#" class="text-dark">{{ $item['name'] }}</a>
                                        </strong>

                                        <div class="product-item-pricing mt-2">
                                            <div class="price-container">
                                                <span class="price-wrapper">
                                                    <span class="price-excluding-tax">
                                                        <span class="minicart-price">
                                                            <span class="price">{{ $item['price'] }} EGP</span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="secondary">
                                    <a href="#" class="action delete text-dark" title="Remove item">
                                        <span><i class="fa-solid fa-xmark"></i></span>
                                    </a>
                                </div>



                                <div class="quantity_item">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="number" class="quantity__input " value="{{ $item['quantity'] }}" readonly>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </li>
                @endforeach
                <div class="cart__total list mt-5">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>EGP {{ session()->get('total') }}</span></li>
                        <li>Total <span>EGP {{ session()->get('total') }}</span></li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                    <a href="{{ route('home.cart') }}" class="primary-btn mt-3">View cart</a>

                </div>
            @else
                <h4 class="text-center mt-5"> Your cart is Empty</h4>
                <div class="text-center">
                    <a href="{{ route('home') }}">
                        <button class="primary-btn mt-5 text-center"> Continue Shopping</button>
                    </a>
                </div>
            @endif
        </ul>


    </div>
</div>
