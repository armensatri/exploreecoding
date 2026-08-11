<?php

namespace App\View\Components\Frontend\Tipscoding;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TipscodingShowShareOnSosmed extends Component
{
  public function __construct(
    public string $link,
    public string $image,
    public string $alt,
    public string $tooltip,
    public int|string $shareCount = 0,
  ) {}

  public function render(): View|Closure|string
  {
    return view(
      'components.frontend.tipscoding.tipscoding-show-share-on-sosmed'
    );
  }
}
