<x-layout>
    <h3>{{ $member->name }}</h3>
    <ul>
        <li>
            <strong>メールアドレス</strong>: {{ $member->email }}
        </li>
        @isset($member->author)
            <li>
                <strong>ペンネーム</strong>: {{ $member->author->pen_name }}
            </li>
            <li>
                <strong>デビュー日</strong>:
                    {{ $member->author->debut ? $member->author->debut->format('Y年m月d日') : '―' }}
            </li>
        @endisset
    </ul>
</x-layout>
