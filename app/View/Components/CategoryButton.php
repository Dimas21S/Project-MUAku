<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryButton extends Component
{
    /**
     * Create a new component instance.
     */

    public string $value;
    public string $image;
    public string $label;
    public bool $active;

    public function __construct(string $value, string $image, string $label, bool $active)
    {
        $this->value = $value;
        $this->image = $image;
        $this->label = $label;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-button');
    }
}
