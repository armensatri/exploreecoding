<?php

namespace App\Providers;

use App\Models\Managemenu\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Collection;

class SidebarServiceProvider extends ServiceProvider
{
  /**
   * Tempat menyimpan data menu agar tidak terjadi query berulang
   * dalam satu kali siklus request halaman (Static Cache).
   */
  protected static ?Collection $cachedMenus = null;

  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    view()->composer('backend.template.sidebar', function ($view) {
      $user = Auth::user();

      // Jika user belum login, kirim collection kosong dan stop proses
      if (!$user) {
        return $view->with('menus', collect());
      }

      // Cek apakah data menu sudah pernah di-query sebelumnya pada request ini
      if (static::$cachedMenus === null) {
        // Jika BELUM, jalankan query ke database dan simpan hasilnya ke dalam static property
        static::$cachedMenus = Menu::with([
          'submenus' => fn($query) => $query->select(
            'id',
            'menu_id',
            'name',
            'ssm',
            'active',
            'routename'
          )->orderBy('ssm', 'asc')
        ])->select(
          'id',
          'name',
          'sm'
        )->whereHas('roles', fn($query) => $query->where(
          'role_id',
          $user->role_id
        ))->orderBy('sm', 'asc')->get();
      }

      // Kirim data menu (baik hasil query baru maupun dari cache) ke view sidebar
      $view->with('menus', static::$cachedMenus);
    });
  }
}
