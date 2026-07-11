<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TdVar extends Component
{
  public function __construct(
    public mixed $var,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.table.td-var');
  }
}
