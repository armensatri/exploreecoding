<?php

namespace App\View\Components\Frontend\Media;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MonitoringSosialMedia extends Component
{
  public function __construct(
    public string $link,
    public string $image,
    public ?string $tooltip = null,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.frontend.media.monitoring-sosial-media');
  }
}
