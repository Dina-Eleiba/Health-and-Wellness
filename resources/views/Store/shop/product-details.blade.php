@extends('Store.master')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Product details</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">{{ $category->name }}</a>
                        <span>{{ $product->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__img">
                        <div class="product__details__big__img">
                            <img class="big_img" src="{{ asset('assets/images/products/' . $product->image) }}"
                                alt="">
                        </div>
                        {{-- <div class="product__details__thumb">
                        <div class="pt__item active">
                            <img data-imgbigurl="img/shop/details/product-big-2.jpg"
                            src="img/shop/details/product-big-2.jpg" alt="">
                        </div>
                        <div class="pt__item">
                            <img data-imgbigurl="img/shop/details/product-big-1.jpg"
                            src="img/shop/details/product-big-1.jpg" alt="">
                        </div>
                        <div class="pt__item">
                            <img data-imgbigurl="img/shop/details/product-big-4.jpg"
                            src="img/shop/details/product-big-4.jpg" alt="">
                        </div>
                        <div class="pt__item">
                            <img data-imgbigurl="img/shop/details/product-big-3.jpg"
                            src="img/shop/details/product-big-3.jpg" alt="">
                        </div>
                        <div class="pt__item">
                            <img data-imgbigurl="img/shop/details/product-big-5.jpg"
                            src="img/shop/details/product-big-5.jpg" alt="">
                        </div>
                    </div> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <div class="product__label">{{ $category->name }}</div>
                        <h4>{{ $product->name }}</h4>
                        <h5>{{ $product->price }} EGP</h5>
                        <p>{{ $product->description }}</p>
                        {{-- <ul>
                        <li>SKU: <span>17</span></li>
                        <li>Category: <span>{{ $category->name }}</span></li>
                        <li>Tags: <span>Gadgets, minimalisstic</span></li>
                    </ul> --}}
                        <div class="product__details__option mt-5">

                            <form method="POST" action="{{ route('home.add-to-cart') }}">
                                @csrf
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" name="quantity" value="1" min="1">
                                    </div>
                                </div>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="primary-btn">Add to cart</button>
                            </form>
                            <a href="#" class="heart__btn"><span class="icon_heart_alt"></span></a>
                        </div>
                    </div>
                </div>

                <div class="mt-5 ml-5">
                    <a href="#">
                        <button type="submit" class="primary-btn"> Leave Review</button>
                    </a>
                </div>
            </div>
            <div class="product__details__tab">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <p> No Reviews Yet
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Products Section Begin -->
    <section class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @foreach ($relatedProducts as $relatedProduct)
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('assets/images/products/' . $relatedProduct->image) }}">
                                <div class="product__label">
                                    <span>{{ $relatedProduct->Category->name }}</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{ $relatedProduct->name }}</a></h6>
                                <div class="product__item__price">{{ $relatedProduct->price }} EGp</div>
                                <div class="cart_add">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- Related Products Section End -->
@endsection
