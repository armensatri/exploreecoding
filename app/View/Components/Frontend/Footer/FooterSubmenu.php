<?php

namespace App\View\Components\Frontend\Footer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterSubmenu extends Component
{
  public function __construct(
    public string $route,
    public string $submenu,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.frontend.footer.footer-submenu');
  }
}
