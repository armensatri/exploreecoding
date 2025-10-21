<?php

namespace App\View\Components\Frontend\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MobileExploreLainnya extends Component
{
  public $route;
  public $image;
  public $menu;
  public $description;
  public $buttonName;

  public function __construct(
    $route,
    $image,
    $menu,
    $description,
    $buttonName,
  ) {
    $this->route = $route;
    $this->image = $image;
    $this->menu = $menu;
    $this->description = $description;
    $this->buttonName = $buttonName;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.header.mobile-explore-lainnya');
  }
}
