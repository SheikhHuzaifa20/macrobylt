@extends('layouts.app')

@push('before-css')
    <link rel="stylesheet" href="{{asset('assets/css/datatables.min.css')}}">
@endpush

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Audio_gallery</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Home</li>
                    <li class="breadcrumb-item active">Audio_gallery</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-4 col-12">
        <div class="btn-group float-md-right">
            <a class="btn btn-info mb-1" href="{{ url('/audio_gallery/create') }}">Add Audio_gallery</a>
        </div>
    </div>
</div>

<section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Audio_gallery Info</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Audio Title</th><th>Genre</th><th>Description</th><th>Hot List</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($audio_gallery as $item)
                                    <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->audio_title }}</td><td>{{ $item->genre }}</td><td>{{ $item->description }}</td>
                                    <td style=" text-align: center; ">
                                        <a href="javascript:void(0)" title="Hot List">
                                            <button class="btn btn-primary btn-sm update-hot-list" data-user-id="{{ $item->id }}" data-hot-list="{{ $item->hot_list == 1 ? 0 : 1 }}">
                                                @if($item->hot_list == 1)
                                                    <i class="fa-solid fa-star"></i>
                                                @else
                                                    <i class="fa-regular fa-star"></i>
                                                @endif
                                            </button>
                                        </a>       
                                    </td>
                                    <td>

                                        
                                            <a href="{{ url('/audio_gallery/' . $item->id . '/edit') }}"
                                               title="Edit Audio_gallery">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Edit
                                                </button>
                                            </a>
                                        

                                        
                                            {!! Form::open([
                                       'method'=>'DELETE',
                                       'url' => ['/audio_gallery', $item->id],
                                       'style' => 'display:inline'
                                   ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Delete Audio_gallery',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                        
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th><th>Audio Title</th><th>Description</th><th>Hot List</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection



@push('js')
    <script src="{{asset('assets/js/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(".zero-configuration").DataTable({
                "order": [
                    [0, 'desc']
                ],
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
        })
    </script>
    <script>
        // $(document).ready(function () {
            $('.update-hot-list').click(function () {
                console.log(123);
                var button = $(this);
                var userId = $(this).data('user-id');
                var hot_list = $(this).data('hot-list');
    
                $.ajax({
                    url: '{{ route('update.hot_list') }}',
                    type: 'POST',
                    data: {
                        user_id: userId,
                        hot_list: hot_list,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        if (hot_list == 1) {
                            button.find('i').removeClass('fa-regular fa-star').addClass('fa-solid fa-star');
                        } else {
                            button.find('i').removeClass('fa-solid fa-star').addClass('fa-regular fa-star');
                        }
                        // Update the data-featured attribute to the new featured
                        button.data('hot-list', hot_list == 1 ? 0 : 1);
                    },
                    error: function (xhr, hot_list, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });
        // });
    </script>
@endpush