<?php

namespace App\View\Components\Frontend\MenuWeb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuWebHeader extends Component
{
  public $name;

  public function __construct($name)
  {
    $this->name = $name;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.menu-web.menu-web-header');
  }
}
