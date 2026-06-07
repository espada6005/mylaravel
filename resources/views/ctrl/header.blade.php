{!! '<'.'?xml version="1.0" encoding="UTF-8"?>' !!}
<books>
@foreach($books as $book)
    <book>
        <isbn>{{ $book->isbn }}</isbn>
        <title>{{ $book->title }}</title>
        <price>{{ $book->price }}</price>
        <publisher>{{ $book->publisher }}</publisher>
        <published>{{ $book->published }}</published>
        <sample>{{ $book->sample ? 'true' : 'false' }}</sample>
    </book>
@endforeach
</books>
