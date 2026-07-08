<?php

namespace App\View\Components\Backend\TableHeader;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Search extends Component
{
  public string $search;
  public string $placeholder;

  public function __construct(string $search, string $placeholder)
  {
    $this->search = $search;
    $this->placeholder = $placeholder;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.table-header.search');
  }
}
