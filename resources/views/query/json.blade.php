<x-layout>
    <table class="table">
        <thead>
            <tr>
                <th>氏名</th><th>SNS</th><th>言語</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td>{{ json_encode($member->info['sns'] ?? []) }}</td>
                <td>{{ json_encode($member->info['languages'] ?? []) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>