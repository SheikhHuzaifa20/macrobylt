@extends('layouts.main')
@section('content')

    {{-- Inner Banner --}}
    <section class="inner-banner py-5" style="background: linear-gradient(135deg, #161b22 0%, #0d1013 100%); border-bottom: 1px solid rgba(0, 210, 255, 0.15);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content text-center py-3">
                        <span class="text-uppercase font-weight-bold tracking-wider px-3 py-1 mb-3 d-inline-block rounded-pill" style="background: rgba(0, 210, 255, 0.1); color: #00d2ff; border: 1px solid rgba(0, 210, 255, 0.3); font-size: 0.85rem; letter-spacing: 2px;">
                            PRODUCT DETAILS
                        </span>
                        <h1 class="display-4 font-weight-bold text-uppercase mb-3" style="font-family: 'Bebas Neue', sans-serif; letter-spacing: 2px; color: #ffffff;">{{ $product_detail->product_title }}</h1>
                        <h6 class="text-uppercase" style="font-size: 0.9rem; letter-spacing: 1.5px;">
                            <a href="{{ route('home') }}" class="text-decoration-none" style="color: #00d2ff; font-weight: 600;">HOME</a>
                            <span class="mx-2" style="color: rgba(255,255,255,0.3);">/</span>
                            <a href="{{ route('shop') }}" class="text-decoration-none" style="color: #00d2ff; font-weight: 600;">SHOP</a>
                            <span class="mx-2" style="color: rgba(255,255,255,0.3);">/</span>
                            <span style="color: #cbd5e1;">{{ $product_detail->product_title }}</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Product Details Section --}}
    <section class="product-details py-5" style="background: linear-gradient(180deg, #0d1013 0%, #0a0f1d 100%); min-height: 70vh;">
        <div class="container">
            <div class="row">
                {{-- Product Images --}}
                <div class="col-lg-7 mb-4">
                    <div class="gg-product-image-wrapper p-4 rounded-xl" style="background: #161b22; border: 1px solid rgba(0, 210, 255, 0.15); border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                        <div class="gg-product-main-img text-center p-4 rounded-lg" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 14px; min-height: 420px; display: flex; align-items: center; justify-content: center; position: relative;">
                            <img src="{{ asset($product_detail->image) }}" class="img-fluid main-detail-img"
                                alt="{{ $product_detail->product_title }}"
                                style="max-height: 380px; max-width: 100%; object-fit: contain; filter: drop-shadow(0 15px 25px rgba(0,0,0,0.6)); transition: all 0.3s ease; position: static !important; margin: 0 auto;">
                        </div>
                        @if(!empty($product_detail->image_2))
                        <div class="gg-product-thumb mt-4 d-flex gap-3 justify-content-center">
                            <div class="gg-thumb-item" onclick="setMainImg(this, '{{ asset($product_detail->image) }}')">
                                <img src="{{ asset($product_detail->image) }}" alt="View 1"
                                    style="width: 80px; height: 80px; object-fit: contain; border-radius: 12px; border: 2px solid #00d2ff; background: rgba(255, 255, 255, 0.03); padding: 6px; cursor: pointer; transition: all 0.2s ease; position: static !important;">
                            </div>
                            <div class="gg-thumb-item" onclick="setMainImg(this, '{{ asset($product_detail->image_2) }}')">
                                <img src="{{ asset($product_detail->image_2) }}" alt="View 2"
                                    style="width: 80px; height: 80px; object-fit: contain; border-radius: 12px; border: 2px solid rgba(0, 210, 255, 0.2); background: rgba(255, 255, 255, 0.03); padding: 6px; cursor: pointer; transition: all 0.2s ease; position: static !important;">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Product Info --}}
                <div class="col-lg-5">
                    <form method="POST" action="{{ route('save_cart') }}" id="add-cart">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product_detail->id }}">

                        <div class="gg-product-info p-4 rounded-xl" style="background: #161b22; border: 1px solid rgba(0, 210, 255, 0.15); border-radius: 20px;">
                            <span class="gg-category-badge mb-3 d-inline-block">{{ $product_detail->categories->category_title ?? 'Mobile Accessories' }}</span>
                            <h1 class="gg-product-title mb-3">{{ $product_detail->product_title }}</h1>

                            <div class="gg-price-box mb-4 d-flex align-items-center gap-3">
                                @if(!empty($product_detail->total_price))
                                    <span class="gg-old-price">${{ $product_detail->total_price }}</span>
                                @endif
                                <span class="gg-current-price">${{ $product_detail->price }}</span>
                                @if(!empty($product_detail->discount_price))
                                    <span class="gg-discount-badge">-{{ $product_detail->discount_price }}% OFF</span>
                                @endif
                            </div>

                            <div class="gg-divider mb-4"></div>

                            {{-- Attributes / Variants --}}
                            @foreach ($att_model as $att_models)
                                <div class="gg-variation mb-4">
                                    <h6 class="gg-variation-title mb-2">{{ $att_models->attribute->name }}</h6>
                                    @php
                                        $pro_att = \App\ProductAttribute::where(['attribute_id' => $att_models->attribute_id, 'product_id' => $product_detail->id])->get();
                                    @endphp
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach ($pro_att as $pro_atts)
                                            <span class="gg-attr-chip">{{ $pro_atts->attributesValues->value }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                            {{-- Quantity --}}
                            <div class="gg-qty-section mb-4">
                                <label class="gg-qty-label mb-2">QUANTITY</label>
                                <div class="gg-qty-control">
                                    <button type="button" class="gg-qty-btn minus">−</button>
                                    <input type="number" id="addcount" class="gg-qty-input" name="qty" value="1" min="1">
                                    <button type="button" class="gg-qty-btn plus">+</button>
                                </div>
                            </div>

                            {{-- Add to Cart --}}
                            <button id="addCart" type="button" class="gg-add-cart-btn mb-4 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-cart-shopping mr-2"></i>
                                <span>ADD TO CART</span>
                            </button>

                            {{-- Trust Badges --}}
                            <div class="gg-trust-badges pt-3 border-top border-secondary-subtle d-flex flex-wrap gap-3">
                                <div class="gg-badge-item">
                                    <i class="fa-solid fa-shield-halved"></i>
                                    <span>1-Year Warranty</span>
                                </div>
                                <div class="gg-badge-item">
                                    <i class="fa-solid fa-truck"></i>
                                    <span>Free Shipping $50+</span>
                                </div>
                                <div class="gg-badge-item">
                                    <i class="fa-solid fa-rotate-left"></i>
                                    <span>30-Day Returns</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- Description Section --}}
    <section class="gg-description py-5" style="background: #0d1013; border-top: 1px solid rgba(0, 210, 255, 0.1);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="p-4 p-md-5 rounded-xl" style="background: #161b22; border: 1px solid rgba(0, 210, 255, 0.15); border-radius: 20px;">
                        <h2 class="gg-section-title text-uppercase" style="font-family: 'Bebas Neue', sans-serif; letter-spacing: 2px;">PRODUCT DESCRIPTION</h2>
                        <div class="gg-desc-content mt-4" style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.8;">
                            <?= html_entity_decode($product_detail->description) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related Products --}}
    @if(count($shop) > 0)
    <section class="gg-related py-5" style="background: linear-gradient(180deg, #0d1013 0%, #0a0f1d 100%);">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="gg-section-title text-uppercase" style="font-family: 'Bebas Neue', sans-serif; letter-spacing: 2px;">RELATED PRODUCTS</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($shop as $shops)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="gg-related-card h-100 p-3" style="background: #161b22; border: 1px solid rgba(0, 210, 255, 0.15); border-radius: 18px; transition: all 0.3s ease;">
                            <a href="{{ route('productdetail', ['id' => $shops->id]) }}" class="text-decoration-none d-flex flex-column h-100">
                                <div class="gg-related-img p-3 rounded-lg text-center mb-3" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 12px; height: 160px; display: flex; align-items: center; justify-content: center;">
                                    <img src="{{ asset($shops->image) }}" alt="{{ $shops->product_title }}"
                                        style="max-height: 140px; max-width: 100%; object-fit: contain; width: auto; filter: drop-shadow(0 5px 10px rgba(0,0,0,0.5)); position: static !important;">
                                </div>
                                <div class="gg-related-info mt-auto text-center">
                                    <h6 style="color: #ffffff; font-size: 1rem; font-weight: 600; font-family: 'Manrope', sans-serif;" class="mb-2">{{ $shops->product_title }}</h6>
                                    <span style="color: #00d2ff; font-weight: 700; font-size: 1.25rem; font-family: 'Bebas Neue', sans-serif; letter-spacing: 1px;">${{ $shops->price }}</span>
                                </div>
                            </a>
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
        .gg-product-info { color: #fff; }
        .gg-category-badge {
            padding: 5px 16px;
            background: rgba(0, 210, 255, 0.1);
            border: 1px solid rgba(0, 210, 255, 0.3);
            border-radius: 20px;
            color: #00d2ff;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        .gg-product-title {
            font-size: 2.3rem;
            color: #ffffff;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 1.5px;
            line-height: 1.2;
        }
        .gg-price-box {
            display: flex;
            align-items: center;
        }
        .gg-old-price {
            font-size: 1.2rem;
            color: #64748b;
            text-decoration: line-through;
        }
        .gg-current-price {
            font-size: 2.4rem;
            font-weight: 700;
            color: #00d2ff;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 1px;
        }
        .gg-discount-badge {
            background: linear-gradient(135deg, #ff0055, #ff5500);
            color: #ffffff;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(255, 0, 85, 0.3);
        }
        .gg-divider {
            height: 1px;
            background: linear-gradient(90deg, rgba(0, 210, 255, 0.25), transparent);
        }
        .gg-variation-title {
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .gg-attr-chip {
            display: inline-block;
            padding: 6px 14px;
            border: 1px solid rgba(0, 210, 255, 0.3);
            border-radius: 8px;
            color: #00d2ff;
            font-size: 0.85rem;
            background: rgba(0, 210, 255, 0.08);
            font-weight: 500;
        }
        .gg-qty-label {
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1px;
            display: block;
        }
        .gg-qty-control {
            display: flex;
            align-items: center;
            width: fit-content;
            border: 1px solid rgba(0, 210, 255, 0.3);
            border-radius: 12px;
            overflow: hidden;
            background: #0d1013;
        }
        .gg-qty-btn {
            width: 44px;
            height: 44px;
            background: rgba(0, 210, 255, 0.1);
            border: none;
            color: #00d2ff;
            font-size: 1.3rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .gg-qty-btn:hover { background: rgba(0, 210, 255, 0.25); }
        .gg-qty-input {
            width: 60px;
            height: 44px;
            text-align: center;
            background: transparent;
            border: none;
            border-left: 1px solid rgba(0, 210, 255, 0.15);
            border-right: 1px solid rgba(0, 210, 255, 0.15);
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 700;
            outline: none;
        }
        .gg-add-cart-btn {
            width: 100%;
            padding: 14px 20px;
            background: linear-gradient(135deg, #0099cc, #00d2ff);
            color: #ffffff;
            border: none;
            border-radius: 30px;
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(0, 210, 255, 0.3);
            transition: all 0.3s ease;
        }
        .gg-add-cart-btn:hover {
            background: linear-gradient(135deg, #00b4d8, #00f0ff);
            box-shadow: 0 8px 25px rgba(0, 210, 255, 0.45);
            transform: translateY(-2px);
            color: #ffffff;
        }
        .gg-badge-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #94a3b8;
            font-size: 0.85rem;
            background: rgba(255, 255, 255, 0.03);
            padding: 8px 14px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .gg-badge-item i {
            color: #00d2ff;
            font-size: 1rem;
        }
        .gg-section-title {
            color: #ffffff;
            font-size: 2rem;
            letter-spacing: 1.5px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(0, 210, 255, 0.2);
        }
        .gg-desc-content * { color: #cbd5e1 !important; }
        .gg-related-card:hover {
            border-color: rgba(0, 210, 255, 0.5) !important;
            box-shadow: 0 12px 25px rgba(0, 210, 255, 0.2) !important;
            transform: translateY(-5px);
        }
        .gap-2 { gap: 8px; }
        .gap-3 { gap: 12px; }
    </style>
@endsection

@section('js')
    <script type="text/javascript">
        // Quantity controls
        $(document).ready(function() {
            $(document).on('click', '.plus', function() {
                var val = parseInt($('.gg-qty-input').val()) || 1;
                $('.gg-qty-input').val(val + 1);
            });
            $(document).on('click', '.minus', function() {
                var val = parseInt($('.gg-qty-input').val()) || 1;
                if (val > 1) $('.gg-qty-input').val(val - 1);
            });
            $(document).on('click', '#addCart', function() {
                $('#add-cart').submit();
            });
        });

        function setMainImg(el, src) {
            document.querySelector('.gg-product-main-img img').src = src;
            document.querySelectorAll('.gg-thumb-item img').forEach(function(img) {
                img.style.border = '2px solid rgba(0, 210, 255, 0.2)';
            });
            el.querySelector('img').style.border = '2px solid #00d2ff';
        }
    </script>
@endsection
