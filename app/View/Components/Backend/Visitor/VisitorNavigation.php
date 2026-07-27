<?php

namespace App\View\Components\Backend\Visitor;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VisitorNavigation extends Component
{
  public function __construct(
    public string $route,
    public string $active,
    public string $menuName,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.visitor.visitor-navigation');
  }
}
