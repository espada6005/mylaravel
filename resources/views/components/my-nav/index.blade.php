@props(['brand' => 'My Brand', 'darkMode' => false])
<nav class="navbar {{ $darkMode ? 'navbar-dark bg-dark' : 'navbar-light bg-light' }}">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ $brand }}</a>
        <ul class="navbar-nav flex-row gap-3">
            {{ $slot }}
        </ul>
    </div>
</nav>
