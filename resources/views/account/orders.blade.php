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
                                        <div class="tab-pane fade show active" id="dashboad">
                                            <div class="myaccount-content">
                                                <div class="section-heading text">
                                                    <h2>Order Records</h2>
                                                </div>
                                                <table id="example"
                                                    class="table table-striped table-bordered table-content" cellspacing="0"
                                                    width="100%">
                                                    <thead style="background-color: #820f0e;">
                                                        <tr class="text">
                                                            <th>S.No</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Date</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    {{-- <tfoot style="background-color: #820f0e;">
                                                        <tr class="text">
                                                            <th>S.No</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Date</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot> --}}
                                                    <tbody style="color: white;">
                                                        @php
                                                            $count = 1;
                                                        @endphp
                                                        @foreach ($ORDERS as $val)
                                                            <tr class="text">
                                                                <td>{{ $count }}</td>
                                                                <td>{{ $val->delivery_first_name }}</td>
                                                                <td>{{ $val->order_email }}</td>
                                                                <td>{{ $val->delivery_phone_no }}</td>
                                                                <td>{{ date('d F, Y h:i a', strtotime($val->created_at)) }}
                                                                </td>
                                                                <td>${{ $val->order_total }}</td>
                                                                <td>
                                                                    <a class="btn btn-primary view-btn my-4"
                                                                        style="align-content: center;"
                                                                        href="{{ route('invoice', [$val->id]) }}">View
                                                                        Invoice</a>
                                                                    {{-- <button type="button" class="btn btn-primary view-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#viewModal{{ $count }}">View Audio</button> --}}
                                                                </td>
                                                            </tr>
                                                            {{-- View Modal --}}
                                                            <div class="modal fade" id="viewModal{{ $count }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="viewModalLabel{{ $count }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                View Audio
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <!-- Audio Player -->
                                                                            @foreach ($val['orderProducts'] as $orderProduct)
                                                                                <audio controls>
                                                                                    <source
                                                                                        src="{{ $orderProduct['audio']['audio_link'] }}"
                                                                                        type="audio/mpeg">
                                                                                    Your browser does not support the audio
                                                                                    element.
                                                                                </audio>
                                                                                <div>
                                                                                    <a href="{{ $orderProduct['audio']['audio_link'] }}"
                                                                                        download
                                                                                        class="btn btn-secondary">Download</a>
                                                                                </div>
                                                                            @endforeach

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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

        $(document).ready(function() {
            $('#example').dataTable();
        });
    </script>
@endsection
