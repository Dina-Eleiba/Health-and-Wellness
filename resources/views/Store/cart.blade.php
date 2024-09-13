@extends('Store.master')


@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shopping cart</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="mr-2">Image</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr>
                                        <td>
                                            <img class="product-image-photo mr-5"
                                            src="{{ asset('assets/images/products/' . $item['image']) }}"
                                            alt="T-shirt Contrast Pocket">
                                        </td>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="img/shop/cart/cart-1.jpg" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $item['name'] }}</h6>
                                                <h5>EGP {{ $item['price'] }}</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{ $item['quantity'] }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">EGP {{ $item['subtotal'] }}</td>
                                        <td class="cart__close">
                                            <div class="secondary">
                                                <form method="POST" action={{ route('home.remove-from-cart', $item['product_id']) }}>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action delete text-dark" title="Remove item">
                                                        <span><i class="fa-solid fa-xmark"></i></span>
                                                    </button>

                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>EGP {{ session()->get('total') }}</span></li>
                            <li>Total <span>EGP {{ session()->get('total') }}</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
