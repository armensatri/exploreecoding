<?php

namespace App\Http\Controllers\Frontend\Tipscoding;

use App\Http\Controllers\Controller;
use App\Models\Tipscoding\Tipscoding;
use App\Models\Tipscoding\TipscodingComment;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\TipscodingCommentNotification;
use App\Http\Requests\Tipscoding\Tipscoding\TipscodingCommentUr;
use App\Notifications\TipscodingCommentPinnedNotification;

class TipscodingCommentController extends Controller
{
  public function store(
    TipscodingCommentUr $request,
    string $category,
    Tipscoding $tipscoding
  ) {
    $parentId = $request->validated('parent_id');

    /*
    |--------------------------------------------------------------------------
    | Jika ini adalah reply
    |--------------------------------------------------------------------------
    */

    if ($parentId) {
      TipscodingComment::query()
        ->where('id', $parentId)
        ->where('tipscoding_id', $tipscoding->id)
        ->whereNull('parent_id')
        ->where('status', 'approved')
        ->firstOrFail();
    }


    /*
    |--------------------------------------------------------------------------
    | Simpan comment / reply
    |--------------------------------------------------------------------------
    */

    $comment = TipscodingComment::create([
      'tipscoding_id' => $tipscoding->id,
      'user_id' => Auth::id(),
      'parent_id' => $parentId,
      'is_reply' => $parentId !== null,
      'comment' => $request->validated('comment'),
      'status' => 'approved',
    ]);

    if (is_null($parentId)) {

      // Komentar utama
      if ($tipscoding->user_id !== Auth::id()) {
        $tipscoding->user->notify(
          new TipscodingCommentNotification($comment)
        );
      }
    } else {

      // Reply
      $parentComment = TipscodingComment::query()
        ->with('user')
        ->findOrFail($parentId);

      if ($parentComment->user_id !== Auth::id()) {
        $parentComment->user->notify(
          new TipscodingCommentNotification($comment)
        );
      }
    }


    /*
    |--------------------------------------------------------------------------
    | Alert
    |--------------------------------------------------------------------------
    */

    Alert::html(
      'success',
      $parentId
        ? "Balasan pada comment di post tipscoding
            <span style='color:#2563eb;'>
              {$tipscoding->title}
            </span>
            berhasil ditambahkan"
        : "Data comment di post tipscoding
            <span style='color:#2563eb;'>
              {$tipscoding->title}
            </span>
            berhasil ditambahkan",
      'success'
    );

    return back();
  }


  public function update(
    TipscodingCommentUr $request,
    string $category,
    Tipscoding $tipscoding,
    TipscodingComment $comment
  ) {
    /*
    |--------------------------------------------------------------------------
    | Pastikan comment milik TipsCoding ini
    |--------------------------------------------------------------------------
    */

    if ($comment->tipscoding_id !== $tipscoding->id) {
      abort(404);
    }


    $user = Auth::user();
    $role = $user->role?->name;


    /*
    |--------------------------------------------------------------------------
    | Permission
    |--------------------------------------------------------------------------
    */

    $isCommentOwner =
      $comment->user_id === $user->id;

    $canManageAll = in_array($role, [
      'owner',
      'superadmin',
    ]);

    $canManageTipscoding =
      $role === 'creator' &&
      $tipscoding->user_id === $user->id;


    if (
      ! $isCommentOwner &&
      ! $canManageAll &&
      ! $canManageTipscoding
    ) {
      abort(403);
    }


    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    $comment->update([
      'comment' => $request->validated('comment'),
      'edited_at' => now(),
    ]);


    /*
    |--------------------------------------------------------------------------
    | Alert
    |--------------------------------------------------------------------------
    */

    Alert::html(
      'success',
      "Data comment di post tipscoding title!
        <span style='color:#2563eb;'>
          {$tipscoding->title}
        </span>
        berhasil di update",
      'success'
    );

    return back();
  }


  public function destroy(
    string $category,
    Tipscoding $tipscoding,
    TipscodingComment $comment
  ) {
    /*
    |--------------------------------------------------------------------------
    | Pastikan comment milik TipsCoding ini
    |--------------------------------------------------------------------------
    */

    if ($comment->tipscoding_id !== $tipscoding->id) {
      abort(404);
    }


    $user = Auth::user();
    $role = $user->role?->name;


    /*
    |--------------------------------------------------------------------------
    | Permission
    |--------------------------------------------------------------------------
    */

    $isCommentOwner =
      $comment->user_id === $user->id;

    $canManageAll = in_array($role, [
      'owner',
      'superadmin',
    ]);

    $canManageTipscoding =
      $role === 'creator' &&
      $tipscoding->user_id === $user->id;


    if (
      ! $isCommentOwner &&
      ! $canManageAll &&
      ! $canManageTipscoding
    ) {
      abort(403);
    }


    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    $comment->delete();


    /*
    |--------------------------------------------------------------------------
    | Alert
    |--------------------------------------------------------------------------
    */

    Alert::html(
      'success',
      "Data comment di post tipscoding title!
        <span style='color:#2563eb;'>
          {$tipscoding->title}
        </span>
        berhasil di hapus",
      'success'
    );

    return back();
  }

  public function pin(
    string $category,
    Tipscoding $tipscoding,
    TipscodingComment $comment
  ) {
    /*
    |--------------------------------------------------------------------------
    | Pastikan comment milik TipsCoding ini
    |--------------------------------------------------------------------------
    */

    if ($comment->tipscoding_id !== $tipscoding->id) {
      abort(404);
    }

    /*
    |--------------------------------------------------------------------------
    | Hanya comment utama yang bisa di-pin
    |--------------------------------------------------------------------------
    */

    if (
      $comment->is_reply ||
      $comment->parent_id !== null
    ) {
      abort(404);
    }

    $user = Auth::user();
    $role = $user->role?->name;

    /*
    |--------------------------------------------------------------------------
    | Permission
    |--------------------------------------------------------------------------
    */

    $canManageAll = in_array($role, [
      'owner',
      'superadmin',
    ]);

    $canManageTipscoding =
      $role === 'creator' &&
      $tipscoding->user_id === $user->id;

    if (
      ! $canManageAll &&
      ! $canManageTipscoding
    ) {
      abort(403);
    }

    /*
|--------------------------------------------------------------------------
| Pin / Unpin
|--------------------------------------------------------------------------
*/


    if ($comment->is_pinned) {

      /*
    |--------------------------------------------------------------------------
    | Unpin
    |--------------------------------------------------------------------------
    */

      $comment->update([
        'is_pinned' => false,
      ]);

      Alert::html(
        'success',
        'Komentar berhasil di-<span style="color:#2563eb;">unpin</span>.',
        'success'
      );
    } else {

      /*
    |--------------------------------------------------------------------------
    | Hitung jumlah pinned
    |--------------------------------------------------------------------------
    */

      $pinnedCount = $tipscoding->comments()
        ->where('is_pinned', true)
        ->whereNull('parent_id')
        ->count();

      /*
    |--------------------------------------------------------------------------
    | Maksimal 5 pinned
    |--------------------------------------------------------------------------
    */

      if ($pinnedCount >= 5) {
        Alert::html(
          'warning',
          'Maksimal <span style="color:#2563eb;">5 komentar</span> yang dapat di-pin.',
          'warning'
        );

        return back();
      }

      /*
    |--------------------------------------------------------------------------
    | Pin
    |--------------------------------------------------------------------------
    */

      $comment->update([
        'is_pinned' => true,
      ]);

      /*
|--------------------------------------------------------------------------
| Notification
|--------------------------------------------------------------------------
*/

      if ($comment->user_id !== Auth::id()) {
        $comment->user?->notify(
          new TipscodingCommentPinnedNotification(
            $comment,
            Auth::user()
          )
        );
      }

      Alert::html(
        'success',
        'Komentar berhasil di-<span style="color:#2563eb;">pin</span>.',
        'success'
      );
    }

    return back();
  }
}
