<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TdAction extends Component
{
  public function __construct(
    public mixed $id,
    public string $show,
    public string $edit,
    public string $delete,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.table.td-action');
  }
}
