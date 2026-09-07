@extends('layouts.main')
@section('content')
    <section class="product-inner py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center">
                <!-- Product Image Gallery -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="main-products bg-white p-4 shadow-sm text-center position-relative" style="border-radius: 20px;">
                        @if(!empty($product->discount_price))
                            <div class="percent-ratio bg-danger text-white font-weight-bold px-3 py-1 position-absolute" style="top: 20px; left: 20px; border-radius: 10px; z-index: 10;">
                                <span>-{{ $product->discount_price }}% OFF</span>
                            </div>
                        @endif
                        <div class="product-main-img py-3" style="min-height: 350px; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset($product->image) }}" class="img-fluid rounded" alt="{{ $product->product_title }}" style="max-height: 350px; object-fit: contain;">
                        </div>
                    </div>
                </div>

                <!-- Product Details & Add to Cart -->
                <div class="col-lg-6">
                    <div class="detail-one bg-white p-4 shadow-sm" style="border-radius: 20px;">
                        <span class="badge badge-primary px-3 py-2 mb-2" style="background-color: #0099cc;">OFFICIAL GADGETGROVE ACCESSORY</span>
                        <h2 class="font-weight-bold mb-3" style="color: #111;">{{ $product->product_title }}</h2>
                        
                        <div class="price-box mb-4">
                            @if(!empty($product->total_price))
                                <span class="text-muted text-decoration-line-through h4 mr-2" style="text-decoration: line-through;">${{ $product->total_price }}</span>
                            @endif
                            <span class="text-danger font-weight-bold display-4">${{ $product->price }}</span>
                        </div>

                        <div class="description-box mb-4 text-muted">
                            <p class="lead" style="font-size: 1.05rem; line-height: 1.6;">
                                {!! $product->description !!}
                            </p>
                        </div>

                        <div class="features-list mb-4 p-3 rounded" style="background-color: #f1f5f9;">
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <i class="fa-solid fa-check-circle text-success mr-2"></i> In Stock & Ready to Ship
                                </div>
                                <div class="col-6 mb-2">
                                    <i class="fa-solid fa-truck-fast text-primary mr-2"></i> Free Express Delivery
                                </div>
                                <div class="col-6 mb-2">
                                    <i class="fa-solid fa-shield-halved text-info mr-2"></i> 1-Year GadgetGrove Warranty
                                </div>
                                <div class="col-6 mb-2">
                                    <i class="fa-solid fa-rotate-left text-warning mr-2"></i> 30-Day Money Back Guarantee
                                </div>
                            </div>
                        </div>

                        <form method="post" action="{{ route('save_cart') }}" class="add-to-cart-form">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="name" id="name" value="{{ $product->product_title }}">
                            <input type="hidden" name="price" id="price" value="{{ $product->price }}">

                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="form-group mb-0 mr-3" style="width: 120px;">
                                    <label class="font-weight-bold small text-muted">QUANTITY:</label>
                                    <input type="number" name="qty" id="qty" value="1" min="1" max="10" class="form-control text-center font-weight-bold" style="border-radius: 10px; height: 48px;">
                                </div>
                                <div class="flex-grow-1">
                                    <label class="d-block opacity-0 small">&nbsp;</label>
                                    <button type="submit" class="btn red-btn btn-block font-weight-bold shadow py-3" style="border-radius: 30px; font-size: 1.1rem;">
                                        ADD TO CART <i class="fa-solid fa-cart-shopping ml-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Highlights -->
    <section class="premium-formula py-5 bg-white">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col-lg-12">
                    <h3 class="font-weight-bold text-uppercase">ENGINEERED FOR EXCELLENCE</h3>
                    <p class="text-muted">Built with premium materials and rigorous testing standards.</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-2 col-md-4 col-6 mb-3 m-auto">
                    <div class="p-3 border rounded shadow-sm h-100">
                        <i class="fa-solid fa-microchip text-primary mb-2" style="font-size: 2rem;"></i>
                        <p class="font-weight-bold small mb-0">Smart IC Chip</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3 m-auto">
                    <div class="p-3 border rounded shadow-sm h-100">
                        <i class="fa-solid fa-fire-burner text-danger mb-2" style="font-size: 2rem;"></i>
                        <p class="font-weight-bold small mb-0">Overheat Guard</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3 m-auto">
                    <div class="p-3 border rounded shadow-sm h-100">
                        <i class="fa-solid fa-mobile-screen text-success mb-2" style="font-size: 2rem;"></i>
                        <p class="font-weight-bold small mb-0">Universal Fit</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mb-3 m-auto">
                    <div class="p-3 border rounded shadow-sm h-100">
                        <i class="fa-solid fa-award text-warning mb-2" style="font-size: 2rem;"></i>
                        <p class="font-weight-bold small mb-0">Certified Quality</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    @if(isset($data) && count($data) > 0)
    <section class="stack_well py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col-lg-12">
                    <h3 class="font-weight-bold text-uppercase">RELATED MOBILE ACCESSORIES</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($data as $key => $item)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="main-featured card border-0 shadow-sm h-100 p-3 bg-white" style="border-radius: 16px;">
                            <div class="featured-info text-center">
                                <a href="{{ route('productdetail', ['id' => $item->id]) }}">
                                    <img src="{{ asset($item->image) }}" class="img-fluid mb-3" alt="{{ $item->product_title }}" style="max-height: 150px; object-fit: contain;">
                                </a>
                                <h6 class="font-weight-bold mb-2">
                                    <a href="{{ route('productdetail', ['id' => $item->id]) }}" class="text-dark text-decoration-none">
                                        {{ $item->product_title }}
                                    </a>
                                </h6>
                                <p class="text-danger font-weight-bold mb-3">${{ $item->price }}</p>
                                <a href="{{ route('productdetail', ['id' => $item->id]) }}" class="btn btn-outline-primary btn-sm btn-block font-weight-bold" style="border-radius: 20px;">
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
        .red-btn {
            background-color: #e63946;
            color: #ffffff;
            border: none;
            transition: background 0.3s ease;
        }
        .red-btn:hover {
            background-color: #d62828;
            color: #ffffff;
        }
    </style>
@endsection
