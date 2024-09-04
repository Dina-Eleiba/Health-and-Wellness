@extends('Store.master')

@section('content')
    <section>
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card card-registration my-4">
                            <div class="row g-0">
                                <div class="col-xl-6 d-none d-xl-block">
                                    <img src="{{ asset('assets/store/img/healthy-foods.jpg') }}" alt="Sample photo"
                                        class="img-fluid" />
                                </div>
                                <div class="col-xl-6">
                                    <div class="card-body p-md-3 text-black">
                                        <h3 class="mb-5 mt-3 text-uppercase">Create An account </h3>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" id="first_name" name="first_name"
                                                        class="form-control" placeholder="First name" />
                                                    @error('first_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" id="last_name" name="last_name"
                                                        class="form-control " placeholder="Last name" />
                                                    @error('last_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" id="phone" name="phone" class="form-control"
                                                        placeholder="Phone" />
                                                    @error('phone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <div data-mdb-input-init class="form-outline">
                                                    <input type="text" id="email" name="email" class="form-control"
                                                        placeholder="Email" />
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="password" />
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h6 class="mb-0 me-4">Gender: </h6>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="femaleGender" value="female" />
                                                <label class="form-check-label" for="femaleGender">Female</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="maleGender" value="male" />
                                                <label class="form-check-label" for="maleGender">Male</label>
                                            </div>

                                        </div>
                                        @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="text-center pb-3">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-warning btn-lg ms-2">Register</button>
                                    </div>
                                    <div class="mt-2 d-flex justify-content-center">
                                        <p class="fw-bold">
                                            Already have an account ? <a href="{{ route('login') }}">Login</a>
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
