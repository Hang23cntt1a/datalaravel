<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                    @foreach ($slides as $slide)
    <p>File name: {{ $slide->image }}</p>
    <img src="{{ asset('images/' . $slide->image) }}" width="400" style="border: 2px solid red; margin-bottom: 20px;">
@endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
