<section id="contact" class="contact-page-area" style="background-image: url({{ asset('frontend/images/contact.jpg') }});">
    <div class="contact-overlay">
        <div class="container contact-bg-glass">
            <div class="row">
                <div class="col-lg-4 col-md-4 contact-con wow fadeInUp" data-wow-duration="0.5s"
                     data-wow-delay="0.4s">
                    <div class="contact-title gray">
                        <h2>get in touch</h2>
                        <p>
                            If you want to know more about me, then just contact me in
                            below address
                        </p>
                    </div>
                    <div class="single-contact-address mt-20 d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-envelope"></span>
                        </div>
                        <div class="contact-details">
                            <h5>tusher4572@gmail.com</h5>
                        </div>
                    </div>
                    <div class="single-contact-address mt-20 d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-phone-handset"></span>
                        </div>
                        <div class="contact-details">
                            <h5>+880 1979 514 572</h5>
                        </div>
                    </div>
                    <div class="single-contact-address mt-20 d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-map-marker"></span>
                        </div>
                        <div class="contact-details">
                            <h5>
                                Rajendrapur Cantonment, Gazipur <br />
                                Dhaka, Bangladesh
                            </h5>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-1"></div> -->
                <div class="col-lg-8 col-md-8 contact-con wow fadeInUp" data-wow-duration="0.5s"
                     data-wow-delay="0.6s">
                    <div class="contact-title2 mb-60">
                        <h2>say something</h2>
                    </div>
                    <form class="form-area" action="{{ route('message') }}" method="post">
                        @csrf
                        <div class="row mb-50">
                            <div class="col-lg-6 form-group form-group-top">
                                <input type="text" name="name" placeholder="Enter your name"
                                       class="common-input form-control" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="email" name="email" placeholder="Enter email address"
                                       class="common-input form-control" />
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12 form-group">
{{--                                <input type="text" name="message" placeholder="Messege">--}}
                                <textarea class="common-textarea form-control" name="message"
                                          placeholder="Messege"></textarea>
                                @error('message')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-12 text-right">
                                <button type="submit" class="primary-btn text-uppercase">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
