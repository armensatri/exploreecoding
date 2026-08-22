<?php

namespace App\View\Components\Frontend\Media;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialMedia extends Component
{
  public function __construct(
    public string $link,
    public string $image,
    public string $tooltip,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.frontend.media.social-media');
  }
}
