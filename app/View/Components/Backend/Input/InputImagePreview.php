<?php

namespace App\View\Components\Backend\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputImagePreview extends Component
{
  public function __construct(
    public string $labelFor,
    public string $labelName,
    public ?string $image = null,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.input.input-image-preview');
  }
}
