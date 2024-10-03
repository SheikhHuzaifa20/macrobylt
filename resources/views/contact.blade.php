@extends('layouts.main')

@section('content')
    <section class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1>Contact Us</h1>
                        <h5>HOME<span>/</span><a href="#"> CONTACT US</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-info">
                        <h2>FEEL FREE TO GET IN TOUCH</h2>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>First Name *</label>
                                        <input style="color: white;" type="text" name="fname" class="form-control" placeholder=""
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <label>last Name *</label>
                                        <input style="color: white;" type="text" name="lname" class="form-control" placeholder=""
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address *</label>
                                        <input style="color: white;" type="email" name="email" class="form-control" placeholder=""
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number *</label>
                                        <input style="color: white;" type="number" name="phone" class="form-control" placeholder=""
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Message (optional)</label>
                                        <textarea style="color: white;" name="message" id="textarea" cols="30" rows="7" class="form-control" placeholder=""
                                            required=""></textarea>
                                    </div>
                                    <input type="button" id="submitBtn" value="SUBMIT" class="btn form-btn form-control">
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
                        'X-CSRF-TOKEN': csrfToken // Add CSRF token to request headers
                    },
                    success: function(response) {
                        if (response.status) {
                            // Success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message
                            }).then(function() {
                                $('#contactForm')[0].reset();
                            });
                        } else if (response.validation) {
                            // Error message with validation errors
                            var errorMessage = "Validation Error:\n\n";
                            $.each(response.errors, function(key, value) {
                                errorMessage += key + ": " + value[0] + "\n";
                            });

                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: errorMessage
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
