<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Backend\Pagination\Pagination;

use App\View\Components\Backend\Button\{
  ButtonCreate,
  ButtonCreateData,
  ButtonEditData,
};

use App\View\Components\Backend\Input\{
  Input,
  InputImage,
  InputImagePreview,
  InputSelect,
  InputTextarea,
};

use App\View\Components\Backend\Show\{
  ShowAction,
  ShowBackground,
  ShowData,
  ShowImage,
  ShowTextColor,
};

use App\View\Components\Backend\Sidebar\{
  Menu,
  Submenu,
};

use App\View\Components\Backend\Table\{
  TdAccess,
  TdAction,
  TdImage,
  TdVar,
  TdVarBg,
  TdVarWidth,
};

use App\View\Components\Backend\TableHeader\{
  Backup,
  Description,
  Draft,
  Filter,
  Indexs,
  Refresh,
  Search,
  Th,
  ThAction,
};

class BackendServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    // BUTTON
    Blade::component('button-create', ButtonCreate::class);
    Blade::component('button-create-data', ButtonCreateData::class);
    Blade::component('button-edit-data', ButtonEditData::class);

    // INPUT
    Blade::component('input', Input::class);
    Blade::component('input-image', InputImage::class);
    Blade::component('input-image-preview', InputImagePreview::class);
    Blade::component('input-select', InputSelect::class);
    Blade::component('input-textarea', InputTextarea::class);

    // PAGINATION
    Blade::component('pagination', Pagination::class);

    // SHOW
    Blade::component('show-action', ShowAction::class);
    Blade::component('show-background', ShowBackground::class);
    Blade::component('show-data', ShowData::class);
    Blade::component('show-image', ShowImage::class);
    Blade::component('show-text-color', ShowTextColor::class);

    // SIDEBAR
    Blade::component('menu', Menu::class);
    Blade::component('submenu', Submenu::class);

    // TABLE
    Blade::component('td-access', TdAccess::class);
    Blade::component('td-action', TdAction::class);
    Blade::component('td-image', TdImage::class);
    Blade::component('td-var', TdVar::class);
    Blade::component('td-var-bg', TdVarBg::class);
    Blade::component('td-var-width', TdVarWidth::class);

    // TABLE HEADER
    Blade::component('backup', Backup::class);
    Blade::component('description', Description::class);
    Blade::component('draft', Draft::class);
    Blade::component('indexs', Indexs::class);
    Blade::component('refresh', Refresh::class);
    Blade::component('search', Search::class);
    Blade::component('filter', Filter::class);
    Blade::component('th', Th::class);
    Blade::component('th-action', ThAction::class);
  }
}
