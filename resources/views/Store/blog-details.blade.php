@extends('Store.master')

@section('title', 'Blog')

@section('content')
    <!-- Blog Hero Begin -->
    <div class="blog-hero set-bg" data-setbg="{{ asset('assets/images/posts/' . $post->image) }}">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <div class="blog__hero__text">
                        <div class="label">Recipes</div>
                        <h2>{{ $post->title }}</h2>
                        <ul>
                            <li>By <span>{{ $post->created_by }}</span></li>
                            <li>{{ $post->created_at }}</li>
                            <li>112 Views</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__share">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        </div>
                        <div class="blog__details__text">
                            {!! $post->content !!}
                        </div>
                        {{-- <div class="blog__details__recipe">
                            <div class="blog__details__recipe__item">
                                <h6><img src="img/blog/details/user.png" alt=""> SERVES</h6>
                                <span>2 as a main, 4 as a side</span>
                            </div>
                            <div class="blog__details__recipe__item">
                                <h6><img src="img/blog/details/clock.png" alt=""> PREP TIME</h6>
                                <span>15 minute</span>
                            </div>
                            <div class="blog__details__recipe__item">
                                <h6><img src="img/blog/details/clock.png" alt=""> COOK TIME</h6>
                                <span>15 minute</span>
                            </div>
                        </div>
                        <div class="blog__details__recipe__details">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog__details__ingredients">
                                        <h6>Ingredients</h6>
                                        <ul>
                                            <li><span>.</span> 1 cup (240 ml) whole milk</li>
                                            <li><span>.</span> 1 cup (240 ml) water, plus more as needed</li>
                                            <li><span>.</span> 1 teaspoon fine sea salt</li>
                                            <li><span>.</span> 2 tablespoons olive oil</li>
                                            <li><span>.</span> 3/4 cup (120 g) fine polenta</li>
                                            <li><span>.</span> 3 cups sunflower oil, plus more as needed</li>
                                            <li><span>.</span> 7 ounces (200 g) peeled parsnips,</li>
                                            <li><span>.</span> 1 pinch fine sea salt, plus more to taste</li>
                                            <li><span>.</span> 2 tablespoons (30 g) unsalted butter</li>
                                            <li><span>.</span> 1/2 tablespoon maple syrup</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="blog__details__ingredients__pic">
                                        <img src="img/blog/details/blog-details.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog__details__direction">
                            <h6>Directions</h6>
                            <ul>
                                <li><span>01.</span> Combine all of the ingredients, kneading to form a smooth dough.
                                </li>
                                <li><span>02.</span> Allow the dough to rise, in a lightly greased, covered bowl, until
                                    it’s doubled in size,</li>
                                <li><span>03.</span> about 90 minutes.</li>
                                <li><span>04.</span> Gently divide the dough in half; it’ll deflate somewhat. Gently
                                    shape the dough into two oval loaves; or, for longer loaves, two 10″ to 11″ logs.
                                </li>
                                <li><span>05.</span> Place the loaves on a lightly greased or parchment-lined baking
                                    sheet. Cover and let</li>
                                <li><span>06.</span> rise until very puffy, about 1 hour. Towards the end of the rising
                                    time, preheat the oven</li>
                                <li><span>07.</span> to 425°F.</li>
                                <li><span>08.</span> Spray the loaves with lukewarm water. Make two fairly deep diagonal
                                    slashes in each; a serrated bread knife, wielded firmly,</li>
                            </ul>
                        </div>
                        <div class="blog__details__print">
                            <a href="#" class="primary-btn"><i class="fa fa-print"></i> Print recipe</a>
                        </div>
                        <div class="blog__details__text">
                            <p>Molded ports in cast burners seem like they would be a good idea, but there is
                                considerable difficulty in making them uniform. Thus, it is quicker and less expensive
                                to drill.</p>
                            <p>Fire Magic grill burner has drilled orifices Notice (from the photo on our site) the lack
                                of extensive burring, allowing for a smooth flow of gas. Cast stainless leaves few, if
                                any, burrs when drilled. This burner has a lifetime warranty, including against rust and
                                burn-through.</p>
                        </div> --}}
                        <div class="blog__details__tags">
                            <span>Tag</span>
                            <a href="#">Food</a>
                            <a href="#">Material</a>
                            <a href="#">Cakes</a>
                            <a href="#">Baking</a>
                        </div>
                        {{-- <div class="blog__details__btns">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__btns__item">
                                        <a href="#"><span class="arrow_carrot-left"></span> Previous posts</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__btns__item blog__details__btns__item--next">
                                        <a href="#">Next posts <span class="arrow_carrot-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="blog__details__author">
                            <div class="blog__details__author__pic">
                                <img src="img/blog/details/blog-author.jpg" alt="">
                            </div>
                            <div class="blog__details__author__text">
                                <h6>Mitchell Holland</h6>
                                <div class="blog__details__author__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div> --}}
                        <div class="blog__details__comment">
                            <h5>{{ count($comments) }} Comment</h5>
                            @auth
                                {{-- comment --}}
                                <section>
                                    <div class="py-2 text-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div>
                                                        <div>
                                                            <div class="d-flex w-100">
                                                                <img class="rounded-circle shadow-1-strong me-3"
                                                                    src="{{ asset('assets/store/img/Reviews/anonymous-user.jpg') }}"
                                                                    alt="avatar" width="65" height="65" />
                                                                <div class="w-100 ml-5">
                                                                    <h5>Add a comment</h5>
                                                                    <form action="{{ route('home.blog.store-comment') }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="post_id"
                                                                            value="{{ $post->id }}" />
                                                                        <div data-mdb-input-init class="form-outline">
                                                                            <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
                                                                        </div>
                                                                        <div class="d-flex justify-content-end mt-5">
                                                                            <button type="submit" class="btn btn-danger">
                                                                                Add Comment
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
                            @if($comments->count() > 0)
                                @foreach($comments as $comment)
                                    <div class="blog__details__comment__item">
                                        <div class="blog__details__comment__item__pic">
                                            @if ($comment->user->gender == 'female')
                                            <img src="{{ asset('assets/store/img/Reviews/female.jpg') }}"
                                                alt="">
                                        @else
                                            <img src="{{ asset('assets/store/img/Reviews/male.png') }}"
                                                alt="">
                                        @endif
                                        </div>

                                        <div class="blog__details__comment__item__text">
                                            <h6>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</h6>
                                            <span>{{ $comment->created_at }}</span>
                                            <p>{{$comment->comment}}</p>
                                            {{-- <div class="blog__details__comment__btns">
                                                <a href="#">Reply</a>
                                                <a href="#">Like</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            {{-- <div class="blog__details__comment__item blog__details__comment__item--reply">
                                <div class="blog__details__comment__item__pic">
                                    <img src="img/blog/details/comment-2.jpg" alt="">
                                </div>
                                <div class="blog__details__comment__item__text">
                                    <h6>Derrick Patrick</h6>
                                    <span>26 Feb 2020</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua vel facilisis.</p>
                                    <div class="blog__details__comment__btns">
                                        <a href="#">Reply</a>
                                        <a href="#">Like</a>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
@endsection
