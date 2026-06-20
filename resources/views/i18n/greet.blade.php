<x-layout>
    <p>{{ __('myapp.morning') }}</p>
    <p>{{ __('myapp.hello', ['name' => 'yamada']) }}</p>
    <p>{{ __('myapp.hoge') }}</p>

    {{-- <p>{{ __('myapp.greeting.morning') }}</p>
    <p>{{ __('myapp.greeting.hello', ['name' => 'yamada']) }}</p> --}}
</x-layout>