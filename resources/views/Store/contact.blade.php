@extends('Store.master')


@section('content')
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="map">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-4 col-md-7">
                            <div class="map__inner">
                                <h6>Dina wellness</h6>
                                <ul>
                                    <li>Cairo , Egypt</li>
                                    <li>dina-wellness@suppport.com</li>
                                    <li>01203555145
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="map__iframe">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10784.188505644011!2d19.053119335158936!3d47.48899529453826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1543907528304"
                        height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="contact__address">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact__address__item">
                            <h6>Cairo</h6>
                            <ul>
                                <li>
                                    <span class="icon_pin_alt"></span>
                                    <p>Misr Elgedida, Cairo,Egypt</p>
                                </li>
                                <li><span class="icon_headphones"></span>
                                    <p>01203555145</p>
                                </li>
                                <li><span class="icon_mail_alt"></span>
                                    <p>dina-wellness@suppport.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact__address__item">
                            <h6>Alexandria</h6>
                            <ul>
                                <li>
                                    <span class="icon_pin_alt"></span>
                                    <p>san steafeno, Alexandria, Egypt</p>
                                </li>
                                <li><span class="icon_headphones"></span>
                                    <p>01203555155</p>
                                </li>
                                <li><span class="icon_mail_alt"></span>
                                    <p>dina-wellness@suppport.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact__text">
                        <h3>Contact With us</h3>
                        <ul>
                            <li>Representatives or Advisors are available:</li>
                            <li>Mon-Fri: 5:00am to 9:00pm</li>
                            <li>Sat-Sun: 6:00am to 9:00pm</li>
                        </ul>
                        <img src="img/cake-piece.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact__form">
                        <form action="{{ route('home.contact-form') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name" name="name">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email" name="email">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <textarea placeholder="Message" name="message"></textarea>
                                    @error('message')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <button type="submit" class="site-btn">Send Us</button>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
