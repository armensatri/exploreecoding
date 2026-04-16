<?php

namespace App\View\Components\Frontend\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MobileDefault extends Component
{
  public $namaApp;
  public $route;
  public $img;
  public $alt;
  public $description;

  public function __construct(
    $namaApp,
    $route,
    $img,
    $alt,
    $description,
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
