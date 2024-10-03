@extends('layouts.main')
@section('title', 'Account')
@section('css')

@endsection
@section('content')

    <?php $segment = Request::segments(); ?>

    <section class="dashboard-form">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="back_leaf">
                        <h2>Gallery <span class="type_span" data-typetext=" Pictures"> </span><img src="{{ asset('images/heading_leaf.png') }}" class="img-fluid" alt=""> </h2>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>




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
                                                <div class="section-heading">
                                                    {{-- <h2>Gallery Pictures</h2> --}}
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">Add Gallery Pictures</button>

                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Add Pictures
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('gallery.store') }}" method="post"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            <label for="description"
                                                                                class="col-form-label">Picture
                                                                                Description:</label>
                                                                            <textarea class="form-control" id="description" name="description"></textarea>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="file"
                                                                                class="col-form-label">Picture Upload</label>
                                                                            <input type="file" id="image"
                                                                                name="image" class="form-control"
                                                                                required>
                                                                        </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table id="example"
                                                    class="table table-striped table-bordered table-content table-color" cellspacing="0"
                                                    width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Description</th>
                                                            <th>Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tfoot>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Description</th>
                                                            <th>Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @php
                                                            $count = 1;
                                                        @endphp
                                                        @foreach ($data as $val)
                                                            <tr>
                                                                <td>{{ $count }}</td>
                                                                <td>{{ $val->description }}</td>
                                                                <td><img src="{{ $val->image_link }}" alt="" width="100px" height="70px"></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-primary view-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#viewModal{{ $count }}"><i
                                                                            class="far fa-eye"></i></button>
                                                                    <button type="button" class="btn btn-success edit-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editModal{{ $count }}"><i
                                                                            class="fas fa-edit"></i></button>
                                                                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('gallery.delete', ['id' => $val->id]) }}'"                                                                        ><i
                                                                            class="far fa-trash-alt"></i></button>
                                                                </td>
                                                            </tr>
                                                            <!-- View Modal -->
                                                            <div class="modal fade" id="viewModal{{ $count }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="viewModalLabel{{ $count }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            View Audio Detail
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p><strong>Picture Description:</strong> {{ $val->description }}</p>
                                                                        <p><strong>Picture File:</strong> <img src="{{ $val->image_link }}" alt="" width="100px" height="70px"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                                <!-- Edit Modal -->
                                                            <div class="modal fade" id="editModal{{ $count }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $count }}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                Edit Pictures
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{ route('gallery.update') }}"
                                                                                method="post"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="gallery_id" value="{{ $val->id }}">
                                                                                <div class="mb-3">
                                                                                    <label for="description"
                                                                                        class="col-form-label">Picture
                                                                                        Description:</label>
                                                                                    <textarea class="form-control" id="description" name="description">{{ $val->description }}</textarea>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="file" class="col-form-label">Picture Upload</label>
                                                                                    @if (!empty($val->image))
                                                                                        <p style=" margin-bottom: 12px; "><strong>Current Image File:</strong> <img src="{{ $val->image_link }}" alt="" width="100px" height="70px"></p>                                                                                       
                                                                                    @endif
                                                                                    <input type="hidden" id="old_image" name="old_image" value="{{ $val->image }}">
                                                                                    <input type="file" id="image" name="image" class="form-control">
                                                                                </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                        </form>
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
