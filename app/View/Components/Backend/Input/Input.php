<?php

namespace App\View\Components\Backend\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
  public ?string $labelFor;
  public ?string $labelName;
  public ?string $type;
  public ?string $id;
  public ?string $name;
  public ?string $valueOld;
  public ?string $valueDefault;
  public ?string $error;
  public ?string $placeholder;

  public function __construct(
    ?string $labelFor = null,
    ?string $labelName = null,
    ?string $type = null,
    ?string $id = null,
    ?string $name = null,
    ?string $valueOld = null,
    ?string $valueDefault = null,
    ?string $error = null,
    ?string $placeholder = null,
  ) {
    $this->labelFor = $labelFor;
    $this->labelName = $labelName;
    $this->type = $type;
    $this->id = $id;
    $this->name = $name;
    $this->valueOld = $valueOld;
    $this->valueDefault = $valueDefault;
    $this->error = $error;
    $this->placeholder = $placeholder;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.input.input');
  }
}
