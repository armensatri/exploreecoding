<?php

namespace App\View\Components\Backend\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonUpdateData extends Component
{
  public string $buttonName;

  public function __construct(string $buttonName)
  {
    $this->buttonName = $buttonName;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.button.button-update-data');
  }
}
