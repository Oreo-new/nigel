<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Reply extends Component
{
    public $parentid;
    /**
     * Create a new component instance.
     */
    public function __construct($parentid)
    {
        $this->parentid = $parentid;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.reply');
    }
}
