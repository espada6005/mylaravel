@props(['caption'])
@pushOnce('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(function() {
            $('button').click(function() {
            console.log($(this).text().trim()); });
        });
    </script>
    @endPushOnce
    <button class="btn btn-primary">
        <i class="bi bi-play-circle"></i> {{ $caption }}
    </button>
