<?php

namespace App\View\Components\Frontend\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuAuth extends Component
{
  public string $route;
  public string $img;
  public string $alt;
  public string $menu;

  public function __construct(
    string $route,
    string $img,
    string $alt,
    string $menu
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
