<?php

namespace App\View\Components\Backend\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Submenu extends Component
{
  public $sort;
  public $route;
  public $active;
  public $subMenu;
  public $image;

  public function __construct(
    $sort,
    $route,
    $active,
    $subMenu,
    $image,
  ) {
    $this->sort = $sort;
    $this->route = $route;
    $this->active = $active;
    $this->subMenu = $subMenu;
    $this->image = $image;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.sidebar.submenu');
  }
}
