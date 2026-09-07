@section('title', 'Sign In - GadgetGrove')
@extends('layouts.main')
@section('content')

    <section class="inner-banner gg-auth-banner">
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

    <section class="gg-auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7 col-12">
                    <div class="gg-auth-card">
                        <div class="gg-auth-header">
                            <div class="gg-auth-icon">
                                <i class="fa-solid fa-mobile-screen-button"></i>
                            </div>
                            <h2>WELCOME BACK</h2>
                            <p>Sign in to your GadgetGrove account</p>
                        </div>
                        <form class="gg-auth-form" id="order-place" method="POST" action="{{ route('login') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger rounded" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="gg-form-group">
                                <label><i class="fa-regular fa-envelope mr-2"></i>Email Address</label>
                                <input type="email" name="email" class="gg-form-control" placeholder="you@example.com" required>
                            </div>
                            <div class="gg-form-group">
                                <label><i class="fa-solid fa-lock mr-2"></i>Password</label>
                                <input type="password" name="password" class="gg-form-control" placeholder="••••••••" required>
                            </div>
                            <div class="gg-form-group d-flex align-items-center justify-content-between">
                                <label class="gg-remember"><input type="checkbox"> Remember me</label>
                            </div>
                            <button type="submit" class="gg-auth-btn">
                                <span>SIGN IN</span>
                                <i class="fa-solid fa-arrow-right ml-2"></i>
                            </button>
                        </form>
                        <div class="gg-auth-footer">
                            <p>Don't have an account? <a href="{{ url('signup') }}">Create one</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('css')
    <style>
        .gg-auth-banner {
            background: linear-gradient(135deg, #0a0f1e 0%, #0d1b2a 100%) !important;
            padding: 60px 0 !important;
            border-bottom: 1px solid #00d2ff22;
        }
        .gg-auth-section {
            background: linear-gradient(180deg, #0a0f1e 0%, #0d1117 100%);
            padding: 60px 0 80px;
            min-height: 600px;
        }
        .gg-auth-card {
            background: linear-gradient(145deg, #0f1a2a, #0d1420);
            border: 1px solid #00d2ff22;
            border-radius: 24px;
            padding: 48px 40px;
            box-shadow: 0 20px 60px rgba(0,210,255,0.08), 0 0 0 1px rgba(0,210,255,0.05);
            position: relative;
            overflow: hidden;
        }
        .gg-auth-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #00d2ff, transparent);
        }
        .gg-auth-header {
            text-align: center;
            margin-bottom: 36px;
        }
        .gg-auth-icon {
            width: 64px; height: 64px;
            background: linear-gradient(135deg, #0099cc, #00d2ff);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 16px;
            font-size: 26px;
            color: #fff;
            box-shadow: 0 0 20px rgba(0,210,255,0.4);
        }
        .gg-auth-header h2 {
            color: #fff;
            font-size: 28px;
            margin-bottom: 8px;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 2px;
        }
        .gg-auth-header p {
            color: #8899aa;
            font-size: 14px;
            margin: 0;
        }
        .gg-form-group {
            margin-bottom: 20px;
        }
        .gg-form-group label {
            color: #99b0c8;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            display: block;
        }
        .gg-form-control {
            width: 100%;
            background: rgba(0,210,255,0.05);
            border: 1px solid #00d2ff33;
            border-radius: 10px;
            color: #fff;
            padding: 13px 16px;
            font-size: 15px;
            transition: all 0.3s;
            outline: none;
            box-sizing: border-box;
        }
        .gg-form-control:focus {
            border-color: #00d2ff;
            box-shadow: 0 0 0 3px rgba(0,210,255,0.12);
            background: rgba(0,210,255,0.08);
        }
        .gg-form-control::placeholder { color: #446677; }
        .gg-remember {
            color: #668899;
            font-size: 13px;
            cursor: pointer;
            text-transform: none !important;
            letter-spacing: 0 !important;
        }
        .gg-remember input { margin-right: 6px; }
        .gg-auth-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #0099cc, #00d2ff);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .gg-auth-btn:hover {
            background: linear-gradient(135deg, #007aa3, #0099cc);
            box-shadow: 0 8px 24px rgba(0,210,255,0.3);
            transform: translateY(-1px);
        }
        .gg-auth-footer {
            text-align: center;
            margin-top: 24px;
        }
        .gg-auth-footer p {
            color: #668899;
            font-size: 14px;
            margin: 0;
        }
        .gg-auth-footer a {
            color: #00d2ff;
            font-weight: 600;
        }
        .gg-auth-footer a:hover { color: #fff; }
        .alert-danger {
            background: rgba(255,50,50,0.1);
            border: 1px solid #ff333344;
            color: #ff8888;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
@endsection
