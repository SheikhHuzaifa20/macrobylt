@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Favorite_dj {{ $favorite_dj->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/favorite_dj/favorite_dj') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $favorite_dj->id }}</td>
                            </tr>
                            <tr><th> Dj Id </th><td> {{ $favorite_dj->dj_id }} </td></tr><tr><th> Description </th><td> {{ $favorite_dj->description }} </td></tr><tr><th> Image </th><td> {{ $favorite_dj->image }} </td></tr>
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

