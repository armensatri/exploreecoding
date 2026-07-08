<?php

namespace App\View\Components\Frontend\Footer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterSubmenu extends Component
{
  public string $route;
  public array $submenu;

  public function __construct(string $route, array $submenu)
  {
    $this->route = $route;
    $this->submenu = $submenu;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.footer.footer-submenu');
  }
}
