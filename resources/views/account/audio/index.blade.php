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
                        <h2>Audio <span class="type_span" data-typetext=" Gallery"> </span><img src="{{ asset('images/heading_leaf.png') }}" class="img-fluid" alt=""> </h2>
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
                                                    {{-- <h2>Audio</h2> --}}
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">Add Audio</button>

                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Add Audio
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('audio.store') }}" method="post"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            <label for="audio_title"
                                                                                class="col-form-label">Audio Title</label>
                                                                            <input type="text" id="audio_title"
                                                                                name="audio_title" class="form-control"
                                                                                placeholder="Audio Title " value=""
                                                                                required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="description"
                                                                                class="col-form-label">Audio
                                                                                Description:</label>
                                                                            <textarea class="form-control" id="description" name="description" required></textarea>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="description"
                                                                                class="col-form-label">Audio
                                                                                Language:</label>
                                                                            <input class="form-control" id="language" name="language" placeholder="Audio Language" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="description"
                                                                                class="col-form-label">Audio
                                                                                Genre:</label>
                                                                            <input class="form-control" id="genre" name="genre" placeholder="Audio Genre" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="description"
                                                                                class="col-form-label">Audio
                                                                                Freestyle Name:</label>
                                                                            <input class="form-control" id="free_style_name" name="free_style_name" placeholder="Audio Freestyle Name" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="file"
                                                                                class="col-form-label">Audio File</label>
                                                                            <input type="file" id="file"
                                                                                name="file" class="form-control"
                                                                                required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="file"
                                                                                class="col-form-label">Audio Image</label>
                                                                            <input type="file" id="image"
                                                                                name="image" class="form-control"
                                                                                required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="description"
                                                                                class="col-form-label">Audio
                                                                                Price:</label>
                                                                            <input type="number" step="any" class="form-control" id="price" name="price" placeholder="Audio Price" required>
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
                                                            <th>Audio Title</th>
                                                            <th>Genre</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tfoot>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Audio Title</th>
                                                            <th>Genre</th>
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
                                                                <td>{{ $val->audio_title }}</td>
                                                                <td>{{ $val->genre }}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-primary view-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#viewModal{{ $count }}"><i
                                                                            class="far fa-eye"></i></button>
                                                                    <button type="button" class="btn btn-success edit-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editModal{{ $count }}"><i
                                                                            class="fas fa-edit"></i></button>
                                                                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('audio.delete', ['id' => $val->id]) }}'"                                                                        ><i
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
                                                                        <p><strong>Audio Title:</strong> {{ $val->audio_title }}</p>
                                                                        <p><strong>Audio Description:</strong> {{ $val->description }}</p>
                                                                        <p><strong>Audio Language:</strong> {{ $val->language }}</p>
                                                                        <p><strong>Audio Genre:</strong> {{ $val->genre }}</p>
                                                                        <p><strong>Audio Freestyle Name:</strong> {{ $val->free_style_name }}</p>
                                                                        <p><strong>Audio File:</strong> <a href="{{ $val->audio_link }}" target="_blank" class="btn btn-success">Listen and Download</a></p>
                                                                        <p><strong>Audio Image:</strong> <img src="{{ $val->image_link }}" alt="" width="100px" height="100px"></p>
                                                                        <p><strong>Audio Price:</strong> {{ $val->price }}</p>
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
                                                                                Esit Audio
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{ route('audio.update') }}"
                                                                                method="post"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="audio_id" value="{{ $val->id }}">
                                                                                <div class="mb-3">
                                                                                    <label for="audio_title"
                                                                                        class="col-form-label">Audio
                                                                                        Title</label>
                                                                                    <input type="text"
                                                                                        id="audio_title"
                                                                                        name="audio_title"
                                                                                        class="form-control"
                                                                                        placeholder="Audio Title "
                                                                                        value="{{ $val->audio_title }}" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="description"
                                                                                        class="col-form-label">Audio
                                                                                        Description:</label>
                                                                                    <textarea class="form-control" id="description" name="description" required>{{ $val->description }}</textarea>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="language"
                                                                                        class="col-form-label">Audio
                                                                                        Language</label>
                                                                                    <input type="text"
                                                                                        id="language"
                                                                                        name="language"
                                                                                        class="form-control"
                                                                                        placeholder="Language"
                                                                                        value="{{ $val->language }}" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="description"
                                                                                        class="col-form-label">Audio
                                                                                        Genre:</label>
                                                                                    <input class="form-control" id="genre" name="genre" placeholder="Audio Genre" value="{{ $val->genre }}" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="description"
                                                                                        class="col-form-label">Audio
                                                                                        Freestyle Name:</label>
                                                                                    <input class="form-control" id="free_style_name" name="free_style_name" placeholder="Audio Freestyle Name" value="{{ $val->free_style_name }}" required>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="file" class="col-form-label">Audio File</label>
                                                                                    @if (!empty($val->file))
                                                                                        <p style=" margin-bottom: 12px; "><strong>Current Audio File:</strong> <a href="{{ $val->audio_link }}" target="_blank" class="btn btn-success">File</a></p>                                                                                       
                                                                                    @endif
                                                                                    <input type="hidden" id="old_file" name="old_file" value="{{ $val->file }}">
                                                                                    <input type="file" id="file" name="file" class="form-control">
                                                                                </div>

                                                                                <div class="mb-3">
                                                                                    <label for="file"
                                                                                        class="col-form-label">Audio Image</label>
                                                                                    @if (!empty($val->image))
                                                                                        <img src="{{ $val->image_link }}" alt="" height="100px" width="100px" style=" margin-bottom: 12px; ">
                                                                                    @endif
                                                                                    <input type="hidden" id="old_image" name="old_image" value="{{ $val->image }}">
                                                                                    <input type="file" id="image"
                                                                                        name="image" class="form-control">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="description"
                                                                                        class="col-form-label">Audio
                                                                                        Price:</label>
                                                                                    <input type="number" step="any" class="form-control" id="price" name="price" placeholder="Audio Price" value="{{ $val->price }}" required>
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
