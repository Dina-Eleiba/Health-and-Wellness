@extends('Store.master')

@section('content')
    <section>
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card card-registration my-4">
                            <div class="row g-0">
                                <div class="col-xl-6 d-none d-xl-block">
                                    <img src="{{ asset('assets/store/img/healthy-foods.jpg') }}" alt="Sample photo"
                                        class="img-fluid" />
                                </div>
                                <div class="col-xl-6">
                                    <div class="card-body p-md-3 text-black">
                                        <h3 class="mb-5 mt-3 text-uppercase">Login </h3>
                                        <div class="col-md-12 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" id="email" name="email" class="form-control"
                                                    placeholder="Email" />
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div data-mdb-input-init class=" col-md-12 form-outline mb-4">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="password" />
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>




                                    <div class="text-center pb-3">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-warning btn-lg ms-2">Login</button>
                                    </div>
                                    <div class="mt-2 d-flex justify-content-center">
                                        <p class="fw-bold">
                                            Don't have an account ? <a href="{{ route('register') }}">Register</a>
                                        </p>
                                    </div>
                    </form>

                </div>

            </div>

        </div>





        </div>
        </div>
        </div>
        </div>
    </section>
@endsection
