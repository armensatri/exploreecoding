<?php

namespace App\View\Components\Backend\Managedata;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MdHeader extends Component
{
  public string $image;
  public string $alt;
  public string $title;
  public string $description;

  public function __construct(
    string $image,
    string $alt,
    string $title,
    string $description,
  ) {
    $this->image = $image;
    $this->alt = $alt;
    $this->title = $title;
    $this->description = $description;
  }

  public function render(): View|Closure|string
  {
    return view('components.backend.managedata.md-header');
  }
}
