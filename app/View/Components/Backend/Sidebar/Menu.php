<?php

namespace App\View\Components\Backend\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
  public mixed $sm;
  public mixed $menu;

  public function __construct(mixed $sm, mixed $menu)
  {
    $this->sm = $sm;
    $this->menu = $menu;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.sidebar.menu');
  }
}
