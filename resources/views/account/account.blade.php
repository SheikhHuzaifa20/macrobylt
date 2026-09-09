@extends('layouts.main')
@section('title', 'Account Details')
@section('content')

    <?php $segment = Request::segments(); ?>

    <section class="inner-banner py-4" style="background: linear-gradient(135deg, #161b22 0%, #0d1013 100%); border-bottom: 1px solid rgba(0, 210, 255, 0.15);">
        <div class="container">
            <div class="row text-center py-3">
                <div class="col-12">
                    <span class="text-uppercase font-weight-bold px-3 py-1 mb-2 d-inline-block rounded-pill" style="background: rgba(0, 210, 255, 0.1); color: #00d2ff; border: 1px solid rgba(0, 210, 255, 0.3); font-size: 0.8rem; letter-spacing: 2px;">
                        MY ACCOUNT
                    </span>
                    <h1 class="mb-2" style="font-family: 'Bebas Neue', sans-serif; color: #ffffff; font-size: 2.5rem; letter-spacing: 2px;">ACCOUNT SETTINGS</h1>
                    <p style="color: #94a3b8; font-size: 0.95rem;">Manage your profile and account preferences</p>
                </div>
            </div>
        </div>
    </section>

    <main style="background: linear-gradient(180deg, #0d1013 0%, #0a0f1d 100%); min-height: 80vh; padding: 40px 0;">
        <div class="container">
            <div class="row">
                @include('account.sidebar')

                <div class="col-lg-9 col-md-8">
                    <div class="p-4 p-md-5" style="background: #161b22; border: 1px solid rgba(0,210,255,0.15); border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">

                        {{-- Profile Image --}}
                        <div class="mb-5">
                            <h4 class="text-uppercase font-weight-bold mb-3" style="font-family: 'Bebas Neue', sans-serif; color: #00d2ff; letter-spacing: 1.5px; font-size: 1.4rem;">
                                <i class="fa-solid fa-image mr-2"></i> Profile Image
                            </h4>
                            <div style="height: 1px; background: linear-gradient(90deg, rgba(0,210,255,0.3), transparent); margin-bottom: 20px;"></div>
                            <form action="{{ route('uploadPicture') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex align-items-center flex-wrap gap-3">
                                    <input type="file" name="pic" id="profile_image" class="acc-file-input"
                                        style="background: #0d1013; border: 1px solid rgba(0,210,255,0.2); border-radius: 10px; padding: 10px 16px; color: #cbd5e1; font-size: 0.9rem;">
                                    <button type="submit" style="background: linear-gradient(135deg, #0099cc, #00d2ff); border: none; color: #fff; border-radius: 25px; padding: 10px 24px; font-weight: 700; font-size: 0.9rem; letter-spacing: 0.5px; box-shadow: 0 4px 15px rgba(0,210,255,0.25); cursor: pointer; transition: all 0.3s ease;">
                                        <i class="fa-solid fa-upload mr-2"></i> Upload
                                    </button>
                                </div>
                                @if($profile->pic)
                                    <div class="mt-3 d-flex align-items-center gap-3">
                                        <img src="{{ $profile->pic }}" style="height: 60px; width: 60px; border-radius: 50%; border: 2px solid #00d2ff; object-fit: cover;">
                                        <span style="color: #94a3b8; font-size: 0.9rem;">{{ Auth::user()->name }}'s profile image</span>
                                    </div>
                                @else
                                    <p class="mt-2" style="color: #64748b; font-size: 0.85rem;">No profile image uploaded yet</p>
                                @endif
                            </form>
                        </div>

                        {{-- Account Details Form --}}
                        <div>
                            <h4 class="text-uppercase font-weight-bold mb-3" style="font-family: 'Bebas Neue', sans-serif; color: #00d2ff; letter-spacing: 1.5px; font-size: 1.4rem;">
                                <i class="fa-solid fa-user mr-2"></i> Account Details
                            </h4>
                            <div style="height: 1px; background: linear-gradient(90deg, rgba(0,210,255,0.3), transparent); margin-bottom: 25px;"></div>

                            <form action="{{ route('update.account') }}" method="post" enctype="multipart/form-data" id="accountForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="d-block text-uppercase font-weight-bold mb-2" style="color: #94a3b8; font-size: 0.8rem; letter-spacing: 1px;">Name</label>
                                        <input type="text" class="acc-input form-control" id="name" name="name" placeholder="Your name" value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="d-block text-uppercase font-weight-bold mb-2" style="color: #94a3b8; font-size: 0.8rem; letter-spacing: 1px;">Age</label>
                                        <input type="text" class="acc-input form-control" id="age" name="age" placeholder="Your age" value="{{ $profile->age ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="d-block text-uppercase font-weight-bold mb-2" style="color: #94a3b8; font-size: 0.8rem; letter-spacing: 1px;">Gender</label>
                                        <select name="gender" class="acc-input form-control" id="gender">
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="male" {{ $profile->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ $profile->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="d-block text-uppercase font-weight-bold mb-2" style="color: #94a3b8; font-size: 0.8rem; letter-spacing: 1px;">Email</label>
                                        <input type="email" class="acc-input form-control" name="email" placeholder="Email address" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="d-block text-uppercase font-weight-bold mb-2" style="color: #94a3b8; font-size: 0.8rem; letter-spacing: 1px;">Address</label>
                                        <input type="text" class="acc-input form-control" name="address" placeholder="Your address" value="{{ $profile->address ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="d-block text-uppercase font-weight-bold mb-2" style="color: #94a3b8; font-size: 0.8rem; letter-spacing: 1px;">Domain</label>
                                        <input type="text" class="acc-input form-control" name="domain" placeholder="Your domain" value="{{ $profile->domain ?? '' }}">
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label class="d-block text-uppercase font-weight-bold mb-2" style="color: #94a3b8; font-size: 0.8rem; letter-spacing: 1px;">About Me</label>
                                        <textarea class="acc-input form-control" name="bio" rows="4" placeholder="Write something about yourself...">{{ $profile->bio ?? '' }}</textarea>
                                    </div>
                                </div>

                                <div style="height: 1px; background: linear-gradient(90deg, rgba(0,210,255,0.2), transparent); margin-bottom: 25px;"></div>

                                <h5 class="text-uppercase font-weight-bold mb-4" style="color: #94a3b8; font-size: 1rem; letter-spacing: 1px;">
                                    <i class="fa-solid fa-lock mr-2" style="color: #00d2ff;"></i> Change Password
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="d-block text-uppercase font-weight-bold mb-2" style="color: #94a3b8; font-size: 0.8rem; letter-spacing: 1px;">New Password</label>
                                        <input type="password" class="acc-input form-control" id="new-pwd" placeholder="New password" name="password">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="d-block text-uppercase font-weight-bold mb-2" style="color: #94a3b8; font-size: 0.8rem; letter-spacing: 1px;">Confirm Password</label>
                                        <input type="password" class="acc-input form-control" id="confirm-pwd" placeholder="Confirm password" name="password_confirmation">
                                    </div>
                                </div>

                                <button class="font-weight-bold text-uppercase" id="updateProfile"
                                    style="background: linear-gradient(135deg, #0099cc, #00d2ff); border: none; color: #fff; border-radius: 30px; padding: 13px 36px; font-size: 1rem; letter-spacing: 1.5px; box-shadow: 0 4px 20px rgba(0,210,255,0.3); cursor: pointer; transition: all 0.3s ease;">
                                    <i class="fa-solid fa-floppy-disk mr-2"></i> Save Changes
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('css')
    <style>
        .acc-input {
            background: #0d1013 !important;
            border: 1px solid rgba(255,255,255,0.1) !important;
            border-radius: 12px !important;
            color: #ffffff !important;
            padding: 12px 16px !important;
            font-size: 0.95rem !important;
            transition: all 0.3s ease !important;
        }
        .acc-input::placeholder { color: #64748b !important; }
        .acc-input:focus {
            background: #111827 !important;
            border-color: #00d2ff !important;
            box-shadow: 0 0 15px rgba(0,210,255,0.25) !important;
        }
        #updateProfile:hover {
            background: linear-gradient(135deg, #00b4d8, #00f0ff) !important;
            box-shadow: 0 8px 25px rgba(0,210,255,0.45) !important;
            transform: translateY(-2px);
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).on('click', "#updateProfile", function(e) {
            e.preventDefault();
            $('#accountForm').submit();
        });
    </script>
@endsection
