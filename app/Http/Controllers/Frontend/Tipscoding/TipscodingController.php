<?php

namespace App\Http\Controllers\Frontend\Tipscoding;

use App\Helpers\Media;
use App\Http\Controllers\Controller;
use App\Models\Account\Sosmed;
use App\Models\Tipscoding\Category;
use App\Models\Tipscoding\Tipscoding;
use App\Models\Tipscoding\TipscodingComment;
use Illuminate\Support\Facades\Auth;
use Jorenvh\Share\Share;
use RealRashid\SweetAlert\Facades\Alert;

class TipscodingController extends Controller
{
  public function index()
  {
    $categories = Category::query()
      ->select([
        'id',
        'sc',
        'name',
        'image',
        'slug',
      ])
      ->withCount('tipscodings')
      ->orderBy('sc', 'asc')
      ->limit(15)
      ->get();

    $tipscodings = Tipscoding::query()
      ->select([
        'id',
        'title',
        'excerpt',
        'category_id',
        'user_id',
        'created_at',
        'slug',
      ])
      ->withCount('tipscodingviews')
      ->with([
        'category:id,name,slug,image',
        'user:id,username,image',
      ])
      ->orderBy('id', 'desc')
      ->paginate(12);

    return view('frontend.tipscoding.tipscoding.index', [
      'title' => 'Semua tipscodings',
      'categories' => $categories,
      'tipscodings' => $tipscodings,
    ]);
  }

  public function category(Category $category)
  {
    $categories = Category::query()
      ->select([
        'id',
        'sc',
        'name',
        'image',
        'slug',
      ])
      ->withCount('tipscodings')
      ->orderBy('sc', 'asc')
      ->limit(15)
      ->get();

    $tipscodings = Tipscoding::query()
      ->whereHas('category', function ($q) use ($category) {
        $q->where('slug', $category->slug);
      })
      ->select([
        'id',
        'title',
        'slug',
        'excerpt',
        'category_id',
        'user_id',
        'created_at',
      ])
      ->withCount('tipscodingviews')
      ->with([
        'category:id,name,slug,image',
        'user:id,username,image',
      ])
      ->orderBy('id', 'desc')
      ->paginate(12);

    $tipstotal = Tipscoding::count();

    return view('frontend.tipscoding.tipscoding-category.index', [
      'title' => "Tipscodings category $category->slug",
      'category' => $category,
      'categories' => $categories,
      'tipscodings' => $tipscodings,
      'tipstotal' => $tipstotal,
    ]);
  }

  public function show(Category $category, Tipscoding $tipscoding)
  {
    if (!Auth::check()) {
      Alert::html(
        'Oops...',
        "Login dulu!
        <span style='color:#2563eb;'>
          untuk membaca
        </span> tipscoding",
        'warning'
      );

      return redirect()->route('login');
    }

    $tipscoding->tipscodingviews()->firstOrCreate([
      'user_id' => Auth::id()
    ]);

    $tipscoding->load([
      'category:id,name,slug,image',
      'user:id,username,image,bio,role_id',
      'user.role:id,name'
    ])->loadCount('tipscodingviews');

    if ($tipscoding->user?->role?->name !== 'creator') {
      abort(404);
    }

    $sosmed = Sosmed::where('user_id', $tipscoding->user_id)->first();

    $share = new Share();

    $shareLinks = $share
      ->page(
        request()->url(),
        $tipscoding->title
      )
      ->facebook()
      ->twitter()
      ->linkedin()
      ->whatsapp()
      ->telegram()
      ->getRawLinks();

    $comments = $tipscoding->comments()
      ->withCount([
        'reactions as likes_count' => function ($query) {
          $query->where('type', 'like');
        },

        'reactions as dislikes_count' => function ($query) {
          $query->where('type', 'dislike');
        },
      ])
      ->with([
        'user:id,username,image',

        'reactions' => function ($query) {
          $query
            ->where('user_id', Auth::id())
            ->select([
              'id',
              'comment_id',
              'user_id',
              'type',
            ]);
        },

        'replies' => function ($query) {
          $query
            ->withCount([
              'reactions as likes_count' => function ($query) {
                $query->where('type', 'like');
              },

              'reactions as dislikes_count' => function ($query) {
                $query->where('type', 'dislike');
              },
            ])
            ->with([
              'user:id,username,image',

              'reactions' => function ($query) {
                $query
                  ->where('user_id', Auth::id())
                  ->select([
                    'id',
                    'comment_id',
                    'user_id',
                    'type',
                  ]);
              },
            ])
            ->where('status', 'approved')
            ->latest();
        },
      ])
      ->where('status', 'approved')
      ->whereNull('parent_id')
      ->orderByDesc('is_pinned')
      ->orderByDesc('created_at')
      ->orderByDesc('id')
      ->paginate(10)
      ->withQueryString();

    $tipstotal = Tipscoding::count();
    $categorytotal = Category::count();

    $baseQuery = fn() => Tipscoding::query()
      ->select([
        'id',
        'user_id',
        'category_id',
        'title',
        'slug',
        'image',
        'created_at'
      ])->latest();

    $relatedTips = $baseQuery()
      ->where('category_id', $tipscoding->category_id)
      ->whereKeyNot($tipscoding->id)
      ->limit(6)
      ->get();

    if (($needed = 6 - $relatedTips->count()) > 0) {
      $excludeIds = $relatedTips
        ->pluck('id')
        ->push($tipscoding->id);

      $additionalTips = $baseQuery()
        ->whereNotIn('id', $excludeIds)
        ->limit($needed)
        ->get();

      $relatedTips = $relatedTips->concat($additionalTips);
    }

    $relatedTips->load([
      'user:id,username',
      'category:id,slug'
    ]);

    $relatedcategories = Category::query()
      ->select([
        'id',
        'name',
        'slug',
        'image'
      ])
      ->where('id', '!=', $category->id)
      ->inRandomOrder()
      ->limit(10)
      ->get();

    return view('frontend.tipscoding.show.index', [
      'title' => "tipscodings $category->slug $tipscoding->slug",
      'category' => $category,
      'tipscoding' => $tipscoding,
      'relatedTips'   => $relatedTips,
      'tipstotal' => $tipstotal,
      'categorytotal' => $categorytotal,
      'relatedcategories' => $relatedcategories,
      'socialMedias' => Media::Sosmed(),
      'sosmed' => $sosmed,
      'shareLinks' => $shareLinks,
      'comments' => $comments,
    ]);
  }

  public function notifications()
  {
    $notifications = Auth::user()
      ->notifications
      ->sortByDesc('created_at')
      ->values();

    return view('frontend.tipscoding.notif.notifications', [
      'title' => 'notification',
      'notifications' => $notifications
    ]);
  }

  public function readNotification(string $notification)
  {
    $notification = Auth::user()
      ->notifications
      ->firstWhere('id', $notification);

    abort_if(! $notification, 404);

    $notification->markAsRead();

    $data = $notification->data;

    if (in_array(
      $data['type'] ?? null,
      [
        'tipscoding.comment',
        'tipscoding.comment.reply',
        'tipscoding.comment.reaction',
      ],
      true
    )) {
      $tipscoding = Tipscoding::query()
        ->with('category')
        ->findOrFail(
          $data['tipscoding_id']
        );

      $commentId = $data['comment_id'];

      /*
        |--------------------------------------------------------------------------
        | Ambil komentar
        |--------------------------------------------------------------------------
        */

      $comment = TipscodingComment::query()
        ->where(
          'tipscoding_id',
          $tipscoding->id
        )
        ->findOrFail($commentId);

      /*
        |--------------------------------------------------------------------------
        | Jika reply, gunakan komentar utama
        | untuk menentukan halaman pagination.
        |--------------------------------------------------------------------------
        */

      $targetCommentId =
        $comment->parent_id
        ?? $comment->id;

      $targetComment = TipscodingComment::query()
        ->where(
          'tipscoding_id',
          $tipscoding->id
        )
        ->where(
          'status',
          'approved'
        )
        ->whereNull('parent_id')
        ->findOrFail($targetCommentId);

      /*
        |--------------------------------------------------------------------------
        | Hitung posisi komentar berdasarkan urutan
        | yang sama dengan show():
        |
        | ->latest()
        | ->paginate(10)
        |--------------------------------------------------------------------------
        */

      $commentPosition = TipscodingComment::query()
        ->where(
          'tipscoding_id',
          $tipscoding->id
        )
        ->where(
          'status',
          'approved'
        )
        ->whereNull('parent_id')
        ->where(function ($query) use ($targetComment) {

          $query
            ->where(
              'created_at',
              '>',
              $targetComment->created_at
            )
            ->orWhere(function ($query) use ($targetComment) {

              $query
                ->where(
                  'created_at',
                  '=',
                  $targetComment->created_at
                )
                ->where(
                  'id',
                  '>',
                  $targetComment->id
                );
            });
        })
        ->count();

      $commentPosition++;

      /*
        |--------------------------------------------------------------------------
        | Pagination komentar
        |--------------------------------------------------------------------------
        */

      $commentsPerPage = 10;

      $page = (int) ceil(
        $commentPosition / $commentsPerPage
      );

      /*
        |--------------------------------------------------------------------------
        | Redirect ke Tipscoding + halaman komentar
        |--------------------------------------------------------------------------
        */

      return redirect()
        ->route(
          'ec-tipscodings.show',
          [
            'category' =>
            $tipscoding->category->slug,

            'tipscoding' =>
            $tipscoding->slug,

            'page' => $page,
          ]
        )
        ->withFragment(
          'comment-' . $commentId
        );
    }

    return redirect()
      ->route('notifications.index');
  }
}
