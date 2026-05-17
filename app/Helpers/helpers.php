<?php
function formatDatetime(string $type): string
{
    $format = [
        'datetime' => 'Y/m/d H:i:s',
        'date' => 'Y/m/d',
        'time' => 'H:i:s'
    ];
    $current = now();
    return $current->format($format[$type]);
}