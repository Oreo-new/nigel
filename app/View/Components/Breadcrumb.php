<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
    // public $breadcrumbs;

    public function __construct()
    {
        // $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $breadcrumbs = [];

    foreach (request()->segments() as $segment) {
        $url = '/' . $segment;
        $label = ucwords(str_replace('-', ' ', $segment)); // Convert 'example-page' to 'Example Page'
        $breadcrumbs[] = ['label' => $label, 'url' => $url];
    }
        return view('components.breadcrumb')->with('breadcrumbs', $breadcrumbs);
    }
}
