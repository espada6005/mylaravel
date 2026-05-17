<x-layout>
    <div
        @style([
            'background-color: yellow',
            'color: red' => $isOn,
            'text-decoration: underline' => !$isOn
        ])>
        styleディレクティブ
    </div>
</x-layout>
