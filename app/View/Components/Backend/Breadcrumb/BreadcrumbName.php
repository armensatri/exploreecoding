<?php

namespace App\View\Components\Backend\Breadcrumb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadcrumbName extends Component
{
  public string $name;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.breadcrumb.breadcrumb-name');
  }
}
