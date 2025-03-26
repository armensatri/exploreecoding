<?php

namespace App\View\Components\Backend\Show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowData extends Component
{
  public $name;
  public $var;

  public function __construct($name, $var)
  {
    $this->name = $name;
    $this->var = $var;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.show.show-data');
  }
}
