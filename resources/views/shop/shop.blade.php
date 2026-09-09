@extends('layouts.main')
@section('content')
    <section class="inner-banner py-5" style="background: linear-gradient(135deg, #161b22 0%, #0d1013 100%); border-bottom: 1px solid rgba(0, 210, 255, 0.15);">
        <div class="container">
            <div class="row text-center py-4">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <span class="text-uppercase font-weight-bold tracking-wider px-3 py-1 mb-3 d-inline-block rounded-pill" style="background: rgba(0, 210, 255, 0.1); color: #00d2ff; border: 1px solid rgba(0, 210, 255, 0.3); font-size: 0.85rem; letter-spacing: 2px;">
                            PREMIUM CATALOGUE
                        </span>
                        <h1 class="display-4 font-weight-bold text-uppercase mb-3" style="font-family: 'Bebas Neue', sans-serif; letter-spacing: 2px; color: #ffffff;">MOBILE ACCESSORIES SHOP</h1>
                        <p class="lead max-w-600 mx-auto mb-4" style="color: #94a3b8; font-size: 1.1rem;">Explore high-speed GaN chargers, MagSafe power banks, wireless earbuds & armor cases.</p>
                        <h6 class="text-uppercase" style="font-size: 0.9rem; letter-spacing: 1.5px;">
                            <a href="{{ route('home') }}" class="text-decoration-none" style="color: #00d2ff; font-weight: 600;">HOME</a> 
                            <span class="mx-2" style="color: rgba(255,255,255,0.3);">/</span> 
                            <span style="color: #cbd5e1;">SHOP</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-product shop_pg py-5" style="background: linear-gradient(180deg, #0d1013 0%, #0a0f1d 100%); min-height: 70vh;">
        <div class="container">
            <div class="row">
                @foreach ($shops as $key => $value)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="shop-card-wrapper h-100 p-4" style="background: #161b22; border: 1px solid rgba(0, 210, 255, 0.15); border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); display: flex; flex-direction: column; justify-content: space-between; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                            
                            {{-- Top Header Badges --}}
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                @if(!empty($value->discount_price))
                                    <div class="px-3 py-1 rounded-pill font-weight-bold" style="background: linear-gradient(135deg, #ff0055, #ff5500); color: #ffffff; font-size: 0.8rem; box-shadow: 0 4px 12px rgba(255, 0, 85, 0.3);">
                                        -{{ $value->discount_price }}%
                                    </div>
                                @else
                                    <div></div>
                                @endif
                                <a href="{{ route('productdetail', ['id' => $value->id]) }}" class="quick-view-badge text-decoration-none d-inline-flex align-items-center" style="background: rgba(0, 210, 255, 0.08); color: #00d2ff; border: 1px solid rgba(0, 210, 255, 0.25); border-radius: 8px; padding: 5px 12px; font-weight: 500; font-size: 0.8rem; letter-spacing: 0.5px; transition: all 0.2s ease;">
                                    <span>Quick View</span> <i class="fa-solid fa-magnifying-glass ml-2" style="font-size: 0.75rem;"></i>
                                </a>
                            </div>

                            {{-- Product Image Box --}}
                            <div class="shop-img-box my-2 p-3 text-center" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 14px; height: 210px; display: flex; align-items: center; justify-content: center; position: relative;">
                                <a href="{{ route('productdetail', ['id' => $value->id]) }}" class="w-100 h-100 d-flex align-items-center justify-content-center text-decoration-none">
                                    <img src="{{ asset($value->image) }}" alt="{{ $value->product_title }}" style="max-height: 180px; max-width: 100%; object-fit: contain; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.6)); transition: transform 0.4s ease; display: block; margin: 0 auto;">
                                </a>
                            </div>

                            {{-- Product Details --}}
                            <div class="shop-details-box text-center mt-3 d-flex flex-column align-items-center">
                                <span class="badge mb-2 px-3 py-1 text-uppercase font-weight-bold" style="background: rgba(0, 210, 255, 0.1); color: #00d2ff; border: 1px solid rgba(0, 210, 255, 0.25); border-radius: 6px; font-size: 0.75rem; letter-spacing: 1px;">
                                    {{ $value->category_title ?? 'Accessories' }}
                                </span>
                                <h5 class="font-weight-bold mb-2 w-100" style="font-size: 1.1rem; font-family: 'Manrope', sans-serif; min-height: 2.6rem; display: flex; align-items: center; justify-content: center;">
                                    <a href="{{ route('productdetail', ['id' => $value->id]) }}" class="product-title-link" style="color: #ffffff; text-decoration: none; transition: color 0.2s ease;">
                                        {{ $value->product_title }}
                                    </a>
                                </h5>
                                <div class="price-box mb-3 d-flex align-items-center justify-content-center gap-2">
                                    @if(!empty($value->total_price))
                                        <span style="text-decoration: line-through; color: #64748b; font-size: 0.95rem;" class="mr-2">${{ $value->total_price }}</span>
                                    @endif
                                    <span class="font-weight-bold mb-0" style="color: #00d2ff; font-family: 'Bebas Neue', sans-serif; font-size: 1.6rem; letter-spacing: 1px;">${{ $value->price }}</span>
                                </div>

                                <a href="javascript:void(0)" class="btn shop-cart-btn btn-block py-2 font-weight-bold addToCart text-uppercase d-flex align-items-center justify-content-center"
                                    data-product-id="{{ $value->id }}">
                                    <span>ADD TO CART</span>
                                    <i class="fa-solid fa-cart-shopping ml-2" style="font-size: 0.9rem;"></i>
                                </a>
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
        /* Override any conflicting global position:absolute styles */
        .shop-card-wrapper:hover {
            transform: translateY(-7px) !important;
            border-color: rgba(0, 210, 255, 0.5) !important;
            box-shadow: 0 15px 35px rgba(0, 210, 255, 0.2) !important;
        }
        .shop-card-wrapper:hover .shop-img-box img {
            transform: scale(1.06) !important;
        }
        .product-title-link:hover {
            color: #00d2ff !important;
        }
        .quick-view-badge:hover {
            background: rgba(0, 210, 255, 0.2) !important;
            color: #ffffff !important;
        }
        .shop-cart-btn {
            position: static !important;
            border-radius: 30px !important;
            background: linear-gradient(135deg, #0099cc, #00d2ff) !important;
            border: none !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            letter-spacing: 1px !important;
            box-shadow: 0 4px 15px rgba(0, 210, 255, 0.25) !important;
            transition: all 0.3s ease !important;
            height: 44px !important;
        }
        .shop-cart-btn:hover {
            background: linear-gradient(135deg, #00b4d8, #00f0ff) !important;
            box-shadow: 0 6px 22px rgba(0, 210, 255, 0.45) !important;
            transform: translateY(-2px) !important;
            color: #ffffff !important;
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
