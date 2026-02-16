<?php

namespace App\View\Components\Frontend\Breadcrumb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EcBreadcrumbName extends Component
{
  public $name;

  public function __construct($name)
  {
    $this->name = $name;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.breadcrumb.ec-breadcrumb-name');
  }
}
