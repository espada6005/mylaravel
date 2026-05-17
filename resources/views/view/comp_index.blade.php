<x-layout>
    <x-my-nav brand="Laravel実践入門"
        {{-- :dark-mode="true" --}}
    >
        <x-my-nav.item href="/home" :active="true">Home</x-my-nav.item>
        <x-my-nav.item href="/about">About</x-my-nav.item>
        <x-my-nav.item href="/contact">Contact</x-my-nav.item>
    </x-my-nav>
</x-layout>
