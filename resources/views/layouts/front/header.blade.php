<?php $segment = Request::segments(); ?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="GadgetGrove Logo" style="max-height: 48px; width: auto;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars text-white"></i></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item {{ empty($segment) ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item {{ (isset($segment[0]) && $segment[0] == 'shop') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                            </li>
                            <li class="nav-item {{ (isset($segment[0]) && $segment[0] == 'contact') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                            </li>
                            @if (Auth::check())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('account') }}">Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('signin') }}">SignIn</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('signup') }}">SignUp</a>
                                </li>
                            @endif
                        </ul>
                        <form class="form-inline">
                            <div class="cart-icon">
                                <a href="javascript:void(0)" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    <span class="icon_bag">
                                        <i class="fa-solid fa-bag-shopping"></i>
                                    </span>
                                    @php
                                        $get_cart = Session::get('cart', []);
                                        $cart_count = is_array($get_cart) ? count($get_cart) : 0;
                                    @endphp
                                    <span>{{ $cart_count }}</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
