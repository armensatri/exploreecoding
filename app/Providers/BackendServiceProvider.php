<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Backend\Data\DataCardCount;
use App\View\Components\Backend\Managedata\MdHeader;
use App\View\Components\Backend\Pagination\Pagination;
use App\View\Components\Backend\Visitor\VisitorNavigation;

use App\View\Components\Backend\Sidebar\{
  Menu,
  Submenu,
};

use App\View\Components\Backend\Breadcrumb\{
  Slash,
  BreadcrumbIcon,
  BreadcrumbName,
};

use App\View\Components\Backend\TableHeader\{
  Description,
  Refresh,
  Search,
};

use App\View\Components\Backend\Button\{
  Indexs,
  ButtonCreate,
  ButtonCreateData,
  ButtonUpdateData,
};

use App\View\Components\Backend\Table\{
  Th,
  ThAction,
  TdVar,
  TdVarCenter,
  TdImageHover,
  TdVarBg,
  TdAction,
  TdVarWidth,
};

use App\View\Components\Backend\Input\{
  Input,
  InputImage,
  InputImagePreview,
  InputSelect,
  InputTextarea,
  InputEditorCreate,
};

use App\View\Components\Backend\Show\{
  ShowAction,
  ShowVar,
  ShowBackground,
  ShowImage,
};


class BackendServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    //
  }

  public function boot(): void
  {
    // SIDEBAR
    Blade::component('menu', Menu::class);
    Blade::component('submenu', Submenu::class);

    // PAGINATION
    Blade::component('pagination', Pagination::class);

    // BREADCRUMB
    Blade::component('slash', Slash::class);
    Blade::component('breadcrumb-icon', BreadcrumbIcon::class);
    Blade::component('breadcrumb-name', BreadcrumbName::class);

    // TABLE HEADER
    Blade::component('description', Description::class);
    Blade::component('refresh', Refresh::class);
    Blade::component('search', Search::class);

    // BUTTON
    Blade::component('indexs', Indexs::class);
    Blade::component('button-create', ButtonCreate::class);
    Blade::component('button-create-data', ButtonCreateData::class);
    Blade::component('button-update-data', ButtonUpdateData::class);

    // TABLE
    Blade::component('th', Th::class);
    Blade::component('th-action', ThAction::class);
    Blade::component('td-var', TdVar::class);
    Blade::component('td-var-center', TdVarCenter::class);
    Blade::component('td-image-hover', TdImageHover::class);
    Blade::component('td-var-bg', TdVarBg::class);
    Blade::component('td-action', TdAction::class);
    Blade::component('td-var-width', TdVarWidth::class);

    // INPUT
    Blade::component('input', Input::class);
    Blade::component('input-select', InputSelect::class);
    Blade::component('input-image', InputImage::class);
    Blade::component('input-image-preview', InputImagePreview::class);
    Blade::component('input-textarea', InputTextarea::class);
    Blade::component('input-editor-create', InputEditorCreate::class);

    // SHOW
    Blade::component('show-var', ShowVar::class);
    Blade::component('show-background', ShowBackground::class);
    Blade::component('show-image', ShowImage::class);
    Blade::component('show-action', ShowAction::class);

    // MANAGEDATA
    Blade::component('md-header', MdHeader::class);

    // DATA
    Blade::component('data-card-count', DataCardCount::class);

    // VISITOR
    Blade::component('visitor-navigation', VisitorNavigation::class);
  }
}
