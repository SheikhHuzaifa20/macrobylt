<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="statement-para">

                    {!! App\Section::where('id', 7)->value('value') !!}

                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-logo">
                    <img src="{{ url('assets/images/logo.png') }}" class="img-fluid" alt="">
                    {!! App\Section::where('id', 8)->value('value') !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-logo">
                    <h4>QUICK LINKS</h4>
                    <ul>
                        <li>
                            <a href="shop.php">Shop</a>
                        </li>
                        <li>
                            <a href="stacks.php">Stacks</a>
                        </li>
                        <li>
                            <a href="contact-us.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-logo">
                    <h4>IMPORTANT LINKS</h4>
                    <ul>
                        <li>
                            <a href="refund-policy.php">Refund Policy</a>
                        </li>
                        <li>
                            <a href="terms-and-conditions.php">Terms And Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-logo">
                    <h4>CONTACT INFO</h4>
                    <ul class="add-info">
                        <li>
                            <span><i class="fa-regular fa-envelope"></i></span>
                            <a href="mailto:macroBylt@gmail.com">{{ App\Http\Traits\HelperTrait::returnFlag(1) }}</a>
                        </li>
                        <li>
                            <span><i class="fa-solid fa-mobile-screen-button"></i></span>
                            <a href="tel:+714-282-9671">{{ App\Http\Traits\HelperTrait::returnFlag(2) }}
                            </a>
                        </li>
                        <li>
                            <span><i class="fa-solid fa-location-dot"></i></span>
                            <a href="#">{{ App\Http\Traits\HelperTrait::returnFlag(3) }}</a>
                        </li>
                    </ul>
                    <ul class="social-icon">
                        <li>
                            <a href="{{ App\Http\Traits\HelperTrait::returnFlag(682) }}"><i
                                    class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="{{ App\Http\Traits\HelperTrait::returnFlag(1962) }}"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="{{ App\Http\Traits\HelperTrait::returnFlag(4) }}"><i
                                    class="fa-brands fa-tiktok"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="copyright">
                    <p>{{ App\Http\Traits\HelperTrait::returnFlag(499) }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>



<!-- Modal -->
<div class="modal fade p-zero" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="product-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="main-products">
                                    <div class="percent-ratio">
                                        <span>-30%</span>
                                    </div>
                                    <div class="product-slides owl-carousel owl-theme">
                                        <div class="item">
                                            <div class="img-carousel">
                                                <a href="#select_one">
                                                    <img src="{{url("assets/images/product-1.webp")}}" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="img-carousel">
                                                <a href="#">
                                                    <img src="{{url("assets/images/product-1-detail.webp")}}" class="img-fluid"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="img-carousel">
                                                <a href="#select_second">
                                                    <img src="{{url("assets/images/product-4.png")}}" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="detail-one">
                                    <h1>MacroSurge Pre</h1>
                                    <h5><span>$49.99 </span>$34.99</h5>
                                    <h6>Get the pump, the energy, the stamina. </h6>
                                    <p>SMASH your workout routine with our high-performance pre-workout
                                        formula, designed to ignite
                                        your training intensity and motivation. Made using the latest
                                        scientific research and
                                        formulated with optimal ratios of branch chain amino acids,
                                        nootropics, and pump enhancers
                                        to produce world class results. Our pre-workout is the standard-bearer
                                        for athletes
                                        seeking to break through plateaus and achieve peak performance.</p>
                                    <p>Was $49.99, now $34.99 for 1 bottle <span class="d-block">2 bottles –
                                            10% off,
                                            $62.98</span>3+ bottles – 15% off, $89.22 (our best deal!)</p>
                                    <div class="flaver-detail">
                                        <h5>Flavor:</h5>
                                        <div class="falver-btn">
                                            <button type="button" id="select_one" class="btn flaver-bnt">Honeydew
                                                Watermelon</button>
                                            <button type="button" id="select_second" class="btn flaver-bnt">Fruit
                                                Punch</button>
                                        </div>
                                    </div>
                                    <a href="#" class="btn red-btn">BUY NOW</a>
                                    <div class="countre-div">
                                        <div class="plus-minus counter">
                                            <button class="counter-span decrement"><i
                                                    class="fa-solid fa-minus"></i></button>
                                            <button class="counter-span count">1</button>
                                            <button class="counter-span increment"><i
                                                    class="fa-solid fa-plus"></i></button>
                                        </div>
                                        <div class="counter-btn">
                                            <button type="button" class="btn red-btn">ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- offcanvas side modal -->

<div class="offcanvas offcanvas-end right-modal-side cart-side-modal" tabindex="-1" id="offcanvasRight"
    aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">SHOPPING CART</h5>
        <button type="button" class="text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><span
                class="btn-close"></span> Close</button>
    </div>
    <div class="offcanvas-body">
        <div class="main-mid-canvas">



            <div class="modal-body" style="color: white;">
                @php
                    $cart = Session::get('cart');
                    $total = 0;
                    // dd($cart);
                @endphp
                @if (Session::has('cart') && !empty($cart))
                    @foreach (Session::get('cart') as $item)
                        @php
                            $product = App\Product::where('id', $item['id'])->first();

                        @endphp
                        
                        <div class="row cart-items">
                            <div class="col-md-12 delete-cart">
                                <a href="javascript:void(0)"
                                    onclick="window.location.href='{{ route('remove_cart', ['id' => $item['id']]) }}'"
                                    class="remove"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="col-md-6 image">
                                <img height="100px" src="{{ asset($product->image) }}">
                            </div>
                            <div class="col-md-6 text">
                                <h3>{{ $item['name'] }}</h3>
                                <div class="product" data-product-id="{{ $item['id'] }}">
                                    <p class="days">
                                        $<span class="cart-price">{{ $product->price * $item['qty'] }}</span>
                                    </p>

                                    <p class="days">
                                        Quantity: <input type="number" value="{{ $item['qty'] }}" name="qty"
                                            class="input_qty form-control"
                                            style="width: 41% !important; margin-top: 10px;" min="1"
                                            data-product-price="{{ $product->price }}">
                                    </p>
                                </div>

                            </div>
                        </div>
                        @php
                            $total += $product->price;
                        @endphp
                    @endforeach
                    <p>Total: $<span id="total-price">{{ $total }}</span></p>
                @else
                    <div class="col-lg-12">
                        <div class="gallery-img">
                            <div class="col-lg-12">
                                <div class="madal-logo">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </div>
                            </div>
                            <h5>NO PRODUCTS IN THE CART.</h5>

                        </div>
                    </div>
                @endif
                @if (!empty($cart))
                    <button type="button" class="btn btn-success" id="checkout"
                        onclick="window.location.href = '{{ route('checkout') }}'">Checkout</button>
                @else
                    <button type="button" class="btn btn-success" id="checkout"
                        onclick="window.location.href = '{{ route('checkout') }}'" disabled>Checkout</button>
                @endif

            </div>
        </div>
    </div>
