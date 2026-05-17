@aware(['darkMode' => false])
@props(['href' => '#', 'active' => false])
<li class="nav-item">
    <a class="nav-link {{ $darkMode ? 'text-light' : 'text-dark' }}
        {{ $active ? 'active' : '' }}" href="{{ $href }}">
        {{ $slot }}
    </a>
</li>
