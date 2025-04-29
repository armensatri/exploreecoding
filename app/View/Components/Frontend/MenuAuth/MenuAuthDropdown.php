<?php

namespace App\View\Components\Frontend\MenuAuth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuAuthDropdown extends Component
{
  public $route;
  public $image;
  public $alt;
  public $menu;

  public function __construct(
    $route,
    $image,
    $alt,
    $menu
  ) {
    $this->route = $route;
    $this->image = $image;
    $this->alt = $alt;
    $this->menu = $menu;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.menu-auth.menu-auth-dropdown');
  }
}
