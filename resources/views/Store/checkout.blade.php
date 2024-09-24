@extends('Store.master')

@section('title', 'checkout')

@section('content')

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{ route('home.save-order') }}" method="POST">
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
                                    @error('first_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name" value="{{ $user->last_name }}">
                                    </div>
                                    @error('last_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" value="{{ $user->phone }}">
                                    </div>
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="{{ $user->email }}">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address" class="checkout__input__add" value="{{ $address->address  ?? ''}}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>floor<span>*</span></p>
                                            <input type="number" name="floor" value="{{ $address->floor ?? '' }}">
                                        </div>
                                        @error('floor')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>apartment<span>*</span></p>
                                            <input type="text" name="apartment" value="{{ $address->apartment ?? '' }}">
                                            @error('apartment')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>region<span>*</span></p>
                                <input type="text" name="region" value="{{ $address->region ?? '' }}">
                                @error('region')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="checkout__input">
                                <p>Order notes</p>
                                <input type="text" name="notes"
                                    placeholder="Notes about your order, e.g. special notes for delivery."
                                    >
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h6 class="order__title">Your order</h6>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @php
                                        $cart = session()->get('cart', []);

                                    @endphp
                                    @if ($cart)
                                        @foreach ($cart as $item)
                                            <li><samp> {{ $item['quantity'] }} </samp> {{ $item['name'] }} <span>EGP
                                                {{ $item['subtotal'] }}</span></li>
                                        @endforeach
                                    @endif
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span> EGP {{ session()->get('total') }}</span></li>
                                    <li>Total <span>EGP {{ session()->get('total') }}</span></li>
                                </ul>
                                <div>
                                    <h3 class = "mb-3">Payment Method</h3>
                                    <div class="checkout__input__checkbox">
                                        <label for="payment">
                                            Cash on delivery
                                            <input type="radio" id="payment" name="payment">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__input__checkbox">
                                        <label for="paypal">
                                            Pay via (Debit/Credit cards/Wallets/Installments)
                                            <input type="radio" id="paypal" name="payment">
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
