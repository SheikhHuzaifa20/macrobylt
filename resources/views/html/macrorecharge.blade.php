@extends('layouts.main')
@section('content')

    {{-- Inner Banner --}}
    <section class="inner-banner py-5" style="background: linear-gradient(135deg, #161b22 0%, #0d1013 100%); border-bottom: 1px solid rgba(0, 210, 255, 0.15);">
        <div class="container">
            <div class="row text-center py-3">
                <div class="col-12">
                    <span class="text-uppercase font-weight-bold px-3 py-1 mb-3 d-inline-block rounded-pill" style="background: rgba(0, 210, 255, 0.1); color: #00d2ff; border: 1px solid rgba(0, 210, 255, 0.3); font-size: 0.8rem; letter-spacing: 2px;">
                        PRODUCT DETAILS
                    </span>
                    <h1 class="font-weight-bold text-uppercase mb-3" style="font-family: 'Bebas Neue', sans-serif; letter-spacing: 2px; color: #ffffff; font-size: 2.8rem;">{{ $product->product_title }}</h1>
                    <h6 class="text-uppercase" style="font-size: 0.9rem; letter-spacing: 1.5px;">
                        <a href="{{ route('home') }}" class="text-decoration-none" style="color: #00d2ff; font-weight: 600;">HOME</a>
                        <span class="mx-2" style="color: rgba(255,255,255,0.3);">/</span>
                        <a href="{{ route('shop') }}" class="text-decoration-none" style="color: #00d2ff; font-weight: 600;">SHOP</a>
                        <span class="mx-2" style="color: rgba(255,255,255,0.3);">/</span>
                        <span style="color: #cbd5e1;">{{ $product->product_title }}</span>
                    </h6>
                </div>
            </div>
        </div>
    </section>

    {{-- Product Main Section --}}
    <section class="product-inner py-5" style="background: linear-gradient(180deg, #0d1013 0%, #0a0f1d 100%);">
        <div class="container">
            <div class="row align-items-start">
                {{-- Product Image --}}
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="pd-image-card p-4 text-center position-relative" style="background: #161b22; border: 1px solid rgba(0, 210, 255, 0.15); border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                        @if(!empty($product->discount_price))
                            <div class="position-absolute px-3 py-1 font-weight-bold" style="top: 20px; left: 20px; background: linear-gradient(135deg, #ff0055, #ff5500); color: #fff; border-radius: 10px; font-size: 0.85rem; z-index: 10; box-shadow: 0 4px 12px rgba(255,0,85,0.4);">
                                -{{ $product->discount_price }}% OFF
                            </div>
                        @endif
                        <div class="p-4" style="min-height: 380px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); border-radius: 14px;">
                            <img src="{{ asset($product->image) }}" class="img-fluid" alt="{{ $product->product_title }}"
                                style="max-height: 340px; object-fit: contain; filter: drop-shadow(0 15px 25px rgba(0,0,0,0.7)); position: static !important; transition: transform 0.4s ease;">
                        </div>
                        @if(!empty($product_images) && count($product_images) > 0)
                            <div class="d-flex gap-2 justify-content-center mt-3 flex-wrap">
                                @foreach($product_images as $img)
                                    <div class="pd-thumb" onclick="switchImg('{{ asset($img->image) }}')" style="cursor: pointer; border: 2px solid rgba(0,210,255,0.2); border-radius: 10px; padding: 4px; transition: all 0.2s ease; background: rgba(255,255,255,0.03);">
                                        <img src="{{ asset($img->image) }}" style="width: 72px; height: 72px; object-fit: contain; border-radius: 8px; position: static !important;">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Product Info --}}
                <div class="col-lg-6">
                    <div class="pd-info-card p-4" style="background: #161b22; border: 1px solid rgba(0,210,255,0.15); border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                        <span class="d-inline-block px-3 py-1 mb-3 text-uppercase font-weight-bold" style="background: rgba(0,210,255,0.15); color: #00d2ff; border: 1px solid rgba(0,210,255,0.3); border-radius: 20px; font-size: 0.8rem; letter-spacing: 1.5px;">
                            OFFICIAL GADGETGROVE ACCESSORY
                        </span>
                        <h2 class="font-weight-bold mb-3 text-uppercase" style="font-family: 'Bebas Neue', sans-serif; color: #ffffff; font-size: 2.2rem; letter-spacing: 1.5px; line-height: 1.2;">{{ $product->product_title }}</h2>

                        <div class="pd-price mb-4 d-flex align-items-center gap-3">
                            @if(!empty($product->total_price))
                                <span style="text-decoration: line-through; color: #64748b; font-size: 1.3rem;">${{ $product->total_price }}</span>
                            @endif
                            <span style="color: #00d2ff; font-family: 'Bebas Neue', sans-serif; font-size: 3rem; letter-spacing: 1px; line-height: 1;">${{ $product->price }}</span>
                        </div>

                        <div class="pd-desc mb-4 p-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06); border-radius: 12px;">
                            <p style="color: #94a3b8; font-size: 1rem; line-height: 1.7; margin: 0;">
                                {!! $product->description !!}
                            </p>
                        </div>

                        <div class="pd-features mb-4 p-3 rounded" style="background: rgba(0,210,255,0.04); border: 1px solid rgba(0,210,255,0.1); border-radius: 14px;">
                            <div class="row">
                                <div class="col-6 mb-2 d-flex align-items-center" style="color: #cbd5e1; font-size: 0.9rem;">
                                    <i class="fa-solid fa-check-circle mr-2" style="color: #00d2ff;"></i> In Stock & Ready to Ship
                                </div>
                                <div class="col-6 mb-2 d-flex align-items-center" style="color: #cbd5e1; font-size: 0.9rem;">
                                    <i class="fa-solid fa-truck-fast mr-2" style="color: #00d2ff;"></i> Free Express Delivery
                                </div>
                                <div class="col-6 mb-0 d-flex align-items-center" style="color: #cbd5e1; font-size: 0.9rem;">
                                    <i class="fa-solid fa-shield-halved mr-2" style="color: #00d2ff;"></i> 1-Year GadgetGrove Warranty
                                </div>
                                <div class="col-6 mb-0 d-flex align-items-center" style="color: #cbd5e1; font-size: 0.9rem;">
                                    <i class="fa-solid fa-rotate-left mr-2" style="color: #00d2ff;"></i> 30-Day Money Back Guarantee
                                </div>
                            </div>
                        </div>

                        <form method="post" action="{{ route('save_cart') }}" class="add-to-cart-form">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="name" id="name" value="{{ $product->product_title }}">
                            <input type="hidden" name="price" id="price" value="{{ $product->price }}">

                            <label class="d-block mb-2 text-uppercase font-weight-bold" style="color: #94a3b8; font-size: 0.8rem; letter-spacing: 1px;">QUANTITY:</label>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="pd-qty-wrap" style="display: flex; align-items: center; border: 1px solid rgba(0,210,255,0.3); border-radius: 12px; overflow: hidden; background: #0d1013;">
                                    <button type="button" onclick="changeQty(-1)" style="width: 44px; height: 48px; background: rgba(0,210,255,0.1); border: none; color: #00d2ff; font-size: 1.3rem; cursor: pointer;">−</button>
                                    <input type="number" name="qty" id="qty" value="1" min="1" max="10" style="width: 60px; height: 48px; text-align: center; background: transparent; border: none; border-left: 1px solid rgba(0,210,255,0.15); border-right: 1px solid rgba(0,210,255,0.15); color: #fff; font-size: 1.1rem; font-weight: 700; outline: none;">
                                    <button type="button" onclick="changeQty(1)" style="width: 44px; height: 48px; background: rgba(0,210,255,0.1); border: none; color: #00d2ff; font-size: 1.3rem; cursor: pointer;">+</button>
                                </div>
                                <button type="submit" class="pd-add-btn flex-grow-1 d-flex align-items-center justify-content-center font-weight-bold text-uppercase" style="height: 48px; background: linear-gradient(135deg, #0099cc, #00d2ff); color: #fff; border: none; border-radius: 30px; font-size: 1.05rem; letter-spacing: 1.5px; box-shadow: 0 4px 20px rgba(0,210,255,0.3); cursor: pointer; transition: all 0.3s ease;">
                                    ADD TO CART <i class="fa-solid fa-cart-shopping ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Product Highlights --}}
    <section class="py-5" style="background: #0d1013; border-top: 1px solid rgba(0,210,255,0.1);">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="font-weight-bold text-uppercase mb-2" style="font-family: 'Bebas Neue', sans-serif; color: #ffffff; font-size: 2.2rem; letter-spacing: 2px;">ENGINEERED FOR EXCELLENCE</h3>
                <p style="color: #94a3b8;">Built with premium materials and rigorous testing standards.</p>
                <div style="width: 60px; height: 3px; background: linear-gradient(90deg, #0099cc, #00d2ff); margin: 0 auto; border-radius: 2px;"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-3 col-6 mb-3">
                    <div class="pd-feat-card text-center p-4 h-100" style="background: #161b22; border: 1px solid rgba(0,210,255,0.15); border-radius: 16px; transition: all 0.3s ease;">
                        <i class="fa-solid fa-microchip mb-3" style="font-size: 2rem; color: #00d2ff;"></i>
                        <p class="font-weight-bold mb-0" style="color: #ffffff; font-size: 0.9rem;">Smart IC Chip</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6 mb-3">
                    <div class="pd-feat-card text-center p-4 h-100" style="background: #161b22; border: 1px solid rgba(0,210,255,0.15); border-radius: 16px; transition: all 0.3s ease;">
                        <i class="fa-solid fa-fire-burner mb-3" style="font-size: 2rem; color: #00d2ff;"></i>
                        <p class="font-weight-bold mb-0" style="color: #ffffff; font-size: 0.9rem;">Overheat Guard</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6 mb-3">
                    <div class="pd-feat-card text-center p-4 h-100" style="background: #161b22; border: 1px solid rgba(0,210,255,0.15); border-radius: 16px; transition: all 0.3s ease;">
                        <i class="fa-solid fa-mobile-screen mb-3" style="font-size: 2rem; color: #00d2ff;"></i>
                        <p class="font-weight-bold mb-0" style="color: #ffffff; font-size: 0.9rem;">Universal Fit</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6 mb-3">
                    <div class="pd-feat-card text-center p-4 h-100" style="background: #161b22; border: 1px solid rgba(0,210,255,0.15); border-radius: 16px; transition: all 0.3s ease;">
                        <i class="fa-solid fa-award mb-3" style="font-size: 2rem; color: #00d2ff;"></i>
                        <p class="font-weight-bold mb-0" style="color: #ffffff; font-size: 0.9rem;">Certified Quality</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related Products --}}
    @if(isset($data) && count($data) > 0)
    <section class="stack_well py-5" style="background: linear-gradient(180deg, #0a0f1d 0%, #0d1013 100%); position: relative; overflow: hidden;">
        {{-- Tech background image overlay --}}
        <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(10,15,29,0.9) 0%, rgba(13,16,19,0.95) 100%), url('{{ asset('images/tech-related-bg.png') }}') center/cover no-repeat; z-index: 0;"></div>
        <div class="container" style="position: relative; z-index: 1;">
            <div class="text-center mb-5">
                <span class="text-uppercase font-weight-bold px-3 py-1 mb-3 d-inline-block rounded-pill" style="background: rgba(0, 210, 255, 0.1); color: #00d2ff; border: 1px solid rgba(0, 210, 255, 0.3); font-size: 0.8rem; letter-spacing: 2px;">
                    MORE TO EXPLORE
                </span>
                <h3 class="font-weight-bold text-uppercase mb-2" style="font-family: 'Bebas Neue', sans-serif; color: #ffffff; font-size: 2.2rem; letter-spacing: 2px;">RELATED MOBILE ACCESSORIES</h3>
                <div style="width: 60px; height: 3px; background: linear-gradient(90deg, #0099cc, #00d2ff); margin: 0 auto; border-radius: 2px;"></div>
            </div>
            <div class="row">
                @foreach ($data as $key => $item)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="pd-related-card h-100 p-4 d-flex flex-column" style="background: #161b22; border: 1px solid rgba(0,210,255,0.15); border-radius: 18px; transition: all 0.3s ease;">
                            <div class="text-center mb-3 p-3" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); border-radius: 12px; min-height: 160px; display: flex; align-items: center; justify-content: center;">
                                <a href="{{ route('productdetail', ['id' => $item->id]) }}">
                                    <img src="{{ asset($item->image) }}" class="img-fluid" alt="{{ $item->product_title }}"
                                        style="max-height: 140px; object-fit: contain; filter: drop-shadow(0 6px 12px rgba(0,0,0,0.6)); position: static !important; transition: transform 0.3s ease;">
                                </a>
                            </div>
                            <div class="text-center mt-auto">
                                <h6 class="font-weight-bold mb-2" style="color: #ffffff; font-size: 1rem; font-family: 'Manrope', sans-serif;">
                                    <a href="{{ route('productdetail', ['id' => $item->id]) }}" style="color: #ffffff; text-decoration: none; transition: color 0.2s;">
                                        {{ $item->product_title }}
                                    </a>
                                </h6>
                                <p class="font-weight-bold mb-3" style="color: #00d2ff; font-family: 'Bebas Neue', sans-serif; font-size: 1.5rem; letter-spacing: 1px;">${{ $item->price }}</p>
                                <a href="{{ route('productdetail', ['id' => $item->id]) }}" class="d-block text-center font-weight-bold text-uppercase text-decoration-none" style="background: rgba(0,210,255,0.1); border: 1px solid rgba(0,210,255,0.3); color: #00d2ff; border-radius: 20px; padding: 8px 20px; font-size: 0.85rem; letter-spacing: 1px; transition: all 0.2s ease;">
                                    VIEW DETAILS
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

@endsection

@section('css')
    <style>
        .pd-add-btn:hover {
            background: linear-gradient(135deg, #00b4d8, #00f0ff) !important;
            box-shadow: 0 8px 25px rgba(0,210,255,0.45) !important;
            transform: translateY(-2px);
        }
        .pd-feat-card:hover {
            border-color: rgba(0,210,255,0.45) !important;
            box-shadow: 0 8px 20px rgba(0,210,255,0.15) !important;
            transform: translateY(-4px);
        }
        .pd-related-card:hover {
            border-color: rgba(0,210,255,0.5) !important;
            box-shadow: 0 12px 25px rgba(0,210,255,0.2) !important;
            transform: translateY(-5px);
        }
        .pd-related-card:hover img {
            transform: scale(1.05);
        }
        .pd-related-card a:hover {
            color: #00d2ff !important;
        }
        .pd-related-card a[style*="background"]:hover {
            background: rgba(0,210,255,0.2) !important;
            color: #ffffff !important;
        }
        .pd-thumb:hover {
            border-color: #00d2ff !important;
            box-shadow: 0 0 12px rgba(0,210,255,0.3);
        }
        .pd-qty-wrap button:hover {
            background: rgba(0,210,255,0.25) !important;
        }
    </style>
@endsection

@section('js')
    <script>
        function changeQty(delta) {
            var input = document.getElementById('qty');
            var val = parseInt(input.value) || 1;
            val = Math.max(1, Math.min(10, val + delta));
            input.value = val;
        }
        function switchImg(src) {
            var mainImg = document.querySelector('.pd-image-card img');
            if (mainImg) mainImg.src = src;
        }
    </script>
@endsection
