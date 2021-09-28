<div id="r-ads" class="p-3 d-none  d-lg-block">
    @if($adverts->count())
        @foreach($adverts as $advert)
            @if($loop->index > 1)
                @php
                    $cls = "d-none";
                @endphp
            @else
                @php
                    $cls = "";
                @endphp
            @endif
            <a href="{{ $advert->url }}" target="_blank" class="two-ads mt-3 {{ $cls }}">
                <img src="/img/ads/r-ads.jpg" alt="">
            </a>
        @endforeach

    @endif

</div>