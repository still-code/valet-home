<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SiteItem extends Component
{
    public $dir;

    public function __construct($dir)
    {
        $this->dir = $dir;
    }

    public function render()
    {
        return view('components.site-item');
    }
}
