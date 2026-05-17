<x-layout>
    <ul>
        @each('subview.book_item', $books, 'item', 'subview.book_empty')
        {{-- @forelse ($books as $item)
            @include('subview.book_item', ['item' => $item])
        @empty
            <li>書籍情報はありません。</li>
        @endforelse --}}
    </ul>
</x-layout>
