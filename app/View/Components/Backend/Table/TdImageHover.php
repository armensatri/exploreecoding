<?php

namespace App\View\Components\Backend\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TdImageHover extends Component
{
  public string $asset;
  public string $assetDefault;

  public function __construct(string $asset, string $assetDefault)
  {
    $this->asset = $asset;
    $this->assetDefault = $assetDefault;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.table.td-image-hover');
  }
}
