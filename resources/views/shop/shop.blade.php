@extends('layouts.main')
@section('content')
    <section class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1>Shop</h1>
                        <h5>HOME<span>/</span><a href="#">SHOP</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="featured-product shop_pg">
        <div class="container">
            <div class="row">
                @foreach ($shops as $key => $value)
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
                                        <img src="images/product-3-detail.webp" class="img-fluid op-zero" alt="">
                                    </a>
                                    @if (Auth::user()->role == 3)
                                        <a href="javascript:void(0)" class="btn red-btn"
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
                {{-- <div class="col-lg-3">
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
                                  <h6><a href="macroboost-ultra-test.php">MacroBoost – Ultra Test <span class="d-block">Male Enhancement
                                            </span></a></h6>
                                  <h6> <span>$69.99</span> $54.99</h6>
                             </div>
                        </div>
                   </div>
              </div>

              <div class="col-lg-3">
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

              <div class="col-lg-3">
                   <div class="main-featured">
                        <div class="featured-info">
                             <div class="discription-retio">
                                  <a href="#" class="search-info"> <span>Quick view</span>
                                       <i class="fa-solid fa-magnifying-glass"></i>
                                  </a>
                                  <a href="macrorecharge.php">
                                       <div class="percent-ratio">
                                            <span>-30%</span>
                                       </div>
                                  </a>
                             </div>

                             <div class="product-img"> <a href="macrorecharge.php">
                                       <img src="images/product-3.webp" class="img-fluid op-one" alt="">
                                       <img src="images/product-3-detail.webp" class="img-fluid op-zero" alt="">
                                  </a>
                                  <a href="macrorecharge.php" class="btn red-btn">
                                       <span> Add to cart</span>
                                       <span><i class="fa-solid fa-cart-shopping"></i></span>
                                  </a>
                             </div>
                             <div class="product-name">
                                  <h6><a href="macrorecharge.php">MacroRecharge</a></h6>
                                  <h6> <span>$49.99</span> $34.99</h6>
                             </div>
                        </div>
                   </div>
              </div>
              <div class="col-lg-3">
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
              </div>


              <div class="col-lg-3">
                   <div class="main-featured">
                        <div class="featured-info">
                             <div class="discription-retio">
                                  <a href="#" class="search-info"> <span>Quick view</span>
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
              </div> --}}
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
