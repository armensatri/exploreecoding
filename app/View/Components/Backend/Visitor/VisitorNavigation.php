<?php

namespace App\View\Components\Backend\Visitor;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VisitorNavigation extends Component
{
  public $route;
  public $active;
  public $menuName;

  public function __construct(
    $route,
    $active,
    $menuName,
  ) {
    $this->route = $route;
    $this->active = $active;
    $this->menuName = $menuName;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.visitor.visitor-navigation');
  }
}
