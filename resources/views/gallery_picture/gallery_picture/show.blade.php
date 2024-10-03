@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Gallery_picture {{ $gallery_picture->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/gallery_picture/gallery_picture') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $gallery_picture->id }}</td>
                            </tr>
                            <tr><th> Artist Id </th><td> {{ $gallery_picture->artist_id }} </td></tr><tr><th> Description </th><td> {{ $gallery_picture->description }} </td></tr><tr><th> Image </th><td> {{ $gallery_picture->image }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.footer')
</div>
@endsection

