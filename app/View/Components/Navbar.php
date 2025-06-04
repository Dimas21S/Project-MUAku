<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */

    public string $role;

    public function __construct()
    {
        if (Auth::check()) {
            $this->role = Auth::user()->role;
        } elseif (Auth::guard('makeup_artist')->check()) {
            $this->role = 'makeup_artist';
        } else {
            $this->role = 'guest';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar', [
            'role' => $this->role
        ]);
    }
}
