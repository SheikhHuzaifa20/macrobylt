@extends('layouts.main')

@section('content')
    <section class="home-banner">
        <span class="flating-bottles top aaah">
            <img src="{{ asset('images/products/banner_img1.png') }}" class="img-fluid" alt="GaN Fast Charger">
        </span>
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="custom-content">
                        <span class="custom-text text-1 letter-l">
                            POWER UP
                        </span>
                        <div class="banner-images">
                            <span class="bootle letter-x">
                                <img src="{{ asset('images/products/banner_img.png') }}" class="img-fluid" alt="GadgetGrove MagSafe Power Bank">
                            </span>
                            <span class="bg-bottle">
                                <img src="{{ asset('images/products/banner_img2.png') }}" class="img-fluid" alt="Wireless Car Mount">
                            </span>
                        </div>
                        <span class="custom-text text-2 letter-a">
                            WITH GADGETGROVE
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <span class="flating-bottles bottom oooh">
            <img src="{{ asset('images/products/banner_img3.png') }}" class="img-fluid" alt="ANC Earbuds">
        </span>
    </section>

    <section class="believe-achieve">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="overcome">
                        <h2>High-Performance Power & Military-Grade Protection</h2>

                        <p>At GadgetGrove, we engineer next-generation mobile accessories designed to keep your smartphones, tablets, and laptops powered and protected wherever life takes you. Featuring ultra-fast 65W GaN Power Delivery, strong MagSafe magnetic alignment, and certified drop-tested protective armor cases, our gear delivers peak efficiency, premium aesthetics, and long-lasting durability.</p>

                        <div class="text-center my-4">
                            <img src="{{ asset('images/products/armor_phone_case_clean.png') }}" class="img-fluid" alt="GadgetGrove Armor Case" style="max-height: 420px; object-fit: contain;">
                        </div>

                        <div class="puch-limits">
                            <h2>Push Your Tech Limits With GadgetGrove</h2>

                            <p>Whether you are commuting, traveling, or working remotely, GadgetGrove mobile accessories ensure seamless 15W+ wireless fast charging, crystal-clear active noise-canceling audio, and rugged 12ft drop protection for all major flagship smartphones.</p>
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
                        <h2>Featured Mobile Accessories</h2>
                    </div>
                </div>

                @foreach ($data as $key => $value)
                    <div class="col-lg-4">
                        <div class="main-featured">
                            <div class="featured-info">
                                <div class="discription-retio">
                                    <a href="{{ route('productdetail', ['id' => $value->id]) }}" class="search-info">
                                        <span>Quick view</span>
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                    @if(!empty($value->discount_price))
                                        <a href="{{ route('productdetail', ['id' => $value->id]) }}">
                                            <div class="percent-ratio">
                                                <span>-{{ $value->discount_price }}%</span>
                                            </div>
                                        </a>
                                    @endif
                                </div>

                                <div class="product-img">
                                    <a href="{{ route('productdetail', ['id' => $value->id]) }}">
                                        <img src="{{ asset($value->image) }}" class="img-fluid op-one" alt="{{ $value->product_title }}" style="max-height: 280px; object-fit: contain;">
                                        <img src="{{ asset($value->image_2) }}" class="img-fluid op-zero" alt="{{ $value->product_title }}" style="max-height: 280px; object-fit: contain;">
                                    </a>
                                    <a href="javascript:void(0)" class="btn red-btn addToCart"
                                        data-product-id="{{ $value->id }}">
                                        <span> Add to cart</span>
                                        <span><i class="fa-solid fa-cart-shopping"></i></span>
                                    </a>
                                </div>
                                <div class="product-name">
                                    <h6>
                                        <a href="{{ route('productdetail', ['id' => $value->id]) }}">{{ $value->product_title }}</a>
                                    </h6>
                                    <h6> 
                                        @if(!empty($value->total_price))
                                            <span>${{ $value->total_price }}</span>
                                        @endif
                                        ${{ $value->price }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                                <p>GadgetGrove is your tech accessories partner!</p>
                            </div>
                            <a href="{{ route('contact') }}" class="btn cont-btn">CONTACT US</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        .home-banner .custom-text {
            color: rgba(0, 210, 255, 0.25) !important;
            -webkit-text-stroke-color: #00d2ff !important;
        }
        .main-featured:hover {
            border-color: #00d2ff !important;
        }
        .cont-btn {
            background: linear-gradient(135deg, #0099cc, #00d2ff);
            border: none !important;
            color: #fff !important;
        }
        .cont-btn:hover {
            background: linear-gradient(135deg, #007aa3, #0099cc);
            box-shadow: 0 8px 24px rgba(0,210,255,0.3);
        }
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
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        qty: 1
                    },
                    success: function(response) {
                        if (response.errors) {
                            alert('Error: ' + response.errors);
                        } else {
                            alert('Product added to cart!');
                            location.reload();
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
