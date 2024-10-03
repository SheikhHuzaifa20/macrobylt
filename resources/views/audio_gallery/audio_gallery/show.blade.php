@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Audio_gallery {{ $audio_gallery->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/audio_gallery') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $audio_gallery->id }}</td>
                            </tr>
                            <tr><th> Category </th><td> {{ $audio_gallery->category }} </td></tr><tr><th> Audio Title </th><td> {{ $audio_gallery->audio_title }} </td></tr><tr><th> Description </th><td> {{ $audio_gallery->description }} </td></tr>
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

