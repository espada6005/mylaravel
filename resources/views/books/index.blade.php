<x-layout title="書籍一覧">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        {{ date('Y年m月d日', session('current')) }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <p>
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            新規登録</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                {{-- <th>No.</th> --}}
                <th>ISBNコード</th><th>書名</th><th>価格</th>
                <th>出版社</th><th>刊行日</th><th>サンプル</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
        {{-- @foreach ($books as $id => $book) --}}
        {{-- @forelse ($books as $book) --}}
            {{-- @break($loop->iteration > 5) --}}
            {{-- @if ($loop->iteration > 5)
                @break
            @endif --}}
            {{-- @continue(!$book->sample) --}}
            <tr>
                {{-- <td>{{ $loop->index + 1 }}</td> --}}
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->title }}</td>
                {{-- <td>
                @if ($book->published->greaterThan(now()))
                ［刊行予定］
                @elseif($book->published->greaterThan(now()->subMonth()))
                ［新作］
                @elseif($book->published->greaterThan(now()->subMonths(6)))
                ［準新作］
                @else
                ［旧作］
                @endif
                {{ $book->title }}</td> --}}
                <td>{{ $book->price }}円</td>
                <td>{{ $book->publisher }}</td>
                {{-- <td>{{ $book->published }}</td> --}}
                <td>{{ $book->published->format('Y-m-d') }}</td>
                <td>{{ $book->sample ? '○' : '×' }}</td>
                {{-- <td>
                @if ($book->sample)
                    <img src="/images/download.png" alt="ダウンロード" />
                @else
                    －
                @endif
                </td> --}}
                <td>
                    <a href="{{ route('books.show', $book->id) }}">詳細</a>｜
                    {{-- <a href="{{ route('books.show', [ 'book' => $book->id ]) }}">詳細</a>｜ --}}
                    {{-- <a href="{{ route('books.show', $book) }}">詳細</a>｜ --}}
                    <a href="{{ route('books.edit', $book->id) }}">編集</a>
                </td>
            </tr>
        @endforeach
        {{-- @empty
            <p>データは存在しません。</p>
        @endforelse --}}
        </tbody>
    </table>
    {{-- {{ $books->links() }} --}}
</x-layout>
