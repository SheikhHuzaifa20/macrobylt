<section class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="news-subscribe">
                    <div class="newsletter-heading">
                        <h4>Subscribe Newsletter</h4>
                        <p>Submit your email & get our latest news monthly</p>
                    </div>
                    <form class="subscribeForm" style="width: 100%">
                         @csrf
                        <div class="email-sub">
                            <input type="email" name="newsletter_email" class="form-control"
                                placeholder="Your email address" required="">
                            <button type="button" class="btn blue-btn subscribeBtn"><i
                                    class="fa-solid fa-envelope"></i>
                                SUBMIT
                                NEWSLETTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
