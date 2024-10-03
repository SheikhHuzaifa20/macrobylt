@extends('layouts.main')
@section('title', 'Order')
@section('content')

    <?php $segment = Request::segments(); ?>


    <section class="dashboard-form">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="back_leaf">
                        <h2><span class="type_span" data-typetext=" Audio"> </span><img
                                src="{{ asset('images/heading_leaf.png') }}" class="img-fluid" alt=""> </h2>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <style>
        .text {
            color: white !important;
        }
    </style>

    <main class="my-cart">
        <div class="my-account-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="myaccount-page-wrapper">
                            <div class="row">
                                @include('account.sidebar')
                                <div class="col-lg-9 col-md-8 acc-tab-content-start">
                                    <div class="tab-content" id="myaccountContent">
                                        <h1 class="text">Add Products</h1>

                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <!-- Error Message -->
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form class=" text" action="{{ route('add_product.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="category" class="form-label">Select Category</label>
                                                <select name="category" id="category" class="form-control" required>
                                                    <option value="" disabled selected>Select Category</option>
                                                    <option value="1">Macro</option>
                                                    <!-- Add more categories as needed -->
                                                </select>
                                            </div>


                                            <div class="mb-3">
                                                <label for="product_title" class="form-label">Product Title</label>
                                                <input type="text" name="product_title" id="product_title"
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="feature_product" class="form-label">Feature Product</label>
                                                <select name="feature_product" id="feature_product" class="form-control"
                                                    required>
                                                    {{-- <option value="" disabled selected>Select Category</option> --}}
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                    <!-- Add more categories as needed -->
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="total_price" class="form-label">Product Price</label>
                                                <input type="number" name="total_price" id="total_price" class="form-control"
                                                    step="0.01" min="0">
                                            </div>

                                            <div class="mb-3">
                                                <label for="price" class="form-label">Discount Price</label>
                                                <input type="number" name="discount_price" id="discount_price"
                                                    class="form-control" step="5" max="100"
                                                    min="0"value="%">
                                            </div>

                                            <div class="mb-3">
                                                <label for="description" class="form-label">Product Description</label>
                                                <textarea id="summary-ckeditor" name="description" class="form-control" placeholder="Write something.."></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="image" class="form-label">Product Image</label>
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="images" class="form-label">Gallery Image</label>
                                                <input type="file" name="images[]" id="images" class="form-control"
                                                    multiple>
                                            </div>

                                            <div class="mb-3">
                                                <label for="section_2_h1" class="form-label">Heading 2</label>
                                                <input type="text" name="section_2_h1" id="section_2_h1"
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="image_2" class="form-label">Image 2</label>
                                                <input type="file" name="image_2" id="image_2" class="form-control"
                                                    multiple>
                                            </div>

                                            <div class="mb-3">
                                                <label for="section_2_p" class="form-label">Description 2</label>
                                                <textarea id="summary-ckeditor" name="section_2_p" class="form-control" placeholder="Write something.."></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <input type="hidden" name="add_by" id="add_by"
                                                    value="{{ Auth::user()->id }}" class="form-control" step="0.01"
                                                    min="0">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                        {{-- original_price - (original_price * (discount_percentage / 100) --}}
                                        {{-- @php
                                            $product_price = $price;
                                            $discount_percent = $discount_price;

                                            $discounted_amount = $product_price * ($discount_percent / 100);
                                            $total_price = $product_price - $discounted_amount;

                                        @endphp --}}


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
        $(document).on('click', ".btn1", function(e) {
            // alert('it works');
            $('.loginForm').submit();
        });


        if ($('#summary-ckeditor').length != 0) {
            CKEDITOR.replace('summary-ckeditor');
        }
    </script>
@endsection
