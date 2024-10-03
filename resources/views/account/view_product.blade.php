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
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboard">
                                            <div class="myaccount-content">
                                                <div>
                                                    <a href="{{ route('add_product.create') }}"
                                                        class="btn btn-danger my-3">Add Products</a>
                                                </div>
                                                <div class="section-heading text my-2">
                                                    <h2>Products</h2>
                                                </div>
                                                <table id="example"
                                                    class="table table-striped table-bordered table -content"
                                                    cellspacing="0" width="100%">
                                                    <thead style="background-color: #820f0e;">
                                                        <tr class="text">
                                                            <th>#</th>
                                                            <th>Image</th>
                                                            <th>Product Title</th>
                                                            <th>Price</th>
                                                            <th>Description</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="color: white;">
                                                        @php
                                                            $count = 1;
                                                        @endphp
                                                        @foreach ($products as $val)
                                                            <tr class="text">
                                                                <td>{{ $count }}</td>
                                                                <td>
                                                                    @if ($val->image)
                                                                        <img src="{{ asset($val->image) }}"
                                                                            alt="Product Image" style="width: 80px;">
                                                                    @else
                                                                        No Image
                                                                    @endif
                                                                </td>
                                                                <td>{{ $val->product_title }}</td>
                                                                <td>${{ $val->price }}</td>

                                                                <td>{{ $val->description }}</td>
                                                                <td>{{ date('d F, Y h:i a', strtotime($val->created_at)) }}
                                                                </td>
                                                                <td> <a href="{{ route('edit_product', $val->id) }}" class="btn btn-primary my-1">Edit</a>
                                                                    <form action="{{ route('delete_product', $val->id) }}"
                                                                        method="POST" style="display:inline;"
                                                                        onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger my-1">Delete</button>
                                                                    </form>
                                                                </td>

                                                            </tr>
                                                            {{-- View Modal --}}



                                                            @php
                                                                $count++;
                                                            @endphp
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                    </div>
                                </div>
                                <!-- My Account Tab Content End -->
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

        $(document).ready(function() {
            $('#example').dataTable();
        });
    </script>
@endsection
