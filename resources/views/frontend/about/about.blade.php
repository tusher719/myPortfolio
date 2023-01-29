<div class="intru-heading text-white">
    <div class="section-title wow fadeInUp" data-wow-duration="2s">
        <h2>About Me</h2>
        <p>
            @foreach($about as $item)
                {{ $item->title }}
        </p>
    </div>
</div>
<div class="row">
    <div class="col-lg-5 col-md-12 col-sm-12 mt-30 wow fadeInUp" data-wow-duration="2s"
         data-wow-delay="0.2s">
        <div class="myImg">
            <img src="{{ asset($item->image) }}" alt="" />
        </div>
    </div>
    <div class="col-lg-5 col-md-12 col-sm-12 pt-20">
        <div class="intru-about text-white">
            <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                Hi, Let's Intrudouce
            </h2>
            <div class="intru-icon mt-15 wow fadeInUp" data-wow-duration="2s"
                 data-wow-delay="0.6s">
                <ul>
                    <li>
                        <a data-toggle="tooltip" data-placement="top"
                           title="Mehedi Hasan Tusher" target="_blank"
                           href="https://www.facebook.com/404error.NotFound.t/">
                            <!-- <i class=" fb fa fa-facebook"></i> -->
                            <i class="fb fa-brands fa-facebook-f"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="MH Tusher"
                           target="_blank"
                           href="https://www.linkedin.com/in/mh-tusher-a8b863186/">
                            <i class="li fa-brands fa fa-linkedin"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="MH Tusher"
                           target="_blank" href="https://www.instagram.com/tusher.19/">
                            <i class="ins fa-brands fa fa-instagram"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Mehedi Hasan"
                           target="_blank" href="https://twitter.com/MehediH56934766">
                            <i class="tw fa-brands fa fa-twitter"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Tusher"
                           target="_blank" href="https://github.com/MH-Tusher">
                            <i class="git fa-brands fa fa-github"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class="mt-15 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
                {{ $item->details }}
            </p>
            @endforeach
        </div>
        <div class="intro-expert text-white mt-20 wow fadeInUp" data-wow-duration="2s"
             data-wow-delay="1s">
            <h4 class="mb-2">im also expert in:</h4>
            <p>
                <i class="mr-2">&#10004;</i>Responsive website design
                (html / wordpress)
            </p>
            <p>
                <i class="mr-2">&#10004;</i>landing page design (html /
                wordpress)
            </p>
            <p>
                <i class="mr-2">&#10004;</i>optimize & speeding up your
                website
            </p>
            <p><i class="mr-2">&#10004;</i>wooCommerce</p>
            <p>
                <i class="mr-2">&#10004;</i>full web creation (blog,
                newspaper, e-commerce, service)
            </p>
        </div>
        <div class="intru-btnn wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">
            <a href="#skill" class="primary-btn text-uppercase">more info</a>
        </div>
    </div>
</div>
