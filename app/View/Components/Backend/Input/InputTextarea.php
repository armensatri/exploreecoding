<?php

namespace App\View\Components\Backend\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputTextarea extends Component
{
  public function __construct(
    public string $labelFor,
    public string $labelName,
    public string $id,
    public string $name,
    public ?string $valueOld = null,
    public ?string $valueDefault = null,
    public ?string $error = null,
    public ?string $placeholder = null,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.input.input-textarea');
  }
}
