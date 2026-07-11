<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TdImageHover extends Component
{
  public function __construct(
    public ?string $asset = null,
    public string $assetDefault,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.table.td-image-hover');
  }
}
