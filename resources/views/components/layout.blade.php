@props(['title' => 'Laravel実践入門'])
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>{{ $title }}</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
@if (isset($meta) && $meta->hasActualContent())
    {{ $meta }}
@else
    <meta name="keyword" content="PHP, Laravel" />
    <meta name="description" content="Laravel実践入門のサンプル" />
@endif
</head>
<body>
{{-- @includeWhen(now()->between('2025-09-01', '2025-09-30'), 'subview.campaign') --}}
{{-- @includeIf('subview.campaign') --}}
{{-- @includeFirst(['subview.campaign', 'subview.common']) --}}

{{ $slot }}

{{-- @env('local')
<footer class="alert-info">
    This is local environment.
</footer>
@endenv --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
