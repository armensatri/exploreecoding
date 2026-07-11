<?php

namespace App\View\Components\Backend\Managedata;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MdHeader extends Component
{
  public function __construct(
    public string $image,
    public string $alt,
    public string $title,
    public string $description,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.backend.managedata.md-header');
  }
}
