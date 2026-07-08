<?php

namespace App\View\Components\Backend\Show;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowImage extends Component
{
  public string $name;
  public ?string $asset;
  public ?string $assetDefault;

  public function __construct(
    string $name,
    ?string $asset = null,
    ?string $assetDefault = null
  ) {
    $this->name = $name;
    $this->asset = $asset;
    $this->assetDefault = $assetDefault;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.show.show-image');
  }
}
