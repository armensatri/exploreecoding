<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TdVarBg extends Component
{
  public function __construct(
    public string $bg,
    public string $text,
    public mixed $var,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.table.td-var-bg');
  }
}
