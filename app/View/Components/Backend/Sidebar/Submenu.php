<?php

namespace App\View\Components\Backend\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Submenu extends Component
{
  public $route;
  public $active;
  public $ssm;
  public $subMenu;
  public $image;

  public function __construct(
    $route,
    $active,
    $ssm,
    $subMenu,
    $image,
  ) {
    $this->route = $route;
    $this->active = $active;
    $this->ssm = $ssm;
    $this->subMenu = $subMenu;
    $this->image = $image;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.sidebar.submenu');
  }
}
