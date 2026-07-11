<?php

namespace App\View\Components\Backend\Show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowAction extends Component
{
  public function __construct(
    public string $name,
    public string $edit,
    public string $indexs,
    public string $delete,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.show.show-action');
  }
}
