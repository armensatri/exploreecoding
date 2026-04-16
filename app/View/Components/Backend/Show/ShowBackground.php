<?php

namespace App\View\Components\Backend\Show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowBackground extends Component
{
  public $name;
  public $bg;
  public $text;
  public $var;

  public function __construct(
    $name,
    $bg,
    $text,
    $var,
  ) {
    $this->name = $name;
    $this->bg = $bg;
    $this->text = $text;
    $this->var = $var;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.show.show-background');
  }
}
