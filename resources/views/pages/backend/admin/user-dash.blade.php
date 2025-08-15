
@if(!empty($adverts) && $adverts->count() > 0)
<div id="advertsCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($adverts as $index => $advert)
            <div class="carousel-item @if($index === 0) active @endif">
                <a href="{{ $advert->url ?? '#' }}" target="_blank">
                    <img src="{{ asset($advert->advert_image) }}" 
                         class="d-block mx-auto" 
                         alt="{{ $advert->title }}" 
                         style="width: 950px; height: 400px; object-fit: cover;">
                </a>
                @if($advert->title)
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $advert->title }}</h5>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    {{-- Carousel controls --}}
    <button class="carousel-control-prev" type="button" data-bs-target="#advertsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#advertsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endif
