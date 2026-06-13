@inject('srv', 'App\Services\UuidInterface')
<x-layout>
    <p>Service ID: {{ $srv->getId() }}</p>
</x-layout>