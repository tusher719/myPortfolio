@extends('frontend.main_master')
@section('title')
    {{ $post->post_title }}
@endsection
@section('content')
    <!-- ===============||Start Main-Menu Area||=============== -->
    @include('frontend.body.header')
    <!-- ===============End Main Menu Area||=============== -->

    <!-- Start post-content Area -->
    <section class="post-content-area single-post-area">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ asset($post->post_image) }}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 meta-details">
                            <ul class="tags">
                                <li><a href="#">Food,</a></li>
                                <li><a href="#">Technology,</a></li>
                                <li><a href="#">Politics,</a></li>
                                <li><a href="#">Lifestyle</a></li>
                            </ul>
                            <div class="user-details row">
                                <p class="user-name col-lg-4 col-md-4 col-6">
                                    <a href="#">Tusher</a>
                                    <span class="lnr lnr-user"></span>
                                </p>
                                <p class="date col-lg-8 col-md-8 col-6">
                                    <a href="#">{{ Carbon\Carbon::parse($post->created_at)->format('d M, Y')  }}</a>
                                    <span class="lnr lnr-calendar-full"></span>
                                </p>
                                <p class="view col-lg-4 col-md-4 col-6">
                                    <a href="#">{{ $post->views }} Views</a> <span class="lnr lnr-eye"></span>
                                </p>
                                <p class="comments col-lg-4 col-md-4 col-6">
                                    <a href="#">{{ count($comment) }} Comments</a>
                                    <span class="lnr lnr-bubble"></span>
                                </p>
                                <ul class="social-links col-lg-4 col-md-4 col-6">
                                    <li>
                                        <a href="#"><i class="fa-brands fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa fa-github"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa fa-behance"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <h3 class="mt-20 mb-20">
                                {{ $post->post_title }}
                            </h3>
                                {!! $post->post_details !!}
                        </div>
                    </div>
                    <div class="navigation-area">
                        <div class="row">
                            <div
                                class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                <div class="thumb">
                                    <a href="#prev"><img class="img-fluid" src="{{ asset('frontend') }}/images/blog/prev.jpg" alt="" /></a>
                                </div>
                                <div class="arrow">
                                    <a href="#prev"><span class="lnr text-white lnr-arrow-left"></span></a>
                                </div>
                                <div class="detials">
                                    <p>Prev Post</p>
                                    <a href="#prev">
                                        <h4>Space The Final Frontier</h4>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                <div class="detials">
                                    <p>Next Post</p>
                                    <a href="#next">
                                        <h4>Telescopes 101</h4>
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="#next"><span class="lnr text-white lnr-arrow-right"></span></a>
                                </div>
                                <div class="thumb">
                                    <a href="#next"><img class="img-fluid" src="{{ asset('frontend') }}/images/blog/next.jpg" alt="" /></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comments-area">
                        <h4>{{ count($comment) }} Comments</h4>
                        @foreach($comment as $item)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ asset('frontend') }}/images/blog/c1.jpg" alt="" />
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">{{ $item->name }}</a></h5>
                                            <p class="date">{{ Carbon\Carbon::parse($item->created_at)->format('F j, Y')  }} at {{ Carbon\Carbon::parse($item->created_at)->format('h:s a')  }} </p>
                                            <p class="comment">
                                                {{ $item->comment }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="reply-btn">
                                        <a href="" class="btn-reply text-uppercase">reply</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Comment</h4>
                        <form method="post" action="{{ route('comment.store') }}">
                            @csrf

                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-12 name">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name"
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" />
                                </div>
                                <div class="form-group col-lg-6 col-md-12 email">
                                    <input type="email" name="email" class="form-control" id="email"
                                           placeholder="Enter email address" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter email address'" />
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                                    </div> -->
                            <div class="form-group">
								<textarea class="form-control mb-10"  rows="5" name="comment" placeholder="Messege"
                                          onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                          required=""></textarea>
                            </div>
                            <button type="submit" class="primary-btn text-uppercase">Post Comment</button>
                        </form>
                    </div>
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
                            <h4 class="popular-title">Popular Posts</h4>
                            <div class="popular-post-list">
                                @foreach($popular as $item)
                                    <div class="single-post-list d-flex flex-row align-items-center">
                                    <div class="thumb">
                                        <img class="img-fluid" src="{{ asset($item->post_image) }}" style="max-width: 100px;" alt="" />
                                    </div>
                                    <div class="details">
                                        <a href="{{ url('blog/'.$item->id.'/'.$item->post_title_slug ) }}">
                                            <h6>{{ Str::limit($item->post_title, 25 ) }}</h6>
                                        </a>
                                        <p>{{ $item->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="single-sidebar-widget post-category-widget">
                            <h4 class="category-title">Post Catgories</h4>
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
