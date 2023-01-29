<div class="row">
    <div class="experience tab-content">
        <div class="row">
            <div class="timeline">
                <div class="row">
                    @foreach($experience as $item)
                        <!-- timeline item Start -->
                            <div class="timeline-item">
                                <div class="timeline-item-inner outer-shadow">
                                    <i class="fas fa-briefcase icon"></i>
                                    <span>
                                        {{ Carbon\Carbon::parse($item->start_date)->format('M, Y')  }} -
                                        @if($item->end_date != null)
                                            {{ Carbon\Carbon::parse($item->end_date)->format('M, Y')  }}
                                        @else
                                            Present
                                        @endif
                                    </span>
                                    <h3>{{ $item->experience_name }}</h3>
                                    <h4>{{ $item->company_name }}</h4>
                                    <p> {{ $item->description }} </p>
                                </div>
                            </div>
                            <!-- timeline item End -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
