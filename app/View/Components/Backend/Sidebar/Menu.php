<?php

namespace App\View\Components\Backend\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
  public $sm;
  public $menu;

  public function __construct($sm, $menu)
  {
    $this->sm = $sm;
    $this->menu = $menu;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.sidebar.menu');
  }
}
