<x-layout>
    <h3>{{ $member->name }} さんのメモ</h3>
    <ul>
        @foreach($member->memos as $memo)
            <li>
                {{ $memo->body }} （更新日時:{{ $memo->updated_at }}）
            </li>
        @endforeach
    </ul>
</x-layout>