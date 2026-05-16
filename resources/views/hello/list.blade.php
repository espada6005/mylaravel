<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<title>Laravel実践入門</title>
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
</head>
<body>
<table class="table">
<thead>
<tr>
    <th>ISBNコード</th><th>書名</th><th>価格</th>
    <th>出版社</th><th>刊行日</th><th>サンプル</th>
</tr>
</thead>
<tbody>
@foreach($books as $book)
    <tr>
        <td>{{ $book->isbn }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->price }}円</td>
        <td>{{ $book->publisher }}</td>
        <td>{{ $book->published }}</td>
        {{-- <td>{{ $book->published->format('Y-m-d') }}</td> --}}
        <td>{{ $book->sample ? '○' : '×' }}</td>
    </tr>
@endforeach
</tbody>
</table>
</body>
</html>
