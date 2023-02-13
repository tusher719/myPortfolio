<section id="posts" class="recent-blog-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title wow fadeInUp" data-wow-duration="2s">
                    <h2>posts</h2>
                    <p>My Dairy</p>
                </div>
            </div>
        </div>

        <div class="row post-main">
            @foreach($post as $item)
                <div class="single-recent-blog col-lg-4 col-md-4" data-wow-duration="0.5s" data-wow-delay="0.6s">
                    <div class="thumb">
                        <img class="f-img img-fluid mx-auto" src="{{ asset($item->post_image) }}" alt="" />
                    </div>
                    <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <img class="img-fluid" src="{{ asset('frontend') }}/images/Photos/my-img.jpg" alt="" />
                            <a href="#"><span>Tusher</span></a>
                        </div>
                        @php
                            $commentcount = \App\Models\Comment::where('blog_id',$item->id)->get();
                        @endphp
                        <div class="meta">
                            {{ Carbon\Carbon::parse($item->created_at)->format('dS M')  }}
                            <span class="lnr lnr-eye"></span> {{ $item->views }}
                            <span class="lnr lnr-bubble"></span> {{ count($commentcount) }}
                        </div>
                    </div>
                    <a href="#">
                        <h4>{{ $item->post_title }}</h4>
                    </a>
                    <a class="overlay" target="_blank" href="{{ url('blog/'.$item->id ) }}"></a>
                    <p>
                        {!! Str::limit($item->post_details, 250 )  !!}
                    </p>
                </div>
            @endforeach

            <div class="col-lg-12 col-md-12 text-center">
                <a href="{{ route('post.list') }}" class="primary-btn text-uppercase">more posts</a>
            </div>
        </div>
    </div>
</section>
