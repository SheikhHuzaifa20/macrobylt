@extends('layouts.main')
@section('content')
    <section class="inner-banner py-5" style="background: linear-gradient(135deg, #161b22 0%, #0d1117 100%); color: #fff;">
        <div class="container">
            <div class="row text-center py-4">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1 class="display-4 font-weight-bold text-uppercase mb-2" style="letter-spacing: 1px;">MOBILE ACCESSORIES SHOP</h1>
                        <p class="text-muted lead">Explore high-speed GaN chargers, MagSafe power banks, wireless earbuds & armor cases.</p>
                        <h6 class="text-white-50"><a href="{{ route('home') }}" class="text-decoration-none" style="color: #00d2ff;">HOME</a> <span class="mx-2">/</span> SHOP</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-product shop_pg py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row">
                @foreach ($shops as $key => $value)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="main-featured card border-0 shadow-sm h-100 p-3" style="border-radius: 16px; background: #ffffff;">
                            <div class="featured-info position-relative">
                                <div class="discription-retio d-flex justify-content-between align-items-center mb-2">
                                    <a href="{{ route('productdetail', ['id' => $value->id]) }}" class="search-info badge badge-secondary px-3 py-2">
                                        <span>Quick View</span> <i class="fa-solid fa-magnifying-glass ml-1"></i>
                                    </a>
                                    @if(!empty($value->discount_price))
                                        <div class="percent-ratio bg-danger text-white font-weight-bold px-2 py-1 rounded">
                                            <span>-{{ $value->discount_price }}%</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="product-img text-center my-3" style="height: 220px; display: flex; align-items: center; justify-content: center;">
                                    <a href="{{ route('productdetail', ['id' => $value->id]) }}">
                                        <img src="{{ asset($value->image) }}" class="img-fluid op-one" alt="{{ $value->product_title }}" style="max-height: 200px; object-fit: contain;">
                                    </a>
                                </div>

                                <div class="product-name text-center mt-3">
                                    <span class="badge badge-light text-muted mb-2 px-3 py-1" style="border: 1px solid #ddd;">{{ $value->category_title ?? 'Accessories' }}</span>
                                    <h5 class="font-weight-bold mb-2">
                                        <a href="{{ route('productdetail', ['id' => $value->id]) }}" style="color: #222; text-decoration: none;">
                                            {{ $value->product_title }}
                                        </a>
                                    </h5>
                                    <div class="price-box mb-3">
                                        @if(!empty($value->total_price))
                                            <span class="text-muted text-decoration-line-through mr-2" style="text-decoration: line-through;">${{ $value->total_price }}</span>
                                        @endif
                                        <span class="text-danger font-weight-bold h5">${{ $value->price }}</span>
                                    </div>

                                    <a href="javascript:void(0)" class="btn red-btn btn-block py-2 font-weight-bold addToCart"
                                        data-product-id="{{ $value->id }}" style="border-radius: 25px;">
                                        <span>ADD TO CART</span>
                                        <span class="ml-2"><i class="fa-solid fa-cart-shopping"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        .main-featured:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
            box-shadow: 0 12px 24px rgba(0,210,255,0.15) !important;
            border: 2px solid #00d2ff !important;
        }
        .red-btn {
            background: linear-gradient(135deg, #0099cc, #00d2ff);
            color: #ffffff;
            border: none;
            transition: background 0.3s ease;
        }
        .red-btn:hover {
            background: linear-gradient(135deg, #007aa3, #0099cc);
            color: #ffffff;
        }
        .search-info {
            color: #00d2ff !important;
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
