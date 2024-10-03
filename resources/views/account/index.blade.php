@extends('layouts.main')
@section('title', 'Account')
@section('css')

@endsection
@section('content')

<?php $segment = Request::segments(); ?>




<main class="my-cart">
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="myaccount-page-wrapper">
                        <div class="row">
                            @include('account.sidebar')
                            <div style="margin-top: 100px" class=" col-lg-9 col-md-8 acc-tab-content-start">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad">
                                        <div class="myaccount-content">
                                            <div class="section-heading">
                                                <h1 style="color: white">Dashboard</h1>

                                                <div class="welcome">

                                                    <p style="color: grey">Hello, <strong style="color: white"><b>{{ Auth::user()->name }}</b></strong ><b style="color: white;"> (If Not <strong>{{ Auth::user()->name }} !</b></strong><b><a href="{{ url('logout') }}" class="logout"> Logout</a>)</b></p>
                                                </div>

                                                <p style="color: grey" class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->


<!-- main content end -->
</main>

@endsection
@section('js')
<script type="text/javascript">
     $(document).on('click', ".btn1", function(e){
            // alert('it works');
            $('.loginForm').submit();
     });
</script>
@endsection
