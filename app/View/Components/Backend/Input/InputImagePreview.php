<?php

namespace App\View\Components\Backend\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputImagePreview extends Component
{
  public string $labelFor;
  public string $labelName;
  public string $image;

  public function __construct(
    string $labelFor,
    string $labelName,
    string $image
  ) {
    $this->labelFor = $labelFor;
    $this->labelName = $labelName;
    $this->image = $image;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.input.input-image-preview');
  }
}
