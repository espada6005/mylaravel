<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MyAlert extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'info',
        public string $title = 'Information',
        public string $iconType = 'balloon'
    ) {}

    // public string $type;
    // public string $title;
    // public string $iconType;

    // public function __construct(string $type = 'info',
    //     string $title = 'Information', string $iconType = 'balloon')
    // {
    //     $this->type = $type;
    //     $this->title = $title;
    //     $this->iconType = $iconType;
    // }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.my-alert');
    }
}
