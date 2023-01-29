@extends('frontend.main_master')
@section('title')
    Web Developer
@endsection
@section('content')

    <!-- ===============||Start Loading||=============== -->
    <div id="loading">
        <div class="loading">
            <span>Loading...</span>
        </div>
    </div>
    <!-- ===============||End Loading||=============== -->
    <!-- ===============||Start Main-Menu Area||=============== -->
    @include('frontend.body.header')
    <!-- ===============End Main Menu Area||=============== -->
    <!-- ===============||Start banner Area||=============== -->
    <section class="home-banner-area">
        <div class="slider-area">
            <div class="slider-active">
                <div class="single-slider">
                    <div class="slider-title">
                        <div class="table-cell">
                            <div class="heading wow fadeInLeft" data-wow-duration="1s">
                                <p>Hi! I'm</p>
                                <h1 class="animatee">{{ $home->name }}</h1>
                            </div>
                            <div class="animated-headline">
                                <p class="cd-headline clip is-full-width wow fadeInUp" data-wow-duration="1s"
                                   data-wow-delay=".6s">
                                    I am a
                                    <span class="cd-words-wrapper">
										<b class="is-visible">{{ $home->experience_one }}</b>
										<b>{{ $home->experience_two }}</b>
										<b>{{ $home->experience_three }}</b>
									</span>
                                </p>
                            </div>
                            <div class="center">
                                <a href="#about">
                                    <div class="down"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===============||End banner Area||=============== -->
    <!-- ===============||Start About Area||=============== -->
    <section id="about" class="about-area" style="background-image: url({{ asset('frontend/images/abuot_bg.jpg') }});">
        <div class="container-fluid">
            <div class="about-area-con">
                <div class="container">
                    <div class="intru-con pt-40 pb-60">

                        <!-- Start Main-Section -->
                    @include('frontend.about.about')
                    <!-- End Main-Section -->

                        <!-- Start About tabs -->
                        <div class="row">
                            <div class="about-tabs" id="skill">
                                <span class="tab-item outer-shadow active" data-target=".skills">skills</span>
                                <span class="tab-item" data-target=".experience">experience</span>
                                <span class="tab-item" data-target=".education">education</span>
                            </div>
                        </div>
                        <!-- End About tabs -->

                        <!-- Skill Start -->
                    @include('frontend.about.skills')
                    <!-- Skill End -->

                        <!-- Experience Start -->
                    @include('frontend.about.experience')
                    <!-- Experience End -->

                        <!-- Education Start -->
                    @include('frontend.about.education')
                    <!-- Education End -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===============||End About Area||=============== -->

    <!-- portfolio section Start -->
    @include('frontend.portfolio.portfolio')
    <!-- portfolio section end -->
    <!-- ===============||Start Counter-Up Area||=============== -->
    <section class="counting-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="couting">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <h2 class="count">135</h2>
                        <p>Happy Clients</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="couting">
                        <i class="fa fa-code" aria-hidden="true"></i>
                        <h2 class="count">160</h2>
                        <p>Project</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="couting">
                        <i class="fa fa-coffee" aria-hidden="true"></i>
                        <h2 class="count">216</h2>
                        <p>Cups of Coffee</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===============||End Counter-Up Area||=============== -->

    <!-- ===============||Start Post Area||=============== -->
    @include('frontend.post.post_main')
    <!-- ===============||End Post Area||=============== -->

    <!-- ===============||Start Testimonials Area||=============== -->

    <section id="blog" class="testimonials_area section-gap">
        <div class="container">
            <div class="testi_slider owl-carousel">
                <div class="item">
                    <div class="testi_item">
                        <img src="{{ asset('frontend') }}/images/teem/teem-1.jpg" alt="" />
                        <h4>Fanny Spencer</h4>
                        <ul class="list">
                            <li>
                                <a href="#"><i class="fa fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-dribbble"></i></a>
                            </li>
                        </ul>
                        <div class="wow fadeIn" data-wow-duration="1s">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Quia, blanditiis vero eaque corporis laboriosam atque id
                                dolorum veritatis natus doloribus <br />
                                animi dolor, fugit nam, repellendus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/teem/teem-1.jpg" alt="" />
                        <h4>Fanny Spencer</h4>
                        <ul class="list">
                            <li>
                                <a href="#"><i class="fa fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-dribbble"></i></a>
                            </li>
                        </ul>
                        <div class="wow fadeIn" data-wow-duration="1s">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Quia, blanditiis vero eaque corporis laboriosam atque id
                                dolorum veritatis natus doloribus <br />
                                animi dolor, fugit nam, repellendus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/teem/teem-1.jpg" alt="" />
                        <h4>Fanny Spencer</h4>
                        <ul class="list">
                            <li>
                                <a href="#"><i class="fa fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-dribbble"></i></a>
                            </li>
                        </ul>
                        <div class="wow fadeIn" data-wow-duration="1s">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Quia, blanditiis vero eaque corporis laboriosam atque id
                                dolorum veritatis natus doloribus <br />
                                animi dolor, fugit nam, repellendus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/teem/teem-1.jpg" alt="" />
                        <h4>Fanny Spencer</h4>
                        <ul class="list">
                            <li>
                                <a href="#"><i class="fa fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-dribbble"></i></a>
                            </li>
                        </ul>
                        <div class="wow fadeIn" data-wow-duration="1s">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Quia, blanditiis vero eaque corporis laboriosam atque id
                                dolorum veritatis natus doloribus <br />
                                animi dolor, fugit nam, repellendus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/teem/teem-1.jpg" alt="" />
                        <h4>Fanny Spencer</h4>
                        <ul class="list">
                            <li>
                                <a href="#"><i class="fa fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-dribbble"></i></a>
                            </li>
                        </ul>
                        <div class="wow fadeIn" data-wow-duration="1s">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Quia, blanditiis vero eaque corporis laboriosam atque id
                                dolorum veritatis natus doloribus <br />
                                animi dolor, fugit nam, repellendus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <img src="{{ asset('frontend') }}/images/teem/teem-1.jpg" alt="" />
                        <h4>Fanny Spencer</h4>
                        <ul class="list">
                            <li>
                                <a href="#"><i class="fa fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-brands fa-dribbble"></i></a>
                            </li>
                        </ul>
                        <div class="wow fadeIn" data-wow-duration="1s">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Quia, blanditiis vero eaque corporis laboriosam atque id
                                dolorum veritatis natus doloribus <br />
                                animi dolor, fugit nam, repellendus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===============||End Testimonials Area||=============== -->

    <!-- ===============||Start contact-page Area||=============== -->
    @include('frontend.contact.contact')
    <!-- ===============||End contact-page Area||=============== -->
    <!-- ===============||start footer Area||=============== -->
    @include('frontend.body.footer')
    <!-- ===============||End footer Area||=============== -->

    <!-- portfolio popup start -->
    <div class="pp portfolio-popup">
        <div class="pp-details">
            <div class="pp-details-inner">
                <div class="pp-title">
                    <h2>personal portfolio</h2>
                    <p>
                        category -
                        <span class="pp-project-category">web application</span>
                    </p>
                </div>
                <div class="pp-project-details">
                    <div class="row">
                        <div class="description">
                            <h3>project brief:</h3>
                            <p>
                                Lorem, ipsum dolor sit amet, consectetur adipisicing elit.
                                Placeat illo, quae praesentium architecto amet earum, quos
                                aspernatur eligendi ipsa accusamus cumque unde, delectus non
                                id deserunt repellendus exercitationem deleniti mollitia cum
                                natus? Labore nulla repellat atque adipisci libero corrupti
                                doloribus, ab magnam accusamus. Quae velit atque, maiores
                                repellendus neque repellat.
                            </p>
                        </div>
                        <div class="info">
                            <h3>project info</h3>
                            <ul>
                                <li>date - <span>05 may 2021</span></li>
                                <li>client - <span>xyz</span></li>
                                <li>tools - <span>html, css, javascript</span></li>
                                <li>
                                    web -
                                    <span><a href="http://tusherwebpro.xyz/">Tusher</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="separator"></div>

        <div class="pp-main">
            <div class="pp-main-inner">
                <div class="pp-project-details-btn outer-shadow hover-in-shadow">
                    project details <i class="fas fa-plus"></i>
                </div>
                <div class="pp-close outer-shadow hover-in-shadow">&times;</div>
                <img src="{{ asset('frontend') }}/images/portfolio/large/project-1/1.png" alt="img" class="pp-img outer-shadow" />
                <div class="pp-counter">1 out of 6</div>
            </div>
            <div class="pp-loader">
                <div></div>
            </div>
            <!-- pp navigation -->
            <div class="pp-prev"><i class="fas fa-play"></i></div>
            <div class="pp-next"><i class="fas fa-play"></i></div>
        </div>
    </div>
    <!-- portfolio popup end -->


@endsection

