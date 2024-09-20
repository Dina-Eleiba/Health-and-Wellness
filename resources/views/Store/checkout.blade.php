@extends('Store.master')

@section('title', 'checkout')

@section('content')

 <!-- Checkout Section Begin -->
 <section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{route('home.save-order')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                        here</a> to enter your code</h6>
                        <h6 class="checkout__title">Billing Details</h6>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" name="first_name" value="{{ $user->first_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="last_name" value="{{ $user->last_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" value="{{ $user->phone }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="street" placeholder="Street Address" class="checkout__input__add">
                            <input type="text" name="apartment" placeholder="Apartment, suite, unite ect (optinal)">
                            <input type="text" name="apartment" placeholder="Apartment, suite, unite ect (optinal)">
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" name="city">
                        </div>

                        <div class="checkout__input__checkbox">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label>
                            <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p>
                        </div>
                        <div class="checkout__input">
                            <p>Account Password<span>*</span></p>
                            <input type="text" name="password">
                        </div>

                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text" name="notes"
                            placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h6 class="order__title">Your order</h6>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul class="checkout__total__products">
                                <li><samp>01.</samp> Vanilla salted caramel <span>$ 300.0</span></li>
                                <li><samp>02.</samp> German chocolate <span>$ 170.0</span></li>
                                <li><samp>03.</samp> Sweet autumn <span>$ 170.0</span></li>
                                <li><samp>04.</samp> Cluten free mini dozen <span>$ 110.0</span></li>
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Subtotal <span>$750.99</span></li>
                                <li>Total <span>$750.99</span></li>
                            </ul>
                            <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div>
                                <h3 class = "mb-3">Payment Method</h3>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="radio" id="payment" name="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="radio" id="paypal"  name="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                            </div>

                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

@endsection
