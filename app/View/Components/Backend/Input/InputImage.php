<?php

namespace App\View\Components\Backend\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputImage extends Component
{
  public string $labelFor;
  public string $labelName;
  public string $type;
  public string $id;
  public string $name;
  public string $error;

  public function __construct(
    string $labelFor,
    string $labelName,
    string $type,
    string $id,
    string $name,
    string $error
  ) {
    $this->labelFor = $labelFor;
    $this->labelName = $labelName;
    $this->type = $type;
    $this->id = $id;
    $this->name = $name;
    $this->error = $error;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.input.input-image');
  }
}
