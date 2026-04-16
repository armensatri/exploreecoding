<?php

namespace App\View\Components\Frontend\Footer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterSodmed extends Component
{
  public $route;
  public $image;

  public function __construct($route, $image)
  {
    $this->route = $route;
    $this->image = $image;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.footer.footer-sodmed');
  }
}
