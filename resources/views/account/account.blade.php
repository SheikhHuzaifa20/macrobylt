@extends('layouts.main')
@section('title', 'Account Details')
@section('content')

    <style>
        .color {
            color: white;
            padding: 10px;
        }
        .bg{
            background-color: #820f0e !important;
        }
    </style>


    <?php $segment = Request::segments(); ?>



    <main class="my-cart">
        <!-- main content start -->
        <div class="my-account-wrapper">
            <div class="container my-5">
                <div class="row">
                    <div class="col-lg-12">
    <div class="myaccount-page-wrapper">
        <!-- My Account Tab Menu Start -->
        <div class="row">
            @include('account.sidebar')
            <!-- My Account Tab Menu End -->

            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 col-md-8 acc-tab-content-start">
                <div class="tab-content account-detail" id="myaccountContent">

                    <!-- Image Upload Section -->
                    <section class="image-upload">
                        <div class="col-lg-6">
                            <div class="image-upload-form" style=" margin-bottom: 15px; ">
                                <div class="section-heading" style=" margin-bottom: 15px; ">
                                    <h1 class="color">Upload Profile Image</h1>
                                </div>

                                <form action="{{ route('uploadPicture') }}" method="POST"
                                    enctype="multipart/form-data" id="imageUploadForm">
                                    @csrf
                                    <div class="d-flex" style="margin-left: 10px; width: 500px;">

                                        <div class="form-group">
                                            <input class="form-control" type="file" name="pic"
                                                id="profile_image">
                                        </div>
                                        {{-- <img src="" class="img-fluid"> --}}
                                        <div class="form-group">
                                            <button type="submit"  style="margin-left: 20px;"
                                            class="btn btn-danger bg">Upload</button>
                                        </div>

                                    </div>
                                    <div>
                                        <img style="height: 50px;" src="{{ $profile->pic }}" alt="">

                                        @if( $profile->pic)
                                            <span style="color: white; margin-left: 5px;">{{ Auth::user()->name }} image</span>
                                        @else
                                            <span style="color: white; margin-left: 5px;">User has no image</span>
                                        @endif
                                    </div>

                                </form>
                            </div>
                        </div>
                    </section>


                    <!-- Single Tab Content Start -->
                    <div class="tab-pane active" id="account-info" role="tabpanel">
                        <div class="myaccount-content" style="margin-left: 20px;">
                            <div class="section-heading">
                                <h2 class="color">Account Details</h2>
                            </div>
                            <div class="account-details-form">
                                <form action="{{ route('update.account') }}" method="post"
                                    enctype="multipart/form-data" id="accountForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <label for="name"
                                                    class="color required">Name</label>
                                                <input type="text" style="background-color: none;"
                                                    class="form-control" id="name" name="name"
                                                    placeholder="Name" value="{{ Auth::user()->name }}">

                                            </div>

                                        </div>

                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <label for="age"
                                                        class="color required">Age</label>
                                                    <input type="text" class="form-control"
                                                        id="age" name="age" placeholder="Age"
                                                        value="{{ $profile->age ?? '' }}">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="single-input-item">
                                            <label for="gender" class="color required">Gender</label>
                                            <select name="gender" class="form-control" id="gender">
                                                <option value="" disabled selected>Select Gender
                                                </option>
                                                <option value="male"
                                                    {{ $profile->gender == 'male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="female"
                                                    {{ $profile->gender == 'female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                        </div>

                                        <div class="single-input-item">
                                            <label for="email" class="color required">Email</label>
                                            <input class="form-control " type="email" id="address"
                                                name="email" placeholder="Email"
                                                value="{{ Auth::user()->email }}">
                                        </div>

                                        <div class="single-input-item">
                                            <label for="address" class="color required">Address</label>
                                            <input class="form-control " type="text" id="address"
                                                name="address" placeholder="Address"
                                                value="{{ $profile->address ?? '' }}">
                                        </div>

                                        <div class="single-input-item">
                                            <label for="domain"
                                                class="color required">Domain</label>
                                            <input class="form-control" type="text" id="domain"
                                                name="domain" placeholder="Domain"
                                                value="{{ $profile->domain ?? '' }}">
                                        </div>

                                        <div class="single-input-item">
                                            <label for="aboutme" class="color required">About
                                                Me</label>
                                            <textarea class="form-control" id="aboutme" name="bio" placeholder="About Me"
                                                style=" width: 734px; height: 200px; ">{{ $profile->bio ?? '' }}</textarea>
                                        </div>

                                    <fieldset>
                                        <legend class="color">Password change</legend>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <label for="new-pwd" class="color required">New
                                                        Password</label>
                                                    <input class="form-control" type="password"
                                                        id="new-pwd" placeholder="New Password"
                                                        name="password">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="single-input-item">
                                                    <label for="confirm-pwd"
                                                        class="color required">Confirm Password</label>
                                                    <input class="form-control" type="password"
                                                        id="confirm-pwd"
                                                        placeholder="Confirm Password"
                                                        name="password_confirmation">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="single-input-item">
                                        <button class="color btn btn-danger my-3 bg"
                                            id="updateProfile ">Save Changes</button>
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
        $(document).on('click', "#updateProfile", function(e) {
            $('#accountForm').submit();
        });
    </script>

@endsection
