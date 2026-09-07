@extends('layouts.main')

@section('content')
    <section class="inner-banner py-5" style="background: linear-gradient(135deg, #161b22 0%, #0d1117 100%); color: #fff;">
        <div class="container">
            <div class="row text-center py-4">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1 class="display-4 font-weight-bold text-uppercase mb-2" style="letter-spacing: 1px;">CONTACT GADGETGROVE SUPPORT</h1>
                        <p class="text-muted lead">Have a question about our chargers, power banks, or orders? We're here to help.</p>
                        <h6 class="text-white-50"><a href="{{ route('home') }}" class="text-decoration-none" style="color: #00d2ff;">HOME</a> <span class="mx-2">/</span> CONTACT US</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm p-4 text-center h-100" style="border-radius: 16px; background: #ffffff;">
                        <div class="icon-box mb-3" style="font-size: 2.5rem; color: #00d2ff;">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <h5 class="font-weight-bold mb-2">Email Customer Support</h5>
                        <p class="text-muted small mb-3">Response time within 24 hours</p>
                        <a href="mailto:support@gadgetgrove.com" class="font-weight-bold" style="color: #00d2ff;">support@gadgetgrove.com</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm p-4 text-center h-100" style="border-radius: 16px; background: #ffffff;">
                        <div class="icon-box text-danger mb-3" style="font-size: 2.5rem;">
                            <i class="fa-solid fa-mobile-screen-button"></i>
                        </div>
                        <h5 class="font-weight-bold mb-2">Toll-Free Phone Hotline</h5>
                        <p class="text-muted small mb-3">Mon-Fri 9:00 AM - 6:00 PM EST</p>
                        <a href="tel:+18005550199" class="font-weight-bold text-danger">+1 (800) 555-0199</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card border-0 shadow-sm p-4 text-center h-100" style="border-radius: 16px; background: #ffffff;">
                        <div class="icon-box text-success mb-3" style="font-size: 2.5rem;">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <h5 class="font-weight-bold mb-2">Headquarters Address</h5>
                        <p class="text-muted small mb-3">Corporate & Warranty Center</p>
                        <span class="font-weight-bold text-dark">123 Tech Avenue, Silicon Valley, CA</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-info bg-white p-5 shadow-sm" style="border-radius: 20px;">
                        <h3 class="font-weight-bold mb-4 text-uppercase text-center">SEND US A MESSAGE</h3>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">First Name *</label>
                                        <input type="text" name="fname" class="form-control py-3" style="border-radius: 10px; color: #222; background: #f8f9fa;" placeholder="Enter your first name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Last Name *</label>
                                        <input type="text" name="lname" class="form-control py-3" style="border-radius: 10px; color: #222; background: #f8f9fa;" placeholder="Enter your last name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Email Address *</label>
                                        <input type="email" name="email" class="form-control py-3" style="border-radius: 10px; color: #222; background: #f8f9fa;" placeholder="name@example.com" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Phone Number *</label>
                                        <input type="text" name="phone" class="form-control py-3" style="border-radius: 10px; color: #222; background: #f8f9fa;" placeholder="+1 (555) 000-0000" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold text-dark">Message / Inquiry *</label>
                                        <textarea name="message" id="textarea" cols="30" rows="5" class="form-control p-3" style="border-radius: 10px; color: #222; background: #f8f9fa;" placeholder="How can our support team assist you today?" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="button" id="submitBtn" class="btn px-5 py-3 font-weight-bold shadow-lg" style="border-radius: 30px; font-size: 1.1rem; background: linear-gradient(135deg, #0099cc, #00d2ff); color: #fff; border: none;">
                                        SEND MESSAGE <i class="fa-solid fa-paper-plane ml-2"></i>
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
        .red-btn {
            background: linear-gradient(135deg, #0099cc, #00d2ff);
            color: #ffffff;
            border: none;
            transition: background 0.3s ease;
        }
        .red-btn:hover {
            background: linear-gradient(135deg, #007aa3, #0099cc);
            color: #ffffff;
        }
        .icon-box { color: #00d2ff; }
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
