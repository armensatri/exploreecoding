<?php

namespace App\View\Components\Frontend\Footer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterMenu extends Component
{
  public $menu;

  public function __construct($menu)
  {
    $this->menu = $menu;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.footer.footer-menu');
  }
}
