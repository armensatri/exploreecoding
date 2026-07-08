<?php

namespace App\View\Components\Backend\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputTextarea extends Component
{
  public string $labelFor;
  public string $labelName;
  public string $id;
  public string $name;
  public ?string $valueOld;
  public ?string $valueDefault;
  public ?string $error;
  public ?string $placeholder;

  public function __construct(
    string $labelFor,
    string $labelName,
    string $id,
    string $name,
    ?string $valueOld,
    ?string $valueDefault,
    ?string $error,
    ?string $placeholder,
  ) {
    $this->labelFor = $labelFor;
    $this->labelName = $labelName;
    $this->id = $id;
    $this->name = $name;
    $this->valueOld = $valueOld;
    $this->valueDefault = $valueDefault;
    $this->error = $error;
    $this->placeholder = $placeholder;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.input.input-textarea');
  }
}
