@php
    $liveAuction = getContent('live_auction.content', true);
    $liveProducts= \App\Models\Product::live()->latest()->limit(8)->get();
@endphp

<section class="auction-section pt-120 pb-60 bg--section" style="margin-top: -50px;">
    <div class="container">
        <div class="section__header text-center icon__contain">
            <h3 class="section__title justify-content-center">
                <div class="icon">
                    <i class="las la-running"></i>
                </div>
                <div class="cont">{{ __($liveAuction->data_values->heading) }}</div>
            </h3>
            <p class="section__txt">{{ __($liveAuction->data_values->subheading) }}</p>
            <div class="progress progress--bar">
                <div class="progress-bar bg--base progress-bar-striped progress-bar-animated"></div>
            </div>
        </div>
        <div class="row gy-4  justify-content-center">
            @foreach ($liveProducts as $product)
            <div class="col-xl-4 col-lg-6 col-md-8 col-sm-12">
                    <div class="slide-item">
                        <div class="auction__item bg--body">
                            <div class="auction__item-thumb">
                                <a href="{{ route('product.details', [$product->id, slug($product->name)]) }}">
                                    <img src="{{getImage(imagePath()['product']['path'].'/thumb_'.$product->image,imagePath()['product']['thumb'])}}" alt="auction">
                                </a>
                                <span class="total-bids">
                                    <!-- <span><i class="las la-gavel"></i></span>@lang('x') -->
                                    <span> {{ ($product->total_bid) }} @lang('Bids')</span>
                                </span>
                            </div>
                            <div class="auction__item-content">
                                <h6 class="auction__item-title">
                                    <a href="{{ route('product.details', [$product->id, slug($product->name)]) }}">{{ __($product->name) }}</a>
                                </h6>
                                <div class="auction__item-countdown">
                                    <div class="inner__grp">

                                        <ul class="countdown" data-date="{{ showDateTime($product->expired_at, 'm/d/Y H:i:s') }}">
                                            <li>
                                                <span class="days">@lang('00')</span>
                                            </li>
                                            <li>
                                                <span class="hours">@lang('00')</span>
                                            </li>
                                            <li>
                                                <span class="minutes">@lang('00')</span>
                                            </li>
                                            <li>
                                                <span class="seconds">@lang('00')</span>
                                            </li>
                                        </ul>
                                        <div class="total-price">
                                            {{ $general->cur_sym }}{{ showAmount($product->price) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="auction__item-footer">
                                    <a href="{{ route('product.details', [$product->id, slug($product->name)]) }}" class="cmn--btn w-100">@lang('Details')</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-sm-5 mt-4">
            <a href="{{ route('live.products') }}" class="cmn--btn">@lang('View All')</a>
        </div>
    </div>
</section>
