<?php

namespace App\View\Components\Backend\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Submenu extends Component
{
  public function __construct(
    public string $route,
    public string $active,
    public string $ssm,
    public string $subMenu,
    public string $image,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.sidebar.submenu');
  }
}
