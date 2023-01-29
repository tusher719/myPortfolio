<div class="row">
    <div class="skills tab-content active">
        <div class="row">
            <!-- Skill item Start -->

            @foreach ($skills as $item)
                <div class="skill-item">
                    <div class="skill-item-title">
                        <p>{{ $item->skill_name }}</p>
                        <span>{{ $item->percentage }}%</span>
                    </div>
                    <div class="progress inner-shadow">
                        <div class="progress-bar" style="width: calc({{ $item->percentage }}% - 14px)"></div>
                    </div>
                </div>
            @endforeach

            <!-- Skill item End -->
        </div>
    </div>
</div>
