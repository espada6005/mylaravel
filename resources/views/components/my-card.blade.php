<div class="card" style="width: 180px;">
    <img src="{{ $image }}"
        class="card-img-top" alt="Card Image">
    <div class="card-body">
        <h5 class="card-title">{{ $header }}</h5>
        <p class="card-text">{{ $slot }}</p>
        <div class="card-footer">{{ $footer }}</div>
        {{-- <div {{ $footer->attributes->class(['card-footer']) }}>{{ $footer }}</div> --}}
    </div>
</div>
