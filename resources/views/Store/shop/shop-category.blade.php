@extends('Store.master')


@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>{{ $category->name }}</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>{{ $category->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="shop__option">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="shop__option__search">
                            <form action="#">
                                <select>
                                    <option value="">Categories</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="">{{ $subcategory->name }}</option>
                                    @endforeach

                                </select>
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="shop__option__right">
                            <select>
                                <option value="">Default sorting</option>
                                <option value="">A to Z</option>
                                <option value="">1 - 8</option>
                                <option value="">Name</option>
                            </select>
                            <a href="#"><i class="fa fa-list"></i></a>
                            <a href="#"><i class="fa fa-reorder"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <h3> Browse by categories</h3>
            </div>
            <div class="row">
               
                @foreach ($subcategories as $subcategory)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <a href="{{ route('home.shop.products', [$category->slug, $subcategory->slug]) }}">
                            <div class="product__item">
                                <div class="set-bg">
                                    <img class="product__item__pic"
                                        src ="{{ asset('assets/images/subcategories/' . $subcategory->image) }}">
                                </div>
                                <div class="text-center mt-2">
                                    <p>{{ $subcategory->name }}</p>
                                </div>
                                @if ($category->name === 'Healthy Catering')
                                <div class="text-center">
                                    <a href="#" class="btn site-btn text-success">subscribe</a>
                                </div>

                                @endif
                            </div>

                        </a>

                    </div>
                @endforeach
            </div>
            {{-- <div class="shop__last__option">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><span class="arrow_carrot-right"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__last__text">
                            <p>Showing 1-9 of 10 results</p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
