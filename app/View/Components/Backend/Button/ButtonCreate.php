<?php

namespace App\View\Components\Backend\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonCreate extends Component
{
  public string $route;
  public string $buttonName;

  public function __construct(string $route, string $buttonName)
  {
    $this->route = $route;
    $this->buttonName = $buttonName;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.button.button-create');
  }
}
