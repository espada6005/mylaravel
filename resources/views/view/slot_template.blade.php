<x-layout>
    <x-my-list :list="$books">
        @{{ $item['title'] }}（@{{ $item['publisher'] }}・
        @{{ number_format($item['price']) }}円）
    </x-my-list>
</x-layout>
