<?php

namespace App\View\Components\Frontend\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Question extends Component
{
  public function __construct(
    public string $heading,
    public mixed $collapse,
    public string $question,
    public string $answer,
  ) {}

  public function render(): View|Closure|string
  {
    return view('components.frontend.home.question');
  }
}
