<?php

namespace App\View\Components\Frontend\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MobileMenuUtama extends Component
{
  public string $route;
  public string $image;
  public string $menu;
  public string $description;
  public string $buttonName;

  public function __construct(
    string $route,
    string $image,
    string $menu,
    string $description,
    string $buttonName
  ) {
    $this->route = $route;
    $this->image = $image;
    $this->menu = $menu;
    $this->description = $description;
    $this->buttonName = $buttonName;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.header.mobile-menu-utama');
  }
}
