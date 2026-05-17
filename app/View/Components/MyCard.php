<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MyCard extends Component
{
    public function __construct(
        public string $image
    ) {}

    public function render(): View
    {
        return view('components.my-card');
    }

    public function getHost(): string
    {
        return parse_url($this->image, PHP_URL_HOST);
    }
}
