<x-layout>
    <x-my-card
        image="https://wings.msn.to/books/978-4-8156-1948-0/978-4-8156-1948-0.jpg">
        <x-slot:header class="text-muted">
            <i class="bi bi-book"></i> React実践入門
        </x-slot:header>
        <p>React実践入門のサンプルコードを公開しました！</p>
        <x-slot:footer>
        {{-- <x-slot:footer class="text-muted"> --}}
            {{-- <a href="#" class="btn btn-primary">詳細はこちら</a> --}}
            {{ parse_url($component->image, PHP_URL_HOST) }}
        </x-slot:footer>

        {{-- <x-slot:footer>
            <span class="text-muted">{{ $component->getHost() }}</span>
        </x-slot:footer> --}}
    </x-my-card>
</x-layout>
