<?php

namespace App\View\Components\Backend\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class InputSelect extends Component
{
  public function __construct(
    public ?string $labelFor = null,
    public ?string $labelName = null,
    public ?string $id = null,
    public ?string $name = null,
    public ?Collection $items = null,
    public mixed $valueOld = null,
    public mixed $valueDefault = null,
    public ?string $error = null,
    public ?string $placeholder = null,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.input.input-select');
  }
}
