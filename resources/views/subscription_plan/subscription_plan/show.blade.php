@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Subscription_plan {{ $subscription_plan->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/subscription_plan/subscription_plan') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $subscription_plan->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $subscription_plan->name }} </td></tr><tr><th> Price </th><td> {{ $subscription_plan->price }} </td></tr><tr><th> Type </th><td> {{ $subscription_plan->type }} </td></tr>
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

