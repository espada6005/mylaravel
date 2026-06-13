<?php

namespace App\Logging;

use Monolog\LogRecord;
use Monolog\Processor\ProcessorInterface;

class RefererProcessor implements ProcessorInterface
{
    public function __construct(public ?string $key = 'referer')
    {}

    public function __invoke(LogRecord $record): LogRecord
    {
        $record->extra[$this->key] = $_SERVER['HTTP_REFERER'] ?? 'N/A';
        return $record;
    }
}
