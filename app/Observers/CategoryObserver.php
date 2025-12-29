<?php

namespace App\Observers;

use App\Models\Tipscoding\Category;

class CategoryObserver
{
  /**
   * Handle the Category "created" event.
   */
  public function created(Category $category): void
  {
    //
  }

  /**
   * Handle the Category "updated" event.
   */
  public function updated(Category $category): void
  {
    //
  }

  /**
   * Handle the Category "deleted" event.
   */
  public function deleted(Category $category): void
  {
    //
  }
}
