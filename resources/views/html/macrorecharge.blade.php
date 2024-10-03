@extends('layouts.main')
@section('content')
    {{ Session::get('success') }}
    <section class="product-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-products">
                        <div class="percent-ratio">
                            <span>{{ $value->discount_price }}%</span>
                        </div>
                        <div class="product-slides owl-carousel owl-theme">
                            @foreach ($product_images as $value)
                                <div class="item">
                                    <div class="img-carousel">
                                        <a href="#select_one">
                                            <img src="{{ asset($value->image) }}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="detail-one">
                        <h1 name="name">{{ $product->product_title }}</h1>
                        <h5><span>${{ $product->total_price }}</span>${{ $product->price }}</h5>

                        {!! $product->description !!}

                        <div class="countre-div">
                            <div class="plus-minus counter">
                                <button class="counter-span decrement"><i class="fa-solid fa-minus"></i></button>
                                <button class="counter-span count">1</button>
                                <button class="counter-span increment"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            @if (Auth::user()->role == 3)
                                <div class="counter-btn">
                                    <button type="submit" class="btn red-btn">ADD TO CART</button>
                                </div>
                            @else
                                <form method="post" action="{{ route('save_cart') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" id="name"
                                        value="{{ $product->product_title }}">
                                    <input type="hidden" name="price" id="price" value="{{ $product->total_price }}">
                                    <input type="hidden" name="qty" id="qty" value="1">
                                    <div class="counter-btn">
                                        <button type="submit" class="btn red-btn">ADD TO CART</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="limits-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="limits-break">
                        <h3>{{ $product->section_2_h1 }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="product-inner supplement-fact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="main-products">
                        <div class="img-carousel">
                            <a href="#">
                                <img src="{{ asset($product->image_2) }}" class="img-fluid" alt="">
                            </a>

                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="stack-ul">
                        {!! $product->section_2_p !!}

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="premium-formula">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="formula-flex">
                        <ul>
                            <li>
                                <div class="formula-img">
                                    <img src="{{ url('assets/images/icon-1.png') }}" class="img-fluid" alt="">
                                </div>
                                <div class="formula-para">
                                    <p>Premium Formula</p>
                                </div>
                            </li>
                            <li>
                                <div class="formula-img">
                                    <img src="{{ url('assets/images/icon-2.png') }}" class="img-fluid" alt="">
                                </div>
                                <div class="formula-para">
                                    <p>Full Transparency Label</p>
                                </div>
                            </li>
                            <li>
                                <div class="formula-img">
                                    <img src="{{ url('assets/images/icon-3.png') }}" class="img-fluid" alt="">
                                </div>
                                <div class="formula-para">
                                    <p>
                                        Research-Backed Ingredients</p>
                                </div>
                            </li>
                            <li>
                                <div class="formula-img">
                                    <img src="{{ url('assets/images/icon-4.png') }}" class="img-fluid" alt="">
                                </div>
                                <div class="formula-para">
                                    <p>No Side Effects</p>
                                </div>
                            </li>
                            <li>
                                <div class="formula-img">
                                    <img src="{{ url('assets/images/icon-5.png') }}" class="img-fluid" alt="">
                                </div>
                                <div class="formula-para">
                                    <p>Made in America</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="limits-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="limits-break">
                        <h3>Science-backed formula to improve vital <span class="d-block">sleep scores and boost muscle
                                recovery</span>while you sleep.</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="product-inner backed-formula">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="main-products">
                        <div class="img-carousel">
                            <a href="#">
                                <img src="{{ url('assets/images/man2.webp') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="stack-ul">
                        <ul>
                            <li>
                                <span><img src="{{ url('assets/images/bullet-20x20.png') }}" class="img-fluid"
                                        alt=""></span>
                                <p>Calcium Carbonate and Magnesium support bone and muscle health.</p>
                            </li>
                            <li>
                                <span><img src="{{ url('assets/images/bullet-20x20.png') }}" class="img-fluid"
                                        alt=""></span>
                                <p> Vitamin B6 aids in metabolism.</p>
                            </li>
                            <li>
                                <span><img src="{{ url('assets/images/bullet-20x20.png') }}" class="img-fluid"
                                        alt=""></span>
                                <p>L-Tryptophan helps improve sleep quality.</p>
                            </li>
                            <li>
                                <span><img src="{{ url('assets/images/bullet-20x20.png') }}" class="img-fluid"
                                        alt=""></span>
                                <p>Goji Berry is known for its antioxidant properties.</p>
                            </li>
                            <li>
                                <span><img src="{{ url('assets/images/bullet-20x20.png') }}" class="img-fluid"
                                        alt=""></span>
                                <p>Chamomile promotes relaxation, and Ashwagandha helps reduce stress and anxiety,
                                    contributing to better overall wellness and sleep.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="stack_well">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="stack-h">
                        <h3>STACKS WELL WITH</h3>
                    </div>
                    <div class="shop_pg stack-rows">
                        <div class="row">
                            @foreach ($data as $key => $data)
                                <div class="col-lg-3">
                                    <div class="main-featured">
                                        <div class="featured-info">

                                            <div class="discription-retio">
                                                <a href="#" class="search-info">
                                                    <span>Quick view</span>
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </a>
                                                <a href="macrorecharge.php">
                                                    <div class="percent-ratio">
                                                        <span>{{ $data->discount_price }}%</span>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="product-img">
                                                <a href="{{ route('productdetail', ['id' => $data->id]) }}">
                                                    <img src="{{ asset($data->image) }}" class="img-fluid op-one"
                                                        alt="">
                                                    <img src="{{ asset($data->image_2) }}" class="img-fluid op-zero"
                                                        alt="">
                                                </a>
                                            </div>

                                            <div class="product-name">
                                                <h6><a href="macrorecharge.php">{{ $data->product_title }}</a></h6>
                                                <h6 style="color: black">
                                                    <span>${{ $data->total_price }}</span>${{ $data->price }}</h6>
                                            </div>
                                            @if (Auth::user()->role == 3)
                                                <a href="#" class="btn red-btn">
                                                    <span>ADD TO CART</span>
                                                    <span><i class="fa-solid fa-cart-shopping"></i></span>
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" class="btn red-btn addToCart"
                                                    data-product-id="{{ $value->id }}">
                                                    <span>ADD TO CART</span>
                                                    <span><i class="fa-solid fa-cart-shopping"></i></span>
                                                </a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="guarantee">
                        <div class="guarantee-img">
                            <img src="{{ url('assets/images/guranty-100-1.webp') }}" class="img-fluid" alt="">
                        </div>
                        <p>30 DAYS 100% MONEY BACK GUARANTEE </p>
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

    <script>
        @if (Session::has('success'))
            alert("{{ Session::get('success') }}");
        @elseif (Session::has('error'))
            alert("{{ Session::get('error') }}");
        @elseif (Session::has('info'))
            alert("{{ Session::get('info') }}");
        @elseif (Session::has('warning'))
            alert("{{ Session::get('warning') }}");
        @endif
    </script>
@endsection
