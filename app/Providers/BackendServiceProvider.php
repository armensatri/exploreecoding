<?php

namespace App\Providers;

use App\View\Components\Backend\Breadcrumb\BreadcrumbIcon;
use App\View\Components\Backend\Breadcrumb\BreadcrumbName;
use App\View\Components\Backend\Breadcrumb\Slash;
use App\View\Components\Backend\Button\ButtonCreate;
use App\View\Components\Backend\Button\ButtonCreateData;
use App\View\Components\Backend\Button\ButtonUpdateData;
use App\View\Components\Backend\Button\Indexs;
use App\View\Components\Backend\Data\DataCardCount;
use App\View\Components\Backend\Input\Input;
use App\View\Components\Backend\Input\InputDisable;
use App\View\Components\Backend\Input\InputEditorCreate;
use App\View\Components\Backend\Input\InputImage;
use App\View\Components\Backend\Input\InputImagePreview;
use App\View\Components\Backend\Input\InputSelect;
use App\View\Components\Backend\Input\InputTextarea;
use App\View\Components\Backend\Managedata\MdHeader;
use App\View\Components\Backend\Nav\Navigation;
use App\View\Components\Backend\Pagination\Pagination;
use App\View\Components\Backend\Show\ShowAction;
use App\View\Components\Backend\Show\ShowBackground;
use App\View\Components\Backend\Show\ShowImage;
use App\View\Components\Backend\Show\ShowVar;
use App\View\Components\Backend\Sidebar\Menu;
use App\View\Components\Backend\Sidebar\Submenu;
use App\View\Components\Backend\Table\TdAction;
use App\View\Components\Backend\Table\TdImageHover;
use App\View\Components\Backend\Table\TdVar;
use App\View\Components\Backend\Table\TdVarBg;
use App\View\Components\Backend\Table\TdVarCenter;
use App\View\Components\Backend\Table\TdVarWidth;
use App\View\Components\Backend\Table\Th;
use App\View\Components\Backend\Table\ThAction;
use App\View\Components\Backend\TableHeader\Description;
use App\View\Components\Backend\TableHeader\Refresh;
use App\View\Components\Backend\TableHeader\Search;
use App\View\Components\Backend\Visitor\VisitorNavigation;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
    Blade::component('input-disable', InputDisable::class);
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

    // VISITOR
    Blade::component('navigation', Navigation::class);
  }
}
