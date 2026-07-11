<?php

namespace App\View\Components\Backend\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonUpdateData extends Component
{
  public function __construct(
    public string $buttonName,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.button.button-update-data');
  }
}
