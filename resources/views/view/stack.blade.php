<x-layout title="選択">
    <x-my-button caption="Home" />
    <x-my-button caption="About" />
    <x-my-button caption="Contact" />
    @pushOnce('scripts')
        <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
    @endPushOnce
</x-layout>
