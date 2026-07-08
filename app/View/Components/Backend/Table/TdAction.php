<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TdAction extends Component
{
  public mixed $id;
  public mixed $show;
  public mixed $edit;
  public mixed $delete;

  public function __construct(
    mixed $id,
    mixed $show,
    mixed $edit,
    mixed $delete,
  ) {
    $this->id = $id;
    $this->show = $show;
    $this->edit = $edit;
    $this->delete = $delete;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.table.td-action');
  }
}
