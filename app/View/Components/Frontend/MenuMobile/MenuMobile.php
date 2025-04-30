<?php

namespace App\View\Components\Frontend\MenuMobile;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuMobile extends Component
{
  public $route;
  public $image;
  public $menu;
  public $description;

  public function __construct(
    $route,
    $image,
    $menu,
    $description
  ) {
    $this->route = $route;
    $this->image = $image;
    $this->menu = $menu;
    $this->description = $description;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.menu-mobile.menu-mobile');
  }
}
