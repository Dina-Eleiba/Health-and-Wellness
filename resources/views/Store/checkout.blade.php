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
                                <input type="text" name="address" class="checkout__input__add"
                                    value="{{ $address->address ?? '' }}">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
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
                                            <input type="radio" id="payment" name="payment_method"
                                                value="cash on delivery" required onclick="togglePaymentForm()">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__input__checkbox">
                                        <label for="paypal">
                                            Pay via (Debit/Credit cards/Wallets/Installments)
                                            <input type="radio" id="paypal" name="payment_method" value="card"
                                                required onclick="togglePaymentForm()">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                </div>




                            </div>
                        </div>

                        {{-- stripe --}}
                        <div id="card-payment-form" class="container ةف-5" style="display: none;">
                            <h3 class="text-center mt-5">Payment Details</h3>
                            <div class="row">
                                <div class="col-md-12 col-md-offset-6">
                                    <div class="panel panel-default credit-card-box">
                                        <div class="panel-heading display-table">
                                            <h3 class="panel-title my-5">Card Payment Information</h3>
                                        </div>
                                        <div class="panel-body">
                                            @if (Session::has('success'))
                                                <div class="alert alert-success text-center">
                                                    <a href="#" class="close" data-dismiss="alert"
                                                        aria-label="close">×</a>
                                                    <p>{{ Session::get('success') }}</p>
                                                </div>
                                            @endif

                                            <form role="form" action="{{ route('stripe.Payment') }}" method="post"
                                                class="require-validation" data-cc-on-file="false"
                                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                                @csrf

                                                <div class='form-row row'>
                                                    <div class='col-6 form-group required'>
                                                        <label class='control-label'>Name on Card</label>
                                                        <input class='form-control' size='4' type='text'>
                                                    </div>
                                                    <div class='col-6 form-group  required'>
                                                        <label class='control-label'>Card Number</label>
                                                        <input autocomplete='off' class='form-control card-number'
                                                            size='20' type='text'>
                                                    </div>
                                                </div>


                                                <div class='form-row row'>
                                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                        <label class='control-label'>CVC</label>
                                                        <input autocomplete='off' class='form-control card-cvc'
                                                            placeholder='ex. 311' size='4' type='text'>
                                                    </div>
                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                        <label class='control-label'>Expiration Month</label>
                                                        <input class='form-control card-expiry-month' placeholder='MM'
                                                            size='2' type='text'>
                                                    </div>
                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                        <label class='control-label'>Expiration Year</label>
                                                        <input class='form-control card-expiry-year' placeholder='YYYY'
                                                            size='4' type='text'>
                                                    </div>
                                                </div>

                                                {{-- <div class='form-row row'>
                                                    <div class='col-md-12 error form-group hide'>
                                                        <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                                    </div>
                                                </div> --}}


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        {{-- end stripe --}}

                        <button type="submit" class="site-btn mt-3" id="place-order-button"
                            onclick="handlePayment()">Place Order</button>

                        {{-- <button type="submit" >PLACE ORDER</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection


@push('js')
    <script>
        function togglePaymentForm() {
            // Check which radio button is selected
            const cardPaymentForm = document.getElementById('card-payment-form');
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

            if (paymentMethod === 'card') {
                cardPaymentForm.style.display = 'block'; // Show the card payment form
            } else {
                cardPaymentForm.style.display = 'none'; // Hide the card payment form
            }
        }

        function handlePayment() {
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

            if (paymentMethod === 'cash on delivery') {
                // Submit form for Cash on Delivery
                document.getElementById('order-form').submit();
            } else if (paymentMethod === 'card') {
                // Ensure the form is properly submitted when payment is card
                document.getElementById('payment-form').submit();
            } else {
                alert("Please select a payment method.");
            }
        }
    </script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {



            /*------------------------------------------

            --------------------------------------------

            Stripe Payment Code

            --------------------------------------------

            --------------------------------------------*/



            var $form = $(".require-validation");



            $('form.require-validation').bind('submit', function(e) {

                var $form = $(".require-validation"),

                    inputSelector = ['input[type=email]', 'input[type=password]',

                        'input[type=text]', 'input[type=file]',

                        'textarea'
                    ].join(', '),

                    $inputs = $form.find('.required').find(inputSelector),

                    $errorMessage = $form.find('div.error'),

                    valid = true;

                $errorMessage.addClass('hide');



                $('.has-error').removeClass('has-error');

                $inputs.each(function(i, el) {

                    var $input = $(el);

                    if ($input.val() === '') {

                        $input.parent().addClass('has-error');

                        $errorMessage.removeClass('hide');

                        e.preventDefault();

                    }

                });

                if (!$form.data('cc-on-file')) {

                    e.preventDefault();

                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                    Stripe.createToken({

                        number: $('.card-number').val(),

                        cvc: $('.card-cvc').val(),

                        exp_month: $('.card-expiry-month').val(),

                        exp_year: $('.card-expiry-year').val()

                    }, stripeResponseHandler);

                }



            });



            /*------------------------------------------

            --------------------------------------------

            Stripe Response Handler

            --------------------------------------------

            --------------------------------------------*/

            function stripeResponseHandler(status, response) {

                if (response.error) {

                    $('.error')

                        .removeClass('hide')

                        .find('.alert')

                        .text(response.error.message);

                } else {

                    /* token contains id, last4, and card type */

                    var token = response['id'];



                    $form.find('input[type=text]').empty();

                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

                    $form.get(0).submit();

                }

            }



        });
    </script>
@endpush
