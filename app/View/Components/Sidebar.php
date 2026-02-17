<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        try {
            $menus = Menu::all()->sortBy("order");
        } catch (\Exception $e) {
            \Log::error('Error fetching menus: ' . $e->getMessage());
            $menus = collect([]);
        }
        return view('components.sidebar')->with('menus', $menus);
    }
}
