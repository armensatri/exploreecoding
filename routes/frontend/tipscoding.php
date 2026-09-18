<?php

use App\Http\Controllers\Frontend\Tipscoding\CategoryController;
use App\Http\Controllers\Frontend\Tipscoding\TipscodingCommentController;
use App\Http\Controllers\Frontend\Tipscoding\TipscodingCommentReactionController;
use App\Http\Controllers\Frontend\Tipscoding\TipscodingController;
use Illuminate\Support\Facades\Route;
use Jorenvh\Share\Share;

Route::controller(TipscodingController::class)->group(
  function () {
    Route::get('/ec/tipscodings', 'index')
      ->name('ec-tipscodings.index');

    Route::get('/ec/tipscodings/category/{category:slug}', 'category')
      ->name('ec-tipscodings.category');

    Route::get(
      '/ec/tipscodings/category/{category:slug}/tips/{tipscoding:slug}',
      'show'
    )->name('ec-tipscodings.show');
  }
);

Route::get('/ec/tipscoding/categories', [
  CategoryController::class,
  'index'
])->name('ec-categories.index');

Route::post(
  '/ec/tipscodings/{category}/{tipscoding}/comments',
  [TipscodingCommentController::class, 'store']
)->middleware('auth')->name('tipscodings.comments.store');

Route::patch(
  '/ec/tipscodings/{category}/{tipscoding}/comments/{comment}',
  [TipscodingCommentController::class, 'update']
)->middleware('auth')->name('tipscodings.comments.update');

Route::delete(
  '/ec/tipscodings/{category}/{tipscoding}/comments/{comment}',
  [TipscodingCommentController::class, 'destroy']
)->middleware('auth')->name('tipscodings.comments.destroy');

Route::post(
  '/ec/tipscodings/{category}/{tipscoding}/comments/{comment}/reaction/{type}',
  [TipscodingCommentReactionController::class, 'store']
)->middleware('auth')->name('tipscodings.comments.reaction');

Route::get(
  '/ec/notifications',
  [TipscodingController::class, 'notifications']
)->middleware('auth')->name('notifications.index');

Route::get(
  '/notifications/{notification}',
  [TipscodingController::class, 'readNotification']
)->middleware('auth')->name('notifications.read');

Route::patch(
  '/ec/tipscodings/{category}/{tipscoding}/comments/{comment}/pin',
  [TipscodingCommentController::class, 'pin']
)->middleware('auth')->name('tipscodings.comments.pin');

Route::get('/test-share', function () {
  $share = new Share();

  return $share
    ->page(
      'https://explorecoding.test',
      'ExploreCoding'
    )
    ->facebook()
    ->twitter()
    ->linkedin()
    ->whatsapp()
    ->telegram()
    ->getRawLinks();
});
