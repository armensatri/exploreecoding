<?php

namespace App\View\Components\Frontend\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MobileDefault extends Component
{
  public string $namaApp;
  public string $route;
  public string $img;
  public string $alt;
  public string $description;

  public function __construct(
    string $namaApp,
    string $route,
    string $img,
    string $alt,
    string $description,
  ) {
    $this->namaApp = $namaApp;
    $this->route = $route;
    $this->img = $img;
    $this->alt = $alt;
    $this->description = $description;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.header.mobile-default');
  }
}
