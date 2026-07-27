<?php

namespace App\View\Components\Backend\Data;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataCardCount extends Component
{
  public function __construct(
    public string $hover,
    public string $route,
    public string $img,
    public string $alt,
    public string $dataName,
    public int $dataCount,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.data.data-card-count');
  }
}
