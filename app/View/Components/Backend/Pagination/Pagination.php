<?php

namespace App\View\Components\Backend\Pagination;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pagination extends Component
{
  public function __construct(
    public mixed $pagination,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.pagination.pagination');
  }
}
