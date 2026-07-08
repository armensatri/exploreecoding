<?php

namespace App\View\Components\Backend\Data;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataCardCount extends Component
{
  public string $hover;
  public string $route;
  public string $img;
  public string $alt;
  public string $dataName;
  public int $dataCount;

  public function __construct(
    string $hover,
    string $route,
    string $img,
    string $alt,
    string $dataName,
    int $dataCount
  ) {
    $this->hover = $hover;
    $this->route = $route;
    $this->img = $img;
    $this->alt = $alt;
    $this->dataName = $dataName;
    $this->dataCount = $dataCount;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.data.data-card-count');
  }
}
