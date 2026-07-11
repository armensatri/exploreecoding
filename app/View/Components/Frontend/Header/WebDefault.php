<?php

namespace App\View\Components\Frontend\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WebDefault extends Component
{
  public function __construct(
    public string $namaApp,
    public string $route,
    public string $img,
    public string $alt,
    public string $description,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.frontend.header.web-default');
  }
}
