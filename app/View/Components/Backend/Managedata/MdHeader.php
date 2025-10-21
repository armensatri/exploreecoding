<?php

namespace App\View\Components\Backend\Managedata;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MdHeader extends Component
{
  public $image;
  public $alt;
  public $title;
  public $description;

  public function __construct(
    $image,
    $alt,
    $title,
    $description,
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
