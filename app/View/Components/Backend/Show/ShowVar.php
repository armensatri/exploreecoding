<?php

namespace App\View\Components\Backend\Show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowVar extends Component
{
  public string $name;
  public mixed $var;

  public function __construct(string $name, mixed $var)
  {
    $this->name = $name;
    $this->var = $var;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.show.show-var');
  }
}
