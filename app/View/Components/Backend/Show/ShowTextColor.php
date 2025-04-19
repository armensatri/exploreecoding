<?php

namespace App\View\Components\Backend\Show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowTextColor extends Component
{
  public $name;
  public $textColor;
  public $var;

  public function __construct(
    $name,
    $textColor,
    $var
  ) {
    $this->name = $name;
    $this->textColor = $textColor;
    $this->var = $var;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.show.show-text-color');
  }
}
