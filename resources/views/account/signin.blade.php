@section('title', 'Register')
@extends('layouts.main')
@section('content')

    <section class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1>Sign In</h1>
                        <h5>HOME<span>/</span><a href="#"> Sign In</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-info">
                        <h2>LOGIN YOUR ACCOUNT</h2>
                        <div class="row">
                            <div class="col-12">
                                <form class="loginForm" id="order-place" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Your Email *</label>
                                        <input style="color: white;" type="email" name="email" class="form-control" placeholder=""
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Your Password *</label>
                                        <input style="color: white;" type="password" name="password" class="form-control" placeholder=""
                                            required="">
                                    </div>
                                    <div class="row">
                                        <label class="remember"><input type="checkbox"> Remember me </label>
                                    </div>
                                    <input type="submit" value="LOGIN" class="btn form-btn form-control">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script></script>
@endsection
