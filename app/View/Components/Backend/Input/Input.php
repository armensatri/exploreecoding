<?php

namespace App\View\Components\Backend\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
  public function __construct(
    public ?string $labelFor = null,
    public ?string $labelName = null,
    public ?string $type = null,
    public ?string $id = null,
    public ?string $name = null,
    public ?string $valueOld = null,
    public ?string $valueDefault = null,
    public ?string $error = null,
    public ?string $placeholder = null,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.input.input');
  }
}
