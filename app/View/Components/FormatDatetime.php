<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormatDatetime extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $type = 'datetime')
    {}

    public function render(): string
    {
        $format = [
            'datetime' => 'Y/m/d H:i:s',
            'date' => 'Y/m/d',
            'time' => 'H:i:s'
        ];
        $current = now();
        return $current->format($format[$this->type]);
    }
}
