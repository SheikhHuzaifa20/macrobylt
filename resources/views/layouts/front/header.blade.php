<?php $segment = Request::segments(); ?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ url('assets/images/logo.png') }}"
                            class="img-fluid" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('stacks') }}">Stacks</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}"> Contact Us</a>
                            </li>
                            @if (Auth::user())
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
                                @php
                                    // Example roll value, this could be retrieved from a session, database, or any other source
                                    $roll = session('roll'); // Replace with your actual logic to get the roll value
                                @endphp

                                    <!-- For users with role 'Employee' -->
                                    <a href="" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                        <span class="icon_bag">
                                            <i class="fa-solid fa-bag-shopping"></i>
                                        </span>
                                        @php
                                            $get_cart = Session::get('cart');
                                        @endphp
                                        <span>{{ count($get_cart) }}</span>
                                    </a>


                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
