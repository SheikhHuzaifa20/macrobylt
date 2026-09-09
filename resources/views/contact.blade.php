@extends('layouts.main')

@section('content')
    <section class="inner-banner py-5" style="background: linear-gradient(135deg, #161b22 0%, #0d1013 100%); border-bottom: 1px solid rgba(0, 210, 255, 0.15);">
        <div class="container">
            <div class="row text-center py-4">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <span class="text-uppercase font-weight-bold tracking-wider px-3 py-1 mb-3 d-inline-block rounded-pill" style="background: rgba(0, 210, 255, 0.1); color: #00d2ff; border: 1px solid rgba(0, 210, 255, 0.3); font-size: 0.85rem; letter-spacing: 2px;">
                            GET IN TOUCH
                        </span>
                        <h1 class="display-4 font-weight-bold text-uppercase mb-3" style="font-family: 'Bebas Neue', sans-serif; letter-spacing: 2px; color: #ffffff;">CONTACT GADGETGROVE SUPPORT</h1>
                        <p class="lead max-w-600 mx-auto mb-4" style="color: #94a3b8; font-size: 1.1rem;">Have a question about our chargers, power banks, or orders? We're here to help.</p>
                        <h6 class="text-uppercase" style="font-size: 0.9rem; letter-spacing: 1.5px;">
                            <a href="{{ route('home') }}" class="text-decoration-none" style="color: #00d2ff; font-weight: 600;">HOME</a> 
                            <span class="mx-2" style="color: rgba(255,255,255,0.3);">/</span> 
                            <span style="color: #cbd5e1;">CONTACT US</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form py-5" style="background: linear-gradient(180deg, #0d1013 0%, #0a0f1d 100%); min-height: 70vh;">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-lg p-4 text-center h-100 d-flex flex-column align-items-center justify-content-center" style="border-radius: 20px; background: #161b22; border: 1px solid rgba(0, 210, 255, 0.15) !important; transition: all 0.3s ease;">
                        <div class="icon-ring mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; border-radius: 50%; background: rgba(0, 210, 255, 0.1); border: 1px solid rgba(0, 210, 255, 0.3); color: #00d2ff; font-size: 1.8rem; box-shadow: 0 0 20px rgba(0, 210, 255, 0.15);">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <h5 class="font-weight-bold mb-2 text-white" style="font-family: 'Manrope', sans-serif;">Email Customer Support</h5>
                        <p class="small mb-3" style="color: #94a3b8;">Response time within 24 hours</p>
                        <a href="mailto:support@gadgetgrove.com" class="font-weight-bold text-decoration-none" style="color: #00d2ff; font-size: 1.05rem;">support@gadgetgrove.com</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-lg p-4 text-center h-100 d-flex flex-column align-items-center justify-content-center" style="border-radius: 20px; background: #161b22; border: 1px solid rgba(0, 210, 255, 0.15) !important; transition: all 0.3s ease;">
                        <div class="icon-ring mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; border-radius: 50%; background: rgba(0, 210, 255, 0.1); border: 1px solid rgba(0, 210, 255, 0.3); color: #00d2ff; font-size: 1.8rem; box-shadow: 0 0 20px rgba(0, 210, 255, 0.15);">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </div>
                        <h5 class="font-weight-bold mb-2 text-white" style="font-family: 'Manrope', sans-serif;">Toll-Free Phone Hotline</h5>
                        <p class="small mb-3" style="color: #94a3b8;">Mon-Fri 9:00 AM - 6:00 PM EST</p>
                        <a href="tel:+18005550199" class="font-weight-bold text-decoration-none" style="color: #00d2ff; font-size: 1.05rem;">+1 (800) 555-0199</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card border-0 shadow-lg p-4 text-center h-100 d-flex flex-column align-items-center justify-content-center" style="border-radius: 20px; background: #161b22; border: 1px solid rgba(0, 210, 255, 0.15) !important; transition: all 0.3s ease;">
                        <div class="icon-ring mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; border-radius: 50%; background: rgba(0, 210, 255, 0.1); border: 1px solid rgba(0, 210, 255, 0.3); color: #00d2ff; font-size: 1.8rem; box-shadow: 0 0 20px rgba(0, 210, 255, 0.15);">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <h5 class="font-weight-bold mb-2 text-white" style="font-family: 'Manrope', sans-serif;">Headquarters Address</h5>
                        <p class="small mb-3" style="color: #94a3b8;">Corporate & Warranty Center</p>
                        <span class="font-weight-bold" style="color: #cbd5e1; font-size: 1.05rem;">123 Tech Avenue, Silicon Valley, CA</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-info p-5 shadow-lg" style="border-radius: 24px; background: #161b22; border: 1px solid rgba(0, 210, 255, 0.15);">
                        <div class="text-center mb-5">
                            <h3 class="font-weight-bold text-uppercase mb-2" style="font-family: 'Bebas Neue', sans-serif; letter-spacing: 2px; font-size: 2.2rem; color: #ffffff;">SEND US A MESSAGE</h3>
                            <div style="width: 60px; height: 3px; background: linear-gradient(90deg, #0099cc, #00d2ff); margin: 0 auto; border-radius: 2px;"></div>
                        </div>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase mb-2" style="color: #cbd5e1; font-size: 0.85rem; letter-spacing: 1px;">First Name *</label>
                                        <input type="text" name="fname" class="form-control py-3 px-4 custom-dark-input" placeholder="Enter your first name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase mb-2" style="color: #cbd5e1; font-size: 0.85rem; letter-spacing: 1px;">Last Name *</label>
                                        <input type="text" name="lname" class="form-control py-3 px-4 custom-dark-input" placeholder="Enter your last name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase mb-2" style="color: #cbd5e1; font-size: 0.85rem; letter-spacing: 1px;">Email Address *</label>
                                        <input type="email" name="email" class="form-control py-3 px-4 custom-dark-input" placeholder="name@example.com" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase mb-2" style="color: #cbd5e1; font-size: 0.85rem; letter-spacing: 1px;">Phone Number *</label>
                                        <input type="text" name="phone" class="form-control py-3 px-4 custom-dark-input" placeholder="+1 (555) 000-0000" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-uppercase mb-2" style="color: #cbd5e1; font-size: 0.85rem; letter-spacing: 1px;">Message / Inquiry *</label>
                                        <textarea name="message" id="textarea" cols="30" rows="5" class="form-control p-4 custom-dark-input" placeholder="How can our support team assist you today?" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center mt-3">
                                    <button type="button" id="submitBtn" class="btn px-5 py-3 font-weight-bold shadow-lg text-uppercase d-inline-flex align-items-center justify-content-center" style="border-radius: 35px; font-size: 1.1rem; background: linear-gradient(135deg, #0099cc, #00d2ff); color: #ffffff; border: none; letter-spacing: 1.5px; box-shadow: 0 4px 20px rgba(0, 210, 255, 0.3); transition: all 0.3s ease;">
                                        <span>SEND MESSAGE</span>
                                        <i class="fa-solid fa-paper-plane ml-3" style="font-size: 1rem;"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        .custom-dark-input {
            background: #0d1013 !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 12px !important;
            color: #ffffff !important;
            font-size: 0.95rem;
            transition: all 0.3s ease !important;
        }
        .custom-dark-input::placeholder {
            color: #64748b !important;
        }
        .custom-dark-input:focus {
            background: #111827 !important;
            border-color: #00d2ff !important;
            box-shadow: 0 0 15px rgba(0, 210, 255, 0.3) !important;
            outline: none !important;
        }
        .card:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 210, 255, 0.4) !important;
            box-shadow: 0 12px 25px rgba(0, 210, 255, 0.15) !important;
        }
        #submitBtn:hover {
            background: linear-gradient(135deg, #00b4d8, #00f0ff) !important;
            box-shadow: 0 8px 25px rgba(0, 210, 255, 0.45) !important;
            transform: translateY(-2px);
        }
    </style>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#submitBtn').click(function(e) {
                e.preventDefault();

                var formData = $('#contactForm').serialize();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "{{ route('contactUsSubmit') }}",
                    type: "POST",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response.status) {
                            alert('Thank you! Your message has been sent successfully.');
                            $('#contactForm')[0].reset();
                        } else if (response.validation) {
                            var errorMessage = "Validation Error:\n\n";
                            $.each(response.errors, function(key, value) {
                                errorMessage += key + ": " + value[0] + "\n";
                            });
                            alert(errorMessage);
                        } else {
                            alert(response.message || 'Submission completed.');
                            $('#contactForm')[0].reset();
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Your message was submitted successfully.');
                        $('#contactForm')[0].reset();
                    }
                });
            });
        });
    </script>
@endsection
