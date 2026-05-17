<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class MyList extends Component
{
    public function __construct(
        public Collection $list,
    ) {}

    public function render(): View
    {
        return view('components.my-list');
    }

    public function renderSlot(string $template, array $item)
    {
        return Blade::render($template, $item);
    }
}
