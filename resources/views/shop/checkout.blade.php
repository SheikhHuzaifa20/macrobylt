@extends('layouts.main')
@section('title', 'Checkout')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css"
        integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .checkoutPage {
            background: linear-gradient(180deg, #0d1013 0%, #0a0f1d 100%);
            padding: 50px 0px;
            min-height: 80vh;
        }

        .checkout-card {
            background: #161b22;
            border: 1px solid rgba(0, 210, 255, 0.15);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .section-heading h3 {
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 2px;
            font-size: 2rem;
            color: #ffffff;
            margin-bottom: 20px;
        }

        form#order-place .form-control {
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            background-color: #0d1013;
            height: 52px;
            padding: 12px 18px;
            color: #ffffff;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        form#order-place .form-control::placeholder {
            color: #64748b;
        }

        form#order-place .form-control:focus {
            background-color: #111827;
            border-color: #00d2ff;
            box-shadow: 0 0 15px rgba(0, 210, 255, 0.3);
            outline: none;
        }

        form#order-place textarea.form-control {
            height: auto !important;
        }

        .YouOrder {
            background: #161b22;
            border: 1px solid rgba(0, 210, 255, 0.2);
            border-top: 4px solid #00d2ff;
            color: #ffffff;
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
        }

        .YouOrder h5 {
            color: #cbd5e1;
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 15px;
            padding-bottom: 12px;
            border-bottom: 1px dashed rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .YouOrder h5 span {
            color: #00d2ff;
            font-weight: 700;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.25rem;
            letter-spacing: 0.5px;
        }

        .amount-wrapper {
            padding-top: 15px;
            border-top: 1px solid rgba(0, 210, 255, 0.2);
            text-align: left;
            margin-top: 25px;
        }

        .amount-wrapper h2 {
            font-size: 1.1rem;
            color: #94a3b8;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .amount-wrapper h2 span {
            color: #ffffff;
            font-weight: 600;
        }

        .amount-wrapper h3 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.5rem;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 1px;
            color: #ffffff;
            border-top: 1px solid rgba(0, 210, 255, 0.3);
            padding-top: 15px;
            margin-top: 15px;
        }

        .amount-wrapper h3 .cart-price {
            color: #00d2ff;
            font-size: 2rem;
        }

        .payment-accordion .card {
            background: #161b22;
            border: 1px solid rgba(0, 210, 255, 0.15);
            border-radius: 14px !important;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .payment-accordion .card-header {
            background: rgba(0, 210, 255, 0.05);
            border-bottom: 1px solid rgba(0, 210, 255, 0.1);
            padding: 0px !important;
        }

        .payment-accordion .btn-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            text-align: left;
            padding: 16px 20px;
            color: #ffffff;
            font-weight: 600;
            text-decoration: none !important;
        }

        .payment-accordion img {
            display: inline-block;
            margin-left: 10px;
            background-color: #ffffff;
            padding: 4px 8px;
            border-radius: 6px;
        }

        .StripeElement {
            box-sizing: border-box;
            height: 48px;
            padding: 14px 16px;
            border-radius: 10px;
            background-color: #0d1013;
            border: 1px solid rgba(0, 210, 255, 0.2);
            color: #ffffff;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .StripeElement--focus {
            border-color: #00d2ff;
            box-shadow: 0 0 12px rgba(0, 210, 255, 0.3);
        }

        .StripeElement--invalid {
            border-color: #ff0055;
        }

        div#card-errors {
            color: #ff4d6d;
            background-color: rgba(255, 0, 85, 0.1);
            border: 1px solid rgba(255, 0, 85, 0.3);
            display: none;
            width: 100%;
            font-size: 0.9rem;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .PaYmEnT {
            background: linear-gradient(135deg, #0099cc, #00d2ff);
            color: #ffffff;
            border: none;
            border-radius: 30px;
            padding: 14px;
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            box-shadow: 0 4px 20px rgba(0, 210, 255, 0.3);
            transition: all 0.3s ease;
        }

        .PaYmEnT:hover {
            background: linear-gradient(135deg, #00b4d8, #00f0ff);
            box-shadow: 0 8px 25px rgba(0, 210, 255, 0.45);
            transform: translateY(-2px);
            color: #ffffff;
        }

        .checkoutPage span.invalid-feedback strong {
            color: #ff4d6d;
            background-color: rgba(255, 0, 85, 0.1);
            border: 1px solid rgba(255, 0, 85, 0.3);
            display: block;
            width: 100%;
            font-size: 0.85rem;
            padding: 6px 12px;
            border-radius: 6px;
            margin-top: 6px;
        }

        .chkbox {
            color: #cbd5e1;
            font-size: 0.95rem;
            cursor: pointer;
        }

        .runningBtn {
            color: #00d2ff;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }
        .runningBtn:hover {
            color: #00f0ff;
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')

    {{-- Inner Banner --}}
    <section class="inner-banner py-5" style="background: linear-gradient(135deg, #161b22 0%, #0d1013 100%); border-bottom: 1px solid rgba(0, 210, 255, 0.15);">
        <div class="container">
            <div class="row text-center py-3">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <span class="text-uppercase font-weight-bold tracking-wider px-3 py-1 mb-3 d-inline-block rounded-pill" style="background: rgba(0, 210, 255, 0.1); color: #00d2ff; border: 1px solid rgba(0, 210, 255, 0.3); font-size: 0.85rem; letter-spacing: 2px;">
                            SECURE CHECKOUT
                        </span>
                        <h1 class="display-4 font-weight-bold text-uppercase mb-3" style="font-family: 'Bebas Neue', sans-serif; letter-spacing: 2px; color: #ffffff;">FINAL STEP TO ORDER</h1>
                        <h6 class="text-uppercase" style="font-size: 0.9rem; letter-spacing: 1.5px;">
                            <a href="{{ route('home') }}" class="text-decoration-none" style="color: #00d2ff; font-weight: 600;">HOME</a> 
                            <span class="mx-2" style="color: rgba(255,255,255,0.3);">/</span> 
                            <a href="{{ route('shop') }}" class="text-decoration-none" style="color: #00d2ff; font-weight: 600;">SHOP</a>
                            <span class="mx-2" style="color: rgba(255,255,255,0.3);">/</span> 
                            <span style="color: #cbd5e1;">CHECKOUT</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="form-body checkoutPage">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    @if ($errors->any())
                        <div class="alert alert-danger" style="background: rgba(255, 0, 85, 0.15); border: 1px solid rgba(255, 0, 85, 0.4); color: #ff4d6d; border-radius: 12px;">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="col-md-7 col-lg-7 col-sm-12 mb-4">
                    <div class="checkout-card">
                        <div class="section-heading">
                            <h3>BILLING ADDRESS</h3>
                            <div style="width: 50px; height: 3px; background: linear-gradient(90deg, #0099cc, #00d2ff); margin-top: -15px; margin-bottom: 25px; border-radius: 2px;"></div>
                        </div>

                        @if (\Session::has('stripe_error'))
                            <div class="alert alert-danger mb-4" style="background: rgba(255, 0, 85, 0.15); border: 1px solid rgba(255, 0, 85, 0.4); color: #ff4d6d; border-radius: 12px;">
                                {!! \Session::get('stripe_error') !!}
                            </div>
                        @endif

                        <form action="{{ route('order.place') }}" method="POST" id="order-place">
                            @csrf
                            <input type="hidden" name="payment_id" value="" />
                            <input type="hidden" name="payer_id" value="" />
                            <input type="hidden" name="payment_status" value="" />
                            <input type="hidden" name="payment_method" id="payment_method" value="stripe" />

                            @if (Auth::check())
                                <?php $_getUser = DB::table('users')
                                    ->where('id', '=', Auth::user()->id)
                                    ->first(); ?>
                                <div class="form-group mb-3">
                                    <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">First Name *</label>
                                    <input class="form-control" id="f-name" name="first_name"
                                        value="{{ $_getUser->name ?? '' }}" placeholder="First Name *" type="text" required>
                                    <span class="invalid-feedback fname {{ $errors->first('first_name') ? 'd-block' : '' }}">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Address *</label>
                                    <input class="form-control" id="address" name="address_line_1" placeholder="Address *"
                                        type="text" value="{{ old('address_line_1') }}" required>
                                    <span class="invalid-feedback {{ $errors->first('address_line_1') ? 'd-block' : '' }}">
                                        <strong>{{ $errors->first('address_line_1') }}</strong>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Town / City *</label>
                                        <input class="form-control" placeholder="Town / City *" name="city" id="city"
                                            type="text" required>
                                        <span class="invalid-feedback {{ $errors->first('city') ? 'd-block' : '' }}">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Country</label>
                                        <input type="text" name="country" id="country" class="form-control"
                                            placeholder="Country">
                                        <span class="invalid-feedback {{ $errors->first('country') ? 'd-block' : '' }}">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Phone *</label>
                                        <input class="form-control" placeholder="Phone *" name="phone_no" type="text"
                                            value="{{ old('phone_no') }}" required>
                                        <span class="invalid-feedback {{ $errors->first('phone_no') ? 'd-block' : '' }}">
                                            <strong>{{ $errors->first('phone_no') }}</strong>
                                        </span>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Email *</label>
                                        <input class="form-control" name="email" placeholder="Email *" type="email"
                                            value="{{ old('email') ? old('email') : $_getUser->email }}" required>
                                        <span class="invalid-feedback {{ $errors->first('email') ? 'd-block' : '' }}">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Postcode</label>
                                    <input class="form-control" id="zip_code" name="zip_code" placeholder="Postcode"
                                        type="text" value="{{ old('zip_code') }}">
                                </div>
                                <div class="form-group mb-0">
                                    <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Order Note</label>
                                    <textarea class="form-control" id="comment" name="order_notes" placeholder="Notes about your order, e.g. special instructions for delivery." rows="4">{{ old('order_notes') }}</textarea>
                                </div>
                            @else
                                <a href="{{ url('signin') }}" target="_blank" class="runningBtn"><i class="fa-solid fa-user mr-2"></i> Returning customer? Click here to login</a>
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">First Name *</label>
                                        <input class="form-control" id="f-name" name="first_name"
                                            value="{{ old('first_name') }}" placeholder="First Name" type="text" required>
                                        <span class="invalid-feedback fname {{ $errors->first('first_name') ? 'd-block' : '' }}">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Last Name *</label>
                                        <input class="form-control" placeholder="Last Name" name="last_name" id="l-name"
                                            type="text" value="{{ old('last_name') }}">
                                        <span class="invalid-feedback lname {{ $errors->first('last_name') ? 'd-block' : '' }}">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Address *</label>
                                    <input class="form-control" id="address" name="address_line_1" placeholder="Address"
                                        type="text" value="{{ old('address_line_1') }}" required>
                                    <span class="invalid-feedback {{ $errors->first('address_line_1') ? 'd-block' : '' }}">
                                        <strong>{{ $errors->first('address_line_1') }}</strong>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Town / City *</label>
                                        <input class="form-control" placeholder="Town / City" name="city"
                                            id="city" type="text" required>
                                        <span class="invalid-feedback {{ $errors->first('city') ? 'd-block' : '' }}">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Country</label>
                                        <input type="text" name="country" id="country" class="form-control"
                                            placeholder="Country">
                                        <span class="invalid-feedback {{ $errors->first('country') ? 'd-block' : '' }}">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Phone *</label>
                                        <input class="form-control" placeholder="Phone" name="phone_no" type="text"
                                            value="{{ old('phone_no') }}" required>
                                        <span class="invalid-feedback {{ $errors->first('phone_no') ? 'd-block' : '' }}">
                                            <strong>{{ $errors->first('phone_no') }}</strong>
                                        </span>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Email *</label>
                                        <input class="form-control" name="email" placeholder="Email" type="email"
                                            value="{{ old('email') }}" required>
                                        <span class="invalid-feedback {{ $errors->first('email') ? 'd-block' : '' }}">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Postcode</label>
                                    <input class="form-control" id="compnayName" name="zip_code" placeholder="Postcode"
                                        type="text" value="{{ old('zip_code') }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="chkbox">
                                        <input type="checkbox" name="create_account" id="create_account"
                                            {{ !empty(old('create_account')) ? 'checked' : '' }}>
                                        Create An Account?</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password">
                                        <span class="invalid-feedback {{ $errors->first('password') ? 'd-block' : '' }}">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <input type="password" class="form-control" name="confirm_password"
                                            placeholder="Confirm Password">
                                        <span class="invalid-feedback {{ $errors->first('confirm_password') ? 'd-block' : '' }}">
                                            <strong>{{ $errors->first('confirm_password') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="small text-uppercase font-weight-bold" style="color: #94a3b8; letter-spacing: 1px;">Order Note</label>
                                    <textarea class="form-control" id="comment" name="order_notes" placeholder="Order Note" rows="4"></textarea>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>

                <div class="col-md-5 col-lg-5 col-sm-12">
                    <div class="YouOrder">
                        <h4 class="font-weight-bold text-uppercase mb-3" style="font-family: 'Bebas Neue', sans-serif; letter-spacing: 1.5px; font-size: 1.8rem; color: #ffffff;">YOUR ORDER</h4>
                        <?php $subtotal = 0;
                        $addon_total = 0;
                        $variation = 0; ?>
                        @foreach ($cart as $key => $value)
                            <h5>
                                <span>{{ $value['name'] }} × {{ $value['qty'] }}</span>
                                <span>${{ $value['price'] * $value['qty'] }}</span>
                            </h5>
                            <?php $subtotal += $value['price'] * $value['qty'];
                            $variation += $value['variation_price'];
                            ?>
                        @endforeach
                        <div class="amount-wrapper">
                            <h2>Item Subtotal <span>${{ $subtotal }}</span></h2>
                            <h3>
                                Total Price:
                                <span class="cart-price">${{ $subtotal }}</span>
                            </h3>
                        </div>
                    </div>

                    <div id="accordion" class="payment-accordion">
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                        data-payment="stripe">
                                        <span>Pay with Credit Card</span>
                                        <img src="{{ asset('images/payment1.png') }}" alt="Credit Cards" width="140">
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body p-4">
                                    <div class="stripe-form-wrapper require-validation"
                                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" data-cc-on-file="false">
                                        <div id="card-element"></div>
                                        <div id="card-errors" role="alert"></div>
                                        <div class="form-group mb-0 mt-3">
                                            <button class="PaYmEnT btn btn-block text-uppercase" type="button" id="stripe-submit">
                                                <span>Pay Now ${{ $subtotal }}</span>
                                                <i class="fa-solid fa-lock ml-2" style="font-size: 0.9rem;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
        integrity="sha512-zlWWyZq71UMg1kwigJXlCUKDgA682EG72jNQNHwNL3ZXEyy1nnfyodvqFTfM/fkE7feXujG1bi1LHTZDvyscCg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#accordion .btn-link').on('click', function(e) {
            if (!$(this).hasClass('collapsed')) {
                e.stopPropagation();
            }
            $('#payment_method').val($(this).attr('data-payment'));
        });

        var stripe = Stripe('{{ env('STRIPE_KEY') }}');

        // Create an instance of Elements.
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#ffffff',
                lineHeight: '24px',
                fontFamily: '"Manrope", sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#64748b'
                }
            },
            invalid: {
                color: '#ff4d6d',
                iconColor: '#ff4d6d'
            }
        };
        var card = elements.create('card', {
            style: style
        });
        card.mount('#card-element');

        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                $(displayError).show();
                displayError.textContent = event.error.message;
            } else {
                $(displayError).hide();
                displayError.textContent = '';
            }
        });

        $('#stripe-submit').click(function() {
            stripe.createToken(card).then(function(result) {
                var errorCount = checkEmptyFileds();
                if ((result.error) || (errorCount == 1)) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        $(errorElement).show();
                        errorElement.textContent = result.error.message;
                    } else {
                        $.toast({
                            heading: 'Alert!',
                            position: 'bottom-right',
                            text: 'Please fill the required fields before proceeding to pay',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 5000,
                            stack: 6
                        });
                    }
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            var form = document.getElementById('order-place');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }

        function checkEmptyFileds() {
            var errorCount = 0;
            $('form#order-place').find('.form-control').each(function() {
                if ($(this).prop('required')) {
                    if (!$(this).val()) {
                        $(this).parent().find('.invalid-feedback').addClass('d-block');
                        $(this).parent().find('.invalid-feedback strong').html('Field is Required');
                        errorCount = 1;
                    }
                }
            });
            return errorCount;
        }
    </script>
@endsection
