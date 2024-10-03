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

        .flex-img {
            display: flex;
            gap: 5px;
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

                                        <form class=" text" action="{{ route('update_product', $product->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="category" class="form-label">Select Category</label>
                                                    <select name="category" value="{{ $product->category }}" id="category" class="form-control" required>
                                                        <option value="" disabled selected>Select Category</option>
                                                        <option value="1">Macro</option>
                                                        <!-- Add more categories as needed -->
                                                    </select>
                                            </div>


                                            <div class="mb-3">
                                                <label for="product_title" class="form-label">Product Title</label>
                                                <input type="text" name="product_title" id="product_title"
                                                    class="form-control" value="{{ $product->product_title }}" required>

                                            </div>

                                            <div class="mb-3">
                                                <label for="feature_product" class="form-label">Feature Product</label>
                                                <select name="feature_product" value="{{ $product->feature_product }}" id="feature_product" class="form-control" required>
                                                    {{-- <option value="" disabled selected>Select Category</option> --}}
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                    <!-- Add more categories as needed -->
                                                </select>                                            </div>

                                            <div class="mb-3">
                                                <label for="price" class="form-label">Product Price</label>
                                                <input type="number" name="price" id="price" class="form-control"
                                                    value="{{ $product->price }}" min="0" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="description" class="form-label">Product Description</label>
                                                <textarea name="description" id="description" class="form-control" required>{{ $product->description }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="image" class="form-label">Product Image</label>
                                                <input type="file" name="image" id="image" class="form-control">
                                                @if ($product->image)
                                                    <img src="{{ asset($product->image) }}" alt=""
                                                        style="width: 100px; height: auto; padding-top: 8px">
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="images" class="form-label">Gallery Image</label>
                                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                                                <div class="flex-img">
                                                    @if (!empty($product_imagess))
                                                        @foreach ($product_imagess as $image)
                                                            <div class="image-container" style="position: relative; display: inline-block; margin: 5px;">
                                                                <img src="{{ asset($image->image) }}"  alt="Product Image" style="width: 100px; height: auto;">
                                                                <button type="button" id="imageId" class="delete-image" data-image-id="{{ $image->id }}"
                                                                    style=" position: absolute; top: 0; right: 0; background: red; color: white; border: none; padding: 2px 5px; cursor: pointer;">
                                                                    &times;
                                                                </button>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <p>No images available.</p>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <label for="section_2_h1" class="form-label">Heading 2</label>
                                                <input type="text" name="section_2_h1" id="section_2_h1"
                                                    class="form-control" value="{{ $product->section_2_h1 }}" required>

                                            </div>

                                            <div class="mb-3">
                                                <label for="image_2" class="form-label">Image 2</label>
                                                <input type="file" name="image_2" id="image_2" class="form-control">
                                                @if ($product->image_2)
                                                    <img src="{{ asset($product->image_2) }}" alt="Second Image"
                                                        style="width: 100px; height: auto; padding-top: 8px">
                                                @endif
                                            </div>

                                            <div class="mb-3">
                                                <label for="section_2_p" class="form-label">Description 2</label>
                                                <textarea name="section_2_p" id="section_2_p" class="form-control" required>{{ $product->section_2_p }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <input type="hidden" name="add_by" id="add_by"
                                                    value="{{ Auth::user()->id }}"  class="form-control" step="0.01"
                                                    min="0">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update Product</button>
                                        </form>


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
    @if (session('error'))
        <script>
            alert('{{ session('error') }}')
        </script>
    @endif

    @if (session('success'))
        <script>
            alert('{{ session('success') }}')
        </script>
    @endif

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


        document.addEventListener('DOMContentLoaded', function () {
        // Add event listeners to all delete buttons
        document.querySelectorAll('.delete-image').forEach(button => {
            button.addEventListener('click', function () {
                const imageId = this.dataset.imageId;

                if (confirm('Are you sure you want to delete this image?')) {
                    // Make an AJAX call to delete the image from the server
                    fetch(`/delete-image/${imageId}`, {
                        method: 'get',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove the image container from the DOM
                            this.parentElement.remove();
                        } else {
                            alert('Failed to delete image.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to delete image.');
                    });
                }
            });
        });
    });


    </script>
@endsection
