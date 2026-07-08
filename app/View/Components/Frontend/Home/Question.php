<?php

namespace App\View\Components\Frontend\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Question extends Component
{
  public string $heading;
  public mixed $collapse;
  public string $question;
  public string $answer;

  public function __construct(
    string $heading,
    mixed $collapse,
    string $question,
    string $answer,
  ) {
    $this->heading = $heading;
    $this->collapse = $collapse;
    $this->question = $question;
    $this->answer = $answer;
  }

  public function render(): View|Closure|string
  {
    return view('components.frontend.home.question');
  }
}
