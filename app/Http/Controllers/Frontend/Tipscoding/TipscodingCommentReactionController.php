<?php

namespace App\Http\Controllers\Frontend\Tipscoding;

use App\Http\Controllers\Controller;
use App\Models\Tipscoding\Tipscoding;
use App\Models\Tipscoding\TipscodingComment;
use App\Models\Tipscoding\TipscodingCommentReaction;
use App\Notifications\TipscodingCommentReactionNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipscodingCommentReactionController extends Controller
{
  public function store(
    Request $request,
    string $category,
    Tipscoding $tipscoding,
    TipscodingComment $comment,
    string $type
  ): JsonResponse|RedirectResponse {

    /*
    |--------------------------------------------------------------------------
    | Pastikan comment milik tipscoding
    |--------------------------------------------------------------------------
    */

    if ($comment->tipscoding_id !== $tipscoding->id) {
      abort(404);
    }


    /*
    |--------------------------------------------------------------------------
    | Ambil user pemilik comment
    |--------------------------------------------------------------------------
    */

    $comment->load('user');


    /*
    |--------------------------------------------------------------------------
    | Validasi reaction
    |--------------------------------------------------------------------------
    */

    if (! in_array($type, [
      'like',
      'dislike',
    ], true)) {

      abort(404);
    }


    /*
    |--------------------------------------------------------------------------
    | Cari reaction user
    |--------------------------------------------------------------------------
    */

    $reaction =
      TipscodingCommentReaction::query()
      ->where(
        'comment_id',
        $comment->id
      )
      ->where(
        'user_id',
        Auth::id()
      )
      ->first();


    /*
    |--------------------------------------------------------------------------
    | Belum punya reaction
    |--------------------------------------------------------------------------
    */

    if (! $reaction) {

      TipscodingCommentReaction::create([
        'comment_id' => $comment->id,
        'user_id' => Auth::id(),
        'type' => $type,
      ]);

      $userReaction = $type;
    }


    /*
    |--------------------------------------------------------------------------
    | Klik reaction yang sama
    |--------------------------------------------------------------------------
    |
    | Like -> Like = hapus
    | Dislike -> Dislike = hapus
    |
    */ elseif ($reaction->type === $type) {

      $reaction->delete();

      $userReaction = null;
    }


    /*
    |--------------------------------------------------------------------------
    | Ganti reaction
    |--------------------------------------------------------------------------
    |
    | Like -> Dislike
    | Dislike -> Like
    |
    */ else {

      $reaction->update([
        'type' => $type,
      ]);

      $userReaction = $type;
    }


    /*
    |--------------------------------------------------------------------------
    | Notification Like
    |--------------------------------------------------------------------------
    |
    | Belum reaction -> Like       = notification
    | Dislike -> Like              = notification
    | Like -> Like                 = tidak ada
    | Like -> Dislike              = tidak ada
    |
    | User tidak mendapatkan
    | notification dari dirinya sendiri.
    |
    */

    if (
      $userReaction === 'like' &&
      $comment->user_id !== Auth::id()
    ) {

      $comment->user->notify(
        new TipscodingCommentReactionNotification(
          $comment,
          'like'
        )
      );
    }


    /*
    |--------------------------------------------------------------------------
    | Hitung jumlah Like
    |--------------------------------------------------------------------------
    */

    $likesCount =
      TipscodingCommentReaction::query()
      ->where(
        'comment_id',
        $comment->id
      )
      ->where(
        'type',
        'like'
      )
      ->count();


    /*
    |--------------------------------------------------------------------------
    | Hitung jumlah Dislike
    |--------------------------------------------------------------------------
    */

    $dislikesCount =
      TipscodingCommentReaction::query()
      ->where(
        'comment_id',
        $comment->id
      )
      ->where(
        'type',
        'dislike'
      )
      ->count();


    /*
    |--------------------------------------------------------------------------
    | AJAX / JSON
    |--------------------------------------------------------------------------
    */

    if ($request->expectsJson()) {

      return response()->json([
        'success' => true,

        'comment_id' =>
        $comment->id,

        'reaction' =>
        $userReaction,

        'likes_count' =>
        $likesCount,

        'dislikes_count' =>
        $dislikesCount,
      ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Fallback
    |--------------------------------------------------------------------------
    */

    return back();
  }
}
