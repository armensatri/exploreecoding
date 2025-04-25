<?php

namespace App\View\Components\Frontend\MenuWeb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExploreLainnya extends Component
{
  public $route;
  public $image;
  public $menu;
  public $description;
  public $bg;
  public $text;
  public $status;

  public function __construct(
    $route,
    $image,
    $menu,
    $description,
    $bg,
    $text,
    $status
  ) {
    $this->route = $route;
    $this->image = $image;
    $this->menu = $menu;
    $this->description = $description;
    $this->bg = $bg;
    $this->text = $text;
    $this->status = $status;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.menu-web.explore-lainnya');
  }
}
