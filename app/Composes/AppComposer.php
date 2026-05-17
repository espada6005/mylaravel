<?php

namespace App\Composes;

use Illuminate\View\View;

class AppComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'appName' => 'Laravel実践入門',
            'currentYear' => now()->year,
        ]);
    }
}
