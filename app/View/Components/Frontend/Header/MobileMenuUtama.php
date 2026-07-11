<?php

namespace App\View\Components\Frontend\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MobileMenuUtama extends Component
{
  public function __construct(
    public string $route,
    public string $image,
    public string $menu,
    public string $description,
    public string $buttonName,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.frontend.header.mobile-menu-utama');
  }
}
