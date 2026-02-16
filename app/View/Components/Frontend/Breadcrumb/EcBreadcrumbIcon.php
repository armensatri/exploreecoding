<?php

namespace App\View\Components\Frontend\Breadcrumb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EcBreadcrumbIcon extends Component
{
  public $image;

  public function __construct($image)
  {
    $this->image = $image;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.breadcrumb.ec-breadcrumb-icon');
  }
}
