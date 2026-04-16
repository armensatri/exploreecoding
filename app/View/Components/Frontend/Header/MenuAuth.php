<?php

namespace App\View\Components\Frontend\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuAuth extends Component
{
  public $route;
  public $img;
  public $alt;
  public $menu;

  public function __construct(
    $route,
    $img,
    $alt,
    $menu
  ) {
    $this->route = $route;
    $this->img = $img;
    $this->alt = $alt;
    $this->menu = $menu;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.header.menu-auth');
  }
}
