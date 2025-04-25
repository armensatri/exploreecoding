<?php

namespace App\View\Components\Frontend\MenuWeb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExploreCoding extends Component
{
  public $header;
  public $logo;
  public $description;
  public $route;

  public function __construct(
    $header,
    $logo,
    $description,
    $route
  ) {
    $this->header = $header;
    $this->logo = $logo;
    $this->description = $description;
    $this->route = $route;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.menu-web.explore-coding');
  }
}
