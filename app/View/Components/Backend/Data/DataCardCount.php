<?php

namespace App\View\Components\Backend\Data;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataCardCount extends Component
{
  public $hover;
  public $route;
  public $img;
  public $alt;
  public $dataName;
  public $dataCount;

  public function __construct(
    $hover,
    $route,
    $img,
    $alt,
    $dataName,
    $dataCount,
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
