<?php

use App\Providers\AppServiceProvider;
use App\Providers\AuthServiceProvider;
use App\Providers\BackendServiceProvider;
use App\Providers\FrontendfooterpopulerpathsServiceProvider;
use App\Providers\FrontendServiceProvider;
use App\Providers\RouteServiceProvider;
use App\Providers\SidebarServiceProvider;

return [
    AppServiceProvider::class,
    AuthServiceProvider::class,
    BackendServiceProvider::class,
    FrontendServiceProvider::class,
    FrontendfooterpopulerpathsServiceProvider::class,
    RouteServiceProvider::class,
    SidebarServiceProvider::class,
];
