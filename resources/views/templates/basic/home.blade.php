@extends($activeTemplate.'layouts.frontend')
@php
	$banner = getContent('banner.content', true);
    $features = getContent('feature.element');
@endphp
@section('content')


<style>
    /* Make sure to set the video to cover the container properly */
    .embed-responsive-item {
        object-fit: cover; /* Ensures the video covers the entire container */

    }

    /* Ensure the video container is correctly positioned and sized */
    .embed-responsive {
        top: 0;
        left: 0;
        position: absolute;
        width: 100%;
        height: 100%;
    }

    /* Ensure the banner section is above the video */

</style>


<section class="banner-section bg--overlay position-relative">
    <div class="embed-responsive embed-responsive-16by9 position-absolute w-100 h-100 overflow-hidden">
        <video class="embed-responsive-item" autoplay muted loop id="myVideo">
            <source src="{{ asset('assets/video/BeepVintageCar.mp4') }}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>
    <div class="banner__inner position-relative z-index-2">
        <div class="container">
            <div class="banner__content">
                <h2 class="banner__title cd-headline letters type">
                    <span>{{ __($banner->data_values->heading) }}</span>
                </h2>
                <p class="banner__content-txt">{{ __($banner->data_values->subheading) }}</p>
                <div class="btn__grp">
                    <a href="{{ route('user.login') }}" class="cmn--btn">{{ __($banner->data_values->button) }}</a>
                    <a href="{{ route('merchant.login') }}" class="cmn--btn active">{{ __($banner->data_values->link) }}</a>
                </div>
            </div>
        </div>
    </div>
</section>


@push('script')
    <script type="text/javascript" src="{{ asset('assets/js/slide.js') }}"></script>
@endpush



    @if($sections->secs != null)
        @foreach(json_decode($sections->secs) as $sec)
            @include($activeTemplate.'sections.'.$sec)
        @endforeach
    @endif

@endsection
