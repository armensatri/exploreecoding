<?php

namespace App\View\Components\Backend\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputImage extends Component
{
  public function __construct(
    public string $labelFor,
    public string $labelName,
    public string $type,
    public string $id,
    public string $name,
    public ?string $error = null,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.input.input-image');
  }
}
