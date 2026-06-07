<x-layout>
    @if($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
    <form method="POST" action="/ctrl/upload_process"
        enctype="multipart/form-data">
        @csrf
        <input id="upfile" name="photo[]" type="file" multiple />
        <input type="submit" value="送信" />
        <hr />
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif
        @if(session('fail'))
            <p>{{ session('fail') }}</p>
        @endif
    </form>
</x-layout>
