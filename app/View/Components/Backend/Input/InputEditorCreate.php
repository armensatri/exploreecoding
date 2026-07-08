<?php

namespace App\View\Components\Backend\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputEditorCreate extends Component
{
  public string $labelFor;
  public string $labelName;
  public string $id;
  public string|null $error;

  public function __construct(
    string $labelFor,
    string $labelName,
    string $id,
    string|null $error
  ) {
    $this->labelFor = $labelFor;
    $this->labelName = $labelName;
    $this->id = $id;
    $this->error = $error;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.input.input-editor-create');
  }
}
