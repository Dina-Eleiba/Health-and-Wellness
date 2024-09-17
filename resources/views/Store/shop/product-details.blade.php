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

                {{-- <div class="mt-5 ml-5">
                    <a href="#tabs-2">
                        <button type="submit" class="primary-btn"> Leave Review</button>
                    </a>
                </div> --}}
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
                                <div class="col-lg-12">
                                    @if (count($reviews) == 0)
                                        <p class="text-danger"> No Reviews Yet
                                        </p>
                                    @endif
                                    @auth
                                        {{-- comment --}}
                                        <section>
                                            <div class="py-2 text-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="">
                                                                <div class="card-body p-4">
                                                                    <div class="d-flex w-100 ml-5">
                                                                        <img class="rounded-circle shadow-1-strong me-3"
                                                                            src="{{ asset('assets/store/img/Reviews/anonymous-user.jpg') }}"
                                                                            alt="avatar" width="65" height="65" />
                                                                        <div class="w-100 ml-5">
                                                                            <h5>Add a comment</h5>
                                                                            {{-- check if user ordered the product --}}
                                                                            <form action="{{ route('product.store-review') }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                <input type="hidden" id="selectedRating"
                                                                                    name="rating" value="0" />
                                                                                <input type="hidden" id="selectedProduct"
                                                                                    name="product_id"
                                                                                    value="{{ $product->id }}" />
                                                                                <ul id="rating"
                                                                                    class="rating mb-3 d-flex justify-content-start"
                                                                                    style="list-style-type: none; padding-left: 0;">
                                                                                    <li class="my-1">
                                                                                        <i class="far fa-star fa-sm text-danger"
                                                                                            data-value="1" title="Bad"></i>
                                                                                    </li>
                                                                                    <li class="my-1">
                                                                                        <i class="far fa-star fa-sm text-danger"
                                                                                            data-value="2" title="Poor"></i>
                                                                                    </li>
                                                                                    <li class="my-1">
                                                                                        <i class="far fa-star fa-sm text-danger"
                                                                                            data-value="3" title="OK"></i>
                                                                                    </li>
                                                                                    <li class="my-1">
                                                                                        <i class="far fa-star fa-sm text-danger"
                                                                                            data-value="4" title="Good"></i>
                                                                                    </li>
                                                                                    <li class="my-1">
                                                                                        <i class="far fa-star fa-sm text-danger"
                                                                                            data-value="5"
                                                                                            title="Excellent"></i>
                                                                                    </li>
                                                                                </ul>

                                                                                <div data-mdb-input-init class="form-outline">
                                                                                    <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
                                                                                </div>
                                                                                <div class="d-flex justify-content-end mt-5">
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">
                                                                                        Add Review
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        {{-- End of comment  --}}
                                    @endauth
                                    @if (count($reviews) > 0)
                                        <div class="blog__details__comment mt-5">
                                            <h5>{{ count($reviews) }} Comment</h5>
                                            @foreach ($reviews as $review)
                                                <div class="blog__details__comment__item">
                                                    <div class="blog__details__comment__item__pic">
                                                        @if ($review->user->gender == 'female')
                                                            <img src="{{ asset('assets/store/img/Reviews/female.jpg') }}"
                                                                alt="">
                                                        @else
                                                            <img src="{{ asset('assets/store/img/Reviews/male.png') }}"
                                                                alt="">
                                                        @endif
                                                    </div>
                                                    <div class="blog__details__comment__item__text">
                                                        <h6>{{ $review->user->first_name }} {{ $review->user->last_name }}
                                                        </h6>
                                                        <span>{{ $review->created_at }}</span>
                                                        {{-- Display the rating as stars --}}
                                                        <div class="review-rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $review->rating)
                                                                    <i class="fas fa-star text-danger"></i>
                                                                    {{-- Filled star --}}
                                                                @else
                                                                    <i class="far fa-star text-danger"></i>
                                                                    {{-- Empty star --}}
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <p>{{ $review->comment }}</p>
                                                        {{-- <div class="blog__details__comment__btns">
                                                            <a href="#">Reply</a>
                                                            <a href="#">Like</a>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

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


@push('js')
    <script>
        // JavaScript to handle star rating
        const stars = document.querySelectorAll('#rating li i');
        const ratingInput = document.getElementById('selectedRating');

        stars.forEach((star, index) => {
            star.addEventListener('click', function() {
                const selectedValue = this.getAttribute('data-value');
                ratingInput.value = selectedValue;

                // Reset all stars
                stars.forEach(star => {
                    star.classList.remove('fas'); // Solid star
                    star.classList.add('far'); // Regular star
                });

                // Highlight selected stars
                for (let i = 0; i <= index; i++) {
                    stars[i].classList.remove('far');
                    stars[i].classList.add('fas');
                }
            });

            // Handle hover effect
            star.addEventListener('mouseover', function() {
                stars.forEach((s, i) => {
                    if (i <= index) {
                        s.classList.add('fas');
                        s.classList.remove('far');
                    }
                });
            });

            // Reset hover effect
            star.addEventListener('mouseout', function() {
                const selectedValue = ratingInput.value;
                stars.forEach((s, i) => {
                    if (i >= selectedValue) {
                        s.classList.remove('fas');
                        s.classList.add('far');
                    }
                });
            });
        });
    </script>
@endpush
