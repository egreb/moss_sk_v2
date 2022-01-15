<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavButton extends Component
{
    public string $id;
    public string $dropdown;
    public string $title;
    public array $routes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $id, $routes, $dropdown)
    {
        $this->id = $id;
        $this->title = $title;
        $this->routes = $routes;
        $this->dropdown = $dropdown;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-button');
    }
}
