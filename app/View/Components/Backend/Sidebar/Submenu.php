<?php

namespace App\View\Components\Backend\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Submenu extends Component
{
  public string $route;
  public string|bool $active;
  public string $ssm;
  public string $subMenu;
  public string $image;

  public function __construct(
    string $route,
    string|bool $active,
    string $ssm,
    string $subMenu,
    string $image,
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
