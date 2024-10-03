@extends('layouts.main')

@section('content')
    <section class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="banner-profile-img">
                        <figure>
                            <img src="{{ $audio->image_link ?? '' }}" class="img-fluid" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="member-info">
                        <h4>Audio Details</h4>
                        <ul>
                            <li>
                                <p>Audio Title </p>
                                <p> {{ $audio->audio_title ?? '' }}</p>
                            </li>
                            <li>
                                <p>Audio Description</p>
                                <p> {{ $audio->description ?? '' }}</p>
                            </li>
                            <li>
                                <p>Audio Language </p>
                                <p> {{ $audio->language ?? '' }}</p>
                            </li>
                            <li>
                                <p>Audio Genre</p>
                                <p> {{ $audio->genre ?? '' }}</p>
                            </li>
                            <li>
                                <p>Audio Freestyle Name</p>
                                <p> {{ $audio->free_style_name ?? '' }}</p>
                            </li>
                            <li>
                                <p>Artist Name</p>
                                <p> {{ $audio->auth->name ?? '' }}</p>
                            </li>
                        </ul>
                    </div>

                    @if (Auth::user()->role == 3)
                        <form method="POST" action="{{ route('save_cart') }}" id="add-cart">
                            @csrf
                            <input type="hidden" name="audio_id" id="audio_id" value="{{ $audio->id }}">
                            <div>
                                <button type="submit" id="addCart" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>

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

@section('css')
    <style>
        .audio-details p {
            color: white;
        }
    </style>
@endsection

@section('js')
    <script></script>
@endsection
