<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="statement-para">
                    <p>
                        GadgetGrove is your ultimate destination for high-speed GaN fast chargers, magnetic MagSafe power banks, military-grade armor cases, and premium wireless audio gear. Engineered for performance and built to last.
                    </p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-logo">
                    <img src="{{ asset('images/logo.png') }}" class="img-fluid mb-3" alt="GadgetGrove Logo" style="max-height: 48px;">
                    <p>Empowering your digital connected world with next-generation mobile accessories and intelligent power solutions.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-logo">
                    <h4>QUICK LINKS</h4>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('shop') }}">Shop</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-logo">
                    <h4>CATEGORIES</h4>
                    <ul>
                        <li>
                            <a href="{{ route('shop') }}">Chargers & Power Banks</a>
                        </li>
                        <li>
                            <a href="{{ route('shop') }}">Phone Cases & Covers</a>
                        </li>
                        <li>
                            <a href="{{ route('shop') }}">Audio & Earbuds</a>
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
                            <a href="mailto:support@gadgetgrove.com">support@gadgetgrove.com</a>
                        </li>
                        <li>
                            <span><i class="fa-solid fa-mobile-screen-button"></i></span>
                            <a href="tel:+18005550199">+1 (800) 555-0199</a>
                        </li>
                        <li>
                            <span><i class="fa-solid fa-location-dot"></i></span>
                            <a href="#">123 Tech Avenue, Silicon Valley, CA</a>
                        </li>
                    </ul>
                    <ul class="social-icon">
                        <li>
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
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
                    <p>Copyright &copy; 2026 GadgetGrove Mobile Accessories. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

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
                    $cart = Session::get('cart', []);
                    $total = 0;
                @endphp
                @if (Session::has('cart') && !empty($cart))
                    @foreach (Session::get('cart') as $item)
                        @php
                            $product = App\Product::where('id', $item['id'])->first();
                            $item_price = $product ? $product->price : ($item['price'] ?? 0);
                            $item_image = $product ? $product->image : 'images/products/magsafe_powerbank_clean.png';
                            $subtotal = $item_price * $item['qty'];
                            $total += $subtotal;
                        @endphp
                        
                        <div class="row cart-items mb-3">
                            <div class="col-md-12 delete-cart">
                                <a href="javascript:void(0)"
                                    onclick="window.location.href='{{ route('remove_cart', ['id' => $item['id']]) }}'"
                                    class="remove"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="col-md-6 image">
                                <img height="100px" src="{{ asset($item_image) }}" class="img-fluid rounded" alt="{{ $item['name'] }}">
                            </div>
                            <div class="col-md-6 text">
                                <h3>{{ $item['name'] }}</h3>
                                <div class="product" data-product-id="{{ $item['id'] }}">
                                    <p class="days">
                                        $<span class="cart-price">{{ $subtotal }}</span>
                                    </p>
                                    <p class="days">
                                        Quantity: {{ $item['qty'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <p class="font-weight-bold h5 my-3">Total: $<span id="total-price">{{ $total }}</span></p>
                    <button type="button" class="btn red-btn mt-2" id="checkout"
                        onclick="window.location.href = '{{ route('checkout') }}'">Checkout</button>
                @else
                    <div class="col-lg-12 text-center py-4">
                        <div class="madal-logo mb-3">
                            <i class="fa-solid fa-cart-shopping" style="font-size: 40px; color: var(--red-color);"></i>
                        </div>
                        <h5>NO PRODUCTS IN THE CART.</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
