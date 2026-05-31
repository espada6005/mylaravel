<x-layout>
    @foreach ($reviews as $review)
        <h3>書名：{{ $review->book->title }} </h3>
        {{ $review->body ? $review->body : '＜レビューなし＞' }} <br />
        {{ $review->member->name }} (ペンネーム：{{ $review->member->author->pen_name }})
        <hr />
    @endforeach
</x-layout>

