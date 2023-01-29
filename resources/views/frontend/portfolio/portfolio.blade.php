<section class="portfolio-section section" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2 data-heading="portfolio">latest works</h2>
            </div>
        </div>
        <!-- portfolio filter Start -->
        <div class="row">
            <div class="portfolio-filter">
                <span class="filter-item outer-shadow active" data-target="all">all</span>
                @foreach($categories as $item)
                    <span class="filter-item" data-target="{{$item->category_name_slug}}">{{$item->category_name}}</span>
                @endforeach
            </div>
        </div>
        <!-- portfolio filter end -->
        <!-- portfolio items start -->
        <div class="row portfolio-items">
            <!-- .portfolio item start -->

            @foreach($projects as $project)


                <div class="portfolio-item" data-category="{{ $project['category']['category_name_slug'] }}">
                    <div class="portfolio-item-inner outer-shadow">
                        <div class="portfolio-item-img">
                            <img src="{{ asset($project->project_thumbnail) }}" alt="portfolio{{count($multiImg)}}" data-screenshots="

                                    @foreach(\App\Models\MultiImg::where('project_id', $project->id)->get() as $multiple_img)
                                        {{ asset($multiple_img->photo_name) }}{{ $loop->last ? '' : ',' }}
                                    @endforeach
                                " />
                            <!-- view project button -->
                            <span class="view-project">view project</span>
                        </div>
                        <p class="portfolio-item-tite">{{ $project->title }}</p>
                        <!-- personal item detailes start -->
                        <div class="portfolio-item-details">
                            <div class="row">
                                <div class="description">
                                    <h3>project brief:</h3>
                                    <p>
                                        {{ $project->description }}
                                    </p>
                                </div>
                                <div class="info">
                                    <h3>project info</h3>
                                    <ul>
                                        <li>date - <span>
                                                @if($project->date == true)
                                                    {{ date('d M Y', strtotime($project->date))  }}
                                                @else
                                                @endif
                                            </span></li>
{{--                                        <li>date - <span>{{ $project->date->format('d M Y')  }}</span></li>--}}
                                        <li>client - <span>{{ $project->client }}</span></li>
                                        <li>tools - <span>{{ $project->tools }}</span></li>
                                        <li>
                                            web -
                                            <span><a href="http://tusherwebpro.xyz/">{{ $project->website }}</a></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- personal item detailes end -->
                    </div>
                </div>
            @endforeach

            <!-- portfolio item end -->
        </div>
        <!-- portfolio items end -->
    </div>
</section>
