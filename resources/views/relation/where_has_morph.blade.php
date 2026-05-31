<x-layout>
<ul>
    @foreach ($memos as $memo)
        <h3>書名：{{ $memo->memoable->title }} </h3>
        <p>メモ： {{ $memo->body }}</p>
        <hr />
    @endforeach
</ul>
</x-layout>
