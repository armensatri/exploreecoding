<?php

namespace App\View\Components\Backend\Show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowImage extends Component
{
  public function __construct(
    public string $name,
    public ?string $asset = null,
    public ?string $assetDefault = null,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.show.show-image');
  }
}
