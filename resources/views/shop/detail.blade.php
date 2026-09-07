@extends('layouts.main')
@section('content')

    {{-- Inner Banner --}}
    <section class="inner-banner" style="background: linear-gradient(135deg, #0a0f1e 0%, #0d1b2a 100%); border-bottom: 1px solid #00d2ff22;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content text-center py-3">
                        <h1 style="color: #fff; font-size: 50px;">{{ $product_detail->product_title }}</h1>
                        <h5 style="color: #99b0c8; font-size: 13px; justify-content: center;">
                            <a href="{{ route('home') }}" style="color: #00d2ff; text-decoration: none;">HOME</a>
                            <span class="mx-2">/</span>
                            <a href="{{ route('shop') }}" style="color: #00d2ff; text-decoration: none;">SHOP</a>
                            <span class="mx-2">/</span>
                            {{ $product_detail->product_title }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Product Details Section --}}
    <section class="product-details py-5" style="background: #0d1117;">
        <div class="container">
            <div class="row">
                {{-- Product Images --}}
                <div class="col-lg-7 mb-4">
                    <div class="gg-product-image-wrapper">
                        <div class="gg-product-main-img">
                            <img src="{{ asset($product_detail->image) }}" class="img-fluid"
                                alt="{{ $product_detail->product_title }}"
                                style="width: 100%; max-height: 480px; object-fit: contain; border-radius: 16px; background: #111920; padding: 20px;">
                        </div>
                        @if(!empty($product_detail->image_2))
                        <div class="gg-product-thumb mt-3 d-flex gap-3">
                            <div class="gg-thumb-item {{ empty($product_detail->image_2) ? '' : '' }}" onclick="setMainImg(this, '{{ asset($product_detail->image) }}')">
                                <img src="{{ asset($product_detail->image) }}" alt="View 1"
                                    style="width: 80px; height: 80px; object-fit: contain; border-radius: 10px; border: 2px solid #00d2ff; background: #111920; padding: 4px; cursor: pointer;">
                            </div>
                            <div class="gg-thumb-item" onclick="setMainImg(this, '{{ asset($product_detail->image_2) }}')">
                                <img src="{{ asset($product_detail->image_2) }}" alt="View 2"
                                    style="width: 80px; height: 80px; object-fit: contain; border-radius: 10px; border: 2px solid #00d2ff33; background: #111920; padding: 4px; cursor: pointer;">
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

                        <div class="gg-product-info">
                            <span class="gg-category-badge">{{ $product_detail->categories->category_title ?? 'Mobile Accessories' }}</span>
                            <h1 class="gg-product-title">{{ $product_detail->product_title }}</h1>

                            <div class="gg-price-box">
                                @if(!empty($product_detail->total_price))
                                    <span class="gg-old-price">${{ $product_detail->total_price }}</span>
                                @endif
                                <span class="gg-current-price">${{ $product_detail->price }}</span>
                                @if(!empty($product_detail->discount_price))
                                    <span class="gg-discount-badge">-{{ $product_detail->discount_price }}% OFF</span>
                                @endif
                            </div>

                            <div class="gg-divider"></div>

                            {{-- Attributes / Variants --}}
                            @foreach ($att_model as $att_models)
                                <div class="gg-variation mb-3">
                                    <h6 class="gg-variation-title">{{ $att_models->attribute->name }}</h6>
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

                            <div class="gg-divider"></div>

                            {{-- Quantity --}}
                            <div class="gg-qty-section mb-4">
                                <label class="gg-qty-label">Quantity</label>
                                <div class="gg-qty-control">
                                    <button type="button" class="gg-qty-btn minus">−</button>
                                    <input type="number" id="addcount" class="gg-qty-input" name="qty" value="1" min="1">
                                    <button type="button" class="gg-qty-btn plus">+</button>
                                </div>
                            </div>

                            {{-- Add to Cart --}}
                            <button id="addCart" type="button" class="gg-add-cart-btn">
                                <i class="fa-solid fa-cart-shopping mr-2"></i>
                                ADD TO CART
                            </button>

                            {{-- Trust Badges --}}
                            <div class="gg-trust-badges mt-4">
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
    <section class="gg-description py-5" style="background: #0a0f1e;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="gg-section-title">Product Description</h2>
                    <div class="gg-desc-content">
                        <?= html_entity_decode($product_detail->description) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related Products --}}
    @if(count($shop) > 0)
    <section class="gg-related py-5" style="background: #0d1117;">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="gg-section-title">Related Products</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($shop as $shops)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="gg-related-card">
                            <a href="{{ route('shopDetail', $shops->id) }}">
                                <div class="gg-related-img">
                                    <img src="{{ asset($shops->image) }}" alt="{{ $shops->product_title }}"
                                        style="max-height: 160px; object-fit: contain; width: 100%;">
                                </div>
                                <div class="gg-related-info">
                                    <h6>{{ $shops->product_title }}</h6>
                                    <span>${{ $shops->price }}</span>
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
            display: inline-block;
            padding: 4px 14px;
            background: rgba(0,210,255,0.12);
            border: 1px solid #00d2ff44;
            border-radius: 20px;
            color: #00d2ff;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 16px;
        }
        .gg-product-title {
            font-size: 32px;
            color: #fff;
            margin-bottom: 20px;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 1px;
            line-height: 1.2;
        }
        .gg-price-box {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }
        .gg-old-price {
            font-size: 20px;
            color: #556677;
            text-decoration: line-through;
        }
        .gg-current-price {
            font-size: 36px;
            font-weight: 800;
            color: #00d2ff;
        }
        .gg-discount-badge {
            background: linear-gradient(135deg, #0099cc, #00d2ff);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
        }
        .gg-divider {
            height: 1px;
            background: linear-gradient(90deg, #00d2ff22, transparent);
            margin: 20px 0;
        }
        .gg-variation-title {
            color: #99b0c8;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }
        .gg-attr-chip {
            display: inline-block;
            padding: 6px 14px;
            border: 1px solid #00d2ff33;
            border-radius: 6px;
            color: #99c5d5;
            font-size: 13px;
            background: rgba(0,210,255,0.05);
            margin-right: 8px;
            margin-bottom: 8px;
        }
        .gg-qty-label {
            color: #99b0c8;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            display: block;
            margin-bottom: 10px;
        }
        .gg-qty-control {
            display: flex;
            align-items: center;
            gap: 0;
            width: fit-content;
            border: 1px solid #00d2ff33;
            border-radius: 10px;
            overflow: hidden;
        }
        .gg-qty-btn {
            width: 40px; height: 40px;
            background: rgba(0,210,255,0.08);
            border: none;
            color: #00d2ff;
            font-size: 20px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .gg-qty-btn:hover { background: rgba(0,210,255,0.2); }
        .gg-qty-input {
            width: 60px; height: 40px;
            text-align: center;
            background: transparent;
            border: none;
            border-left: 1px solid #00d2ff22;
            border-right: 1px solid #00d2ff22;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            outline: none;
        }
        .gg-add-cart-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #0099cc, #00d2ff);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .gg-add-cart-btn:hover {
            background: linear-gradient(135deg, #007aa3, #0099cc);
            box-shadow: 0 8px 24px rgba(0,210,255,0.3);
            transform: translateY(-2px);
        }
        .gg-trust-badges {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }
        .gg-badge-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #99b0c8;
            font-size: 12px;
        }
        .gg-badge-item i {
            color: #00d2ff;
            font-size: 16px;
        }
        .gg-section-title {
            color: #fff;
            font-size: 40px;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 2px;
            margin-bottom: 30px;
            padding-bottom: 12px;
            border-bottom: 2px solid #00d2ff33;
        }
        .gg-desc-content {
            color: #99b0c8;
            font-size: 16px;
            line-height: 28px;
        }
        .gg-desc-content * { color: #99b0c8 !important; }
        .gg-related-card {
            background: #0f1a2a;
            border: 1px solid #00d2ff22;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s;
        }
        .gg-related-card:hover {
            border-color: #00d2ff;
            box-shadow: 0 8px 24px rgba(0,210,255,0.15);
            transform: translateY(-4px);
        }
        .gg-related-img {
            padding: 16px;
            background: #111920;
            text-align: center;
        }
        .gg-related-info {
            padding: 14px 16px;
        }
        .gg-related-info h6 {
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 6px;
        }
        .gg-related-info span {
            color: #00d2ff;
            font-weight: 700;
            font-size: 16px;
        }
        .gg-related-card a { text-decoration: none !important; }
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
                img.style.border = '2px solid #00d2ff33';
            });
            el.querySelector('img').style.border = '2px solid #00d2ff';
        }
    </script>
@endsection
