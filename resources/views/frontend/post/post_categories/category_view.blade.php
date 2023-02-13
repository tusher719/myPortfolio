@extends('frontend.main_master')
@section('title')
    Post-List
@endsection
@section('content')
    <!-- ===============||Start Main-Menu Area||=============== -->
    @include('frontend.body.header')
    <!-- ===============End Main Menu Area||=============== -->

    <!-- start banner Area -->
    <section class="banner-area relative blog-home-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content blog-header-content text-center col-lg-12">
                    <h1 class="text-white">{{ $cat_name->blog_category_name }} Category</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start top-category-widget Area -->
    <section class="top-category-widget-area pt-90 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-cat-widget">
                        <div class="content relative">
                            <div class="overlay overlay-bg"></div>
                            <a href="#" target="_blank">
                                <div class="thumb">
                                    <img class="content-image img-fluid d-block mx-auto"
                                         src="{{ asset('frontend') }}/images/blog/cat-widget1.jpg" alt="" />
                                </div>
                                <div class="content-details">
                                    <h4 class="content-title mx-auto text-uppercase">
                                        Social life
                                    </h4>
                                    <span></span>
                                    <p>Enjoy your social life together</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-cat-widget">
                        <div class="content relative">
                            <div class="overlay overlay-bg"></div>
                            <a href="#" target="_blank">
                                <div class="thumb">
                                    <img class="content-image img-fluid d-block mx-auto"
                                         src="{{ asset('frontend') }}/images/blog/cat-widget2.jpg" alt="" />
                                </div>
                                <div class="content-details">
                                    <h4 class="content-title mx-auto text-uppercase">
                                        Politics
                                    </h4>
                                    <span></span>
                                    <p>Be a part of politics</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-cat-widget">
                        <div class="content relative">
                            <div class="overlay overlay-bg"></div>
                            <a href="#" target="_blank">
                                <div class="thumb">
                                    <img class="content-image img-fluid d-block mx-auto"
                                         src="{{ asset('frontend') }}/images/blog/cat-widget3.jpg" alt="" />
                                </div>
                                <div class="content-details">
                                    <h4 class="content-title mx-auto text-uppercase">Food</h4>
                                    <span></span>
                                    <p>Let the food be finished</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-category-widget Area -->

    <!-- Start post-content Area -->
    <section class="post-content-area">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    @foreach($catpost as $item)
                        <div class="single-post row">
                            <div class="col-lg-3 col-md-3 meta-details">
                                <ul class="tags">
                                    <li><a href="#">Food,</a></li>
                                    <li><a href="#">Technology,</a></li>
                                    <li><a href="#">Politics,</a></li>
                                    <li><a href="#">Lifestyle</a></li>
                                </ul>
                                <h5 class="mb-2">{{ $cat_name->blog_category_name }}</h5>
                                <div class="user-details row">
                                    <p class="user-name col-lg-12 col-md-12 col-6">
                                        <a href="#">Tusher</a>
                                        <span class="lnr lnr-user"></span>
                                    </p>
                                    <p class="date col-lg-12 col-md-12 col-6">
                                        <a href="#">{{ Carbon\Carbon::parse($item->created_at)->format('d M, Y')  }}</a>
                                        <span class="lnr lnr-calendar-full"></span>
                                    </p>
                                    <p class="view col-lg-12 col-md-12 col-6">
                                        <a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span>
                                    </p>
                                    <p class="comments col-lg-12 col-md-12 col-6">
                                        <a href="#">06 Comments</a>
                                        <span class="lnr lnr-bubble"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="feature-img">
                                    <img class="img-fluid" src="{{ asset($item->post_image) }}" alt="" />
                                </div>
                                <a class="posts-title" href="{{ url('blog/'.$item->id ) }}">
                                    <h3>{{ $item->post_title }}</h3>
                                </a>
                                <p class="excert">
                                    {!! Str::limit($item->post_details, 250 )  !!}
                                </p>
                                <a href="{{ url('blog/'.$item->id ) }}" class="primary-btn">View More</a>
                            </div>
                        </div>
                    @endforeach
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
									<span aria-hidden="true">
										<span class="lnr lnr-chevron-left"></span>
									</span>
                                </a>
                            </li>
                            <li class="page-item"><a href="#" class="page-link">01</a></li>
                            <li class="page-item active">
                                <a href="#" class="page-link">02</a>
                            </li>
                            <li class="page-item"><a href="#" class="page-link">03</a></li>
                            <li class="page-item"><a href="#" class="page-link">04</a></li>
                            <li class="page-item"><a href="#" class="page-link">09</a></li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
									<span aria-hidden="true">
										<span class="lnr lnr-chevron-right"></span>
									</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget search-widget">
                            <form class="search-form" action="{{ route('post.search') }}" method="post">
                                @csrf
                                <input placeholder="Search Posts" name="search" type="text"/>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="single-sidebar-widget popular-post-widget">
                            <h4 class="popular-title">Latest Posts</h4>
                            <div class="popular-post-list">
                                @foreach($recentPost as $item)
                                    <div class="single-post-list d-flex flex-row align-items-center">
                                        <div class="thumb">
                                            <img class="img-fluid" src="{{ asset($item->post_image) }}" style="max-width: 100px;" alt="" />
                                        </div>
                                        <div class="details">
                                            <a href="{{ url('blog/'.$item->id ) }}">
                                                <h6>{{ Str::limit($item->post_title, 25 ) }}</h6>
                                            </a>
                                            <p>{{ $item->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="single-sidebar-widget post-category-widget">
                            <h4 class="category-title">Post Categories</h4>
                            <ul class="cat-list">
                                @foreach($category as $item)
                                    @php
                                        $catPostCount = \App\Models\BlogPost::catPostCount($item->id);
                                    @endphp

                                    <li>
                                        <a href="{{ url('category/blog/'.$item->id.'/'.$item->blog_category_slug) }}" class="d-flex justify-content-between">
                                            <p>{{ $item->blog_category_name }}</p>
                                            <p>{{ $catPostCount }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-sidebar-widget newsletter-widget">
                            <h4 class="newsletter-title">Newsletter</h4>
                            <p>
                                Here, I focus on a range of items and features that we use in
                                life without giving them a second thought.
                            </p>
                            <div class="form-group d-flex flex-row">
                                <div class="col-autos">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup"
                                               placeholder="Enter email" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter email'" />
                                    </div>
                                </div>
                                <a href="#" class="bbtns">Subcribe</a>
                            </div>
                            <p class="text-bottom">You can unsubscribe at any time</p>
                        </div>
                        <div class="single-sidebar-widget tag-cloud-widget">
                            <h4 class="tagcloud-title">Tag Clouds</h4>
                            <ul>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Architecture</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Art</a></li>
                                <li><a href="#">Adventure</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Adventure</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->

    <!-- start footer Area -->
    @include('frontend.body.footer')
    <!-- End footer Area -->
@endsection
