<?php

namespace App\View\Components\Frontend\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Question extends Component
{
  public $heading;
  public $collapse;
  public $question;
  public $answer;

  public function __construct(
    $heading,
    $collapse,
    $question,
    $answer,
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
