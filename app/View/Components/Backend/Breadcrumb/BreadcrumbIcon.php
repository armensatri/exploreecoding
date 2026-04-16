<?php

namespace App\View\Components\Backend\Breadcrumb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadcrumbIcon extends Component
{
  public $image;

  public function __construct($image)
  {
    $this->image = $image;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.breadcrumb.breadcrumb-icon');
  }
}
