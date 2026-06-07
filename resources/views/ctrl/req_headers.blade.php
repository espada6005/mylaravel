<x-layout>
    <ul>
    @foreach($headers as $name => $values)
        <li>{{ $name }}:
            {{ is_array($values) ? implode(', ', $values) : $values }}</li>
    @endforeach
    </ul>
</x-layout>