<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TdVarWidth extends Component
{
  public function __construct(
    public mixed $var,
    public mixed $tooltip,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.table.td-var-width');
  }
}
