@extends('layouts.main')
@section('title', 'Account Details')
@section('content')

<?php $segment = Request::segments(); ?>


<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-wrapper inner-banner-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="section-heading text-center">
                                <h1>Add Audio</h1>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<main class="my-cart">
    <!-- banner start -->
    <!-- banner end -->

<!-- main content start -->

 <!-- my account wrapper start -->
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            @include('account.sidebar')
                            <!-- My Account Tab Menu End -->
    
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                   
                                   <!-- Single Tab Content Start -->
                                    <div class="tab-pane active" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <div class="section-heading">
                                                <h2>Add Audio</h2>
                                            </div>
    
                                            <div class="account-details-form">
                                               <form action="{{ route('audio.store') }}" method="post" enctype="multipart/form-data" id="accountForm">
                                                @csrf
                                                    <div class="row">
                                                    
                                                        <div class="col-lg-12">
                                                            <div class="single-input-item">
                                                                <label for="audio_title" class="required">Audio Title</label>
                                                                <input type="text" id="audio_title" name="audio_title" placeholder="Audio Title " value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="single-input-item">
                                                                <label for="description" class="required">Audio Description</label>
                                                                <textarea id="description" name="description" placeholder="Audio Title "></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn btn btn-red" id="updateProfile">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
    
                                    
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
@section('css')
<style type="text/css">
    
</style>
@endsection
@section('js')

<script type="text/javascript">

 $(document).on('click', "#updateProfile", function(e){
        $('#accountForm').submit();
  });

</script>

@endsection