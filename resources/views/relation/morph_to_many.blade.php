<x-layout>
<h3>「{{ $book->title }}」のタグ</h3>
<ul>
    @foreach ($book->tags as $tag)
        <li>
            {{ $tag->name ?: '＜タグなし＞' }} （更新日時:{{ $tag->updated_at }}）
        </li>
    @endforeach
</ul>
</x-layout>
