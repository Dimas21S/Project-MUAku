<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navlink extends Component
{
    /**
     * Create a new component instance.
     */
    public string $href;
    public string $icon;
    public string $active;

    public function __construct(string $href, string $icon, string $active)
    {
        $this->href = $href;
        $this->icon = $icon;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navlink');
    }
}
