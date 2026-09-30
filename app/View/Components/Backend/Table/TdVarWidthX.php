<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TdVarWidthX extends Component
{
  public function __construct(
    public string $xWidth,
    public mixed $var,
    public mixed $tooltip,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.table.td-var-width-x');
  }
}
