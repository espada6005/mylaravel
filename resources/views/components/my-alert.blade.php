{{-- <div class="alert alert-{{ $type }}"> --}}
<div class="alert alert-{{ $type }}" {{ $attributes }}>
{{-- <div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }}> --}}
{{-- <div {{ $attributes->class(['alert', 'alert-'.$type]) }}> --}}
    <h4 class="alert-heading">
        <i class="bi bi-{{ $iconType }}"></i>
        {{ $title }}
        {{-- {{ $typeTitle() }} --}}
    </h4>
    <p>{{ $slot }}</p>
</div>
