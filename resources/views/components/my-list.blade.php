<ul>
@foreach($list as $item)
    <li>{!! $renderSlot($slot, ['item' => $item]) !!}</li>
@endforeach
</ul>
