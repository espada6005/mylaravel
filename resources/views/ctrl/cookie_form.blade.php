<x-layout>
    <form method="POST" action="/ctrl/cookie_process">
        @csrf
        <label for="email">メールアドレス：</label>
        <input id="email" name="email" type="text" value="{{ $email }}"
            class="form-control"/>
        <input type="submit" value="送信" class="btn btn-primary"/>
    </form>
</x-layout>