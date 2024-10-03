{{-- <?php
dd(Auth::user()->role);
?> --}}
@extends('layouts.main')
@section('content')
    <section class="home-banner">
        <span class="flating-bottles top aaah">
            <img src="images/bottle-1.webp" class="img-fluid" alt="">
        </span>
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="custom-content">
                        <span class="custom-text text-1 letter-l">
                            GET LEAN
                        </span>
                        <div class="banner-images">
                            <span class="bootle letter-x">
                                <img src="images/maindbann.webp" class="img-fluid" alt="">
                            </span>
                            <span class="bg-bottle">
                                <img src="images/bottle-bg.png" class="img-fluid" alt="">
                            </span>
                        </div>
                        <span class="custom-text text-2 letter-a">
                            WITH MACROBYLT
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <span class="flating-bottles bottom oooh">
            <img src="images/bottle-2.webp" class="img-fluid" alt="">
        </span>
    </section>

    <section class="believe-achieve">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="overcome">

                        <h2>{{ App\Section::where('id', 1)->value('value') }}</h2>

                        {!! App\Section::where('id', 2)->value('value') !!}

                        <img src="{!! App\Section::where('id', 3)->value('value') !!}" class="img-fluid" alt="">

                        <div class="puch-limits">
                            <h2>{{ App\Section::where('id', 4)->value('value') }}</h2>

                            {!! App\Section::where('id', 5)->value('value') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="featured-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="overcome">
                        <h2>{{ App\Section::where('id', 6)->value('value') }}</h2>
                    </div>
                </div>
                {{-- <div class="col-lg-4">
                    <div class="main-featured">
                        <div class="featured-info">
                            <div class="discription-retio">
                                <a href="#" type="button" data-toggle="modal" data-target="#exampleModalCenter"
                                    class="search-info"> <span>Quick view</span>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <a href="macrosurge-pre.php">
                                    <div class="percent-ratio">
                                        <span>-30%</span>
                                    </div>
                                </a>
                            </div>

                            <div class="product-img"> <a href="macrosurge-pre.php">
                                    <img src="images/product-1.webp" class="img-fluid op-one" alt="">
                                    <img src="images/product-1-detail.webp" class="img-fluid op-zero" alt="">
                                </a>
                                <a href="macrosurge-pre.php" class="btn red-btn">
                                    <span> SELECT OPTIONS</span>
                                    <span><i class="fa-solid fa-cart-shopping"></i></span>
                                </a>
                            </div>
                            <div class="product-name">
                                <h6><a href="macrosurge-pre.php">MacroSurge Pre</a></h6>
                                <h6> <span>$49.99</span> $34.99</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-featured">
                        <div class="featured-info">
                            <div class="discription-retio">
                                <a href="#" class="search-info"> <span>Quick view</span>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <a href="macroshred-ignite.php">
                                    <div class="percent-ratio">
                                        <span>-8%</span>
                                    </div>
                                </a>
                            </div>

                            <div class="product-img"> <a href="macroshred-ignite.php">
                                    <img src="images/product-2.png" class="img-fluid op-one" alt="">
                                    <img src="images/product-2-detail.jpg" class="img-fluid op-zero" alt="">
                                </a>
                                <a href="macroshred-ignite.php" class="btn red-btn">
                                    <span> Add to cart</span>
                                    <span><i class="fa-solid fa-cart-shopping"></i></span>
                                </a>
                            </div>
                            <div class="product-name">
                                <h6><a href="macroshred-ignite.php">MacroShred Ignite</a></h6>
                                <h6> <span>$59.99</span> $54.99</h6>
                            </div>
                        </div>
                    </div>
                </div> --}}

                @foreach ($data as $key => $value)
                    <div class="col-lg-4">
                        <div class="main-featured">
                            <div class="featured-info">
                                <div class="discription-retio">
                                    <a href="{{ route('productdetail', ['id' => $value->id]) }}" class="search-info">
                                        <span>Quick view</span>
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                    <a href="{{ route('productdetail', ['id' => $value->id]) }}">
                                        <div class="percent-ratio">
                                            <span>{{ $value->discount_price }}%</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="product-img"> <a href="{{ route('productdetail', ['id' => $value->id]) }}">
                                        <img src="{{ $value->image }}" class="img-fluid op-one" alt="">
                                        <img src="{{ $value->image_2 }}" class="img-fluid op-zero" alt="">
                                    </a>
                                    @if (Auth::user()->role == 3)

                                        <a href="javascript:void(0)" class="btn red-btn "
                                            data-product-id="{{ $value->id }}">
                                            <span> Add to cart</span>
                                            <span><i class="fa-solid fa-cart-shopping"></i></span>
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" class="btn red-btn addToCart"
                                            data-product-id="{{ $value->id }}">
                                            <span> Add to cart</span>
                                            <span><i class="fa-solid fa-cart-shopping"></i></span>
                                        </a>
                                    @endif
                                </div>
                                <div class="product-name">
                                    <h6><a
                                            href="{{ route('productdetail', ['id' => $value->id]) }}">{{ $value->product_title }}</a>
                                    </h6>
                                    <h6> <span>${{ $value->total_price }}</span>${{ $value->price }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-4">
                    <div class="main-featured">
                        <div class="featured-info">
                            <div class="discription-retio">
                                <a href="#" class="search-info"> <span>Quick view</span>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <a href="macrolean-pro.php">
                                    <div class="percent-ratio">
                                        <span>-23%</span>
                                    </div>
                                </a>
                            </div>

                            <div class="product-img"> <a href="macrolean-pro.php">
                                    <img src="images/product-4.webp" class="img-fluid op-one" alt="">
                                    <img src="images/product-4-detail.webp" class="img-fluid op-zero" alt="">
                                </a>
                                <a href="macrolean-pro.php" class="btn red-btn">
                                    <span> Add to cart</span>
                                    <span><i class="fa-solid fa-cart-shopping"></i></span>
                                </a>
                            </div>
                            <div class="product-name">
                                <h6><a href="macrolean-pro.php">MacroLean Pro</a></h6>
                                <h6> <span>$64.99</span> $49.99</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-featured">
                        <div class="featured-info">
                            <div class="discription-retio">
                                <a href="#" class="search-info"> <span>Quick view</span>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <a href="macroboost-ultra-test.php">
                                    <div class="percent-ratio">
                                        <span>-21%</span>
                                    </div>
                                </a>
                            </div>

                            <div class="product-img"> <a href="macroboost-ultra-test.php">
                                    <img src="images/product-5.webp" class="img-fluid op-one" alt="">
                                    <img src="images/product-5-detail.webp" class="img-fluid op-zero" alt="">
                                </a>
                                <a href="macroboost-ultra-test.php" class="btn red-btn">
                                    <span> Add to cart</span>
                                    <span><i class="fa-solid fa-cart-shopping"></i></span>
                                </a>
                            </div>
                            <div class="product-name">
                                <h6><a href="macroboost-ultra-test.php">MacroBoost – Ultra Test <span
                                            class="d-block d-line">Male Enhancement
                                        </span></a></h6>
                                <h6> <span>$69.99</span> $54.99</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-featured">
                        <div class="featured-info">
                            <div class="discription-retio">
                                <a href="#" class="search-info"> <span>Quick view</span>
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <a href="collagen-peptides.php">
                                    <div class="percent-ratio">
                                        <span>-20%</span>
                                    </div>
                                </a>
                            </div>

                            <div class="product-img"> <a href="collagen-peptides.php">
                                    <img src="images/product-3.png" class="img-fluid op-one" alt="">
                                    <img src="images/product-3.png" class="img-fluid op-zero" alt="">
                                </a>
                                <a href="collagen-peptides.php" class="btn red-btn">
                                    <span> Add to cart</span>
                                    <span><i class="fa-solid fa-cart-shopping"></i></span>
                                </a>
                            </div>
                            <div class="product-name">
                                <h6><a href="collagen-peptides.php">Collagen Peptides</a></h6>
                                <h6> <span>$49.97</span> $39.97</h6>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>


    <section class="touch-stay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="stay_in">
                        <div class="workout_partner">
                            <h2>STAY IN TOUCH</h2>
                        </div>
                        <div class="need-help">
                            <div class="contact-need">
                                <h5>NEED HELP?</h5>
                                <p>Macrobylt is your workout partner!</p>
                            </div>
                            <a href="#" class="btn cont-btn">CONTACT US</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>

    </style>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.addToCart').click(function(e) {

                e.preventDefault();

                var productId = $(this).data('product-id');

                $.ajax({
                    url: "{{ route('save_cart') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Include the CSRF token
                        product_id: productId,
                        qty: 1 // Default quantity to 1, you can adjust this if needed
                    },

                    success: function(response) {
                        if (response.errors) {
                            // Handle errors (if any)
                            alert('Error: ' + response.errors);
                        } else {
                            // Show success message or update the cart UI
                            alert('Product added to cart!');
                            location.reload();
                            // Optionally, update the cart icon count or reload part of the page
                        }
                    },
                    error: function(response) {
                        alert('An error occurred while adding the product to the cart.');
                    }
                });
            });
        });
    </script>
@endsection
