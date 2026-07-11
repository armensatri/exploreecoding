<?php

namespace App\View\Components\Backend\TableHeader;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Description extends Component
{
  public function __construct(
    public string $tableName,
    public mixed $pageData,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.table-header.description');
  }
}
