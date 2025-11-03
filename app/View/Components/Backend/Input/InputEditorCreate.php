<?php

namespace App\View\Components\Backend\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputEditorCreate extends Component
{
  public $labelFor;
  public $labelName;
  public $id;
  public $error;

  public function __construct(
    $labelFor
  ) {
    //
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.backend.input.input-editor-create');
  }
}
