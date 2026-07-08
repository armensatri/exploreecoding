<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TdVarWidth extends Component
{
  public mixed $var;
  public mixed $tooltip;

  public function __construct(mixed $var, mixed $tooltip)
  {
    $this->var = $var;
    $this->tooltip = $tooltip;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.table.td-var-width');
  }
}
