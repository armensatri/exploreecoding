<?php

namespace App\View\Components\Backend\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSelect extends Component
{
  public ?string $labelFor;
  public ?string $labelName;
  public ?string $id;
  public ?string $name;
  /** @var array|null */
  public ?array $items;
  public mixed $valueOld;
  public mixed $valueDefault;
  public ?string $error;
  public ?string $placeholder;

  public function __construct(
    ?string $labelFor = null,
    ?string $labelName = null,
    ?string $id = null,
    ?string $name = null,
    ?array $items = null,
    $valueOld = null,
    $valueDefault = null,
    ?string $error = null,
    ?string $placeholder = null,
  ) {
    $this->labelFor = $labelFor;
    $this->labelName = $labelName;
    $this->id = $id;
    $this->name = $name;
    $this->items = $items;
    $this->valueOld = $valueOld;
    $this->valueDefault = $valueDefault;
    $this->error = $error;
    $this->placeholder = $placeholder;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.input.input-select');
  }
}
