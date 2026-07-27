<?php

namespace App\View\Components\Backend\Breadcrumb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadcrumbName extends Component
{
  public function __construct(
    public string $name,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.breadcrumb.breadcrumb-name');
  }
}
