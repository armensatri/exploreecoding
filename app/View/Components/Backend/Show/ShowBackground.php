<?php

namespace App\View\Components\Backend\Show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowBackground extends Component
{
  public string $name;
  public string $bg;
  public string $text;
  public mixed $var;

  public function __construct(
    string $name,
    string $bg,
    string $text,
    mixed $var
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
