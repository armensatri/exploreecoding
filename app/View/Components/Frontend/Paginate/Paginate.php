<?php

namespace App\View\Components\Frontend\Paginate;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Paginate extends Component
{
  public $pagination;

  public function __construct($pagination)
  {
    $this->pagination = $pagination;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.paginate.paginate');
  }
}
