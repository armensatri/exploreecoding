<?php

namespace App\Http\Controllers\Frontend\Tipscoding;

use App\Helpers\Media;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Tipscoding\TipscodingCommentReportUr;
use App\Models\Account\Sosmed;
use App\Models\Tipscoding\Category;
use App\Models\Tipscoding\Tipscoding;
use App\Models\Tipscoding\TipscodingComment;
use App\Models\Tipscoding\TipscodingCommentReport;
use Illuminate\Pagination\LengthAwarePaginator;
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
      ->where('is_reply', false)
      ->whereNull('parent_id')
      ->orderByDesc('is_pinned')
      ->orderByDesc('created_at')
      ->orderByDesc('id')
      ->paginate(10)
      ->withQueryString();

    $pinnedCount = $tipscoding->comments()
      ->where('is_pinned', true)
      ->where('is_reply', false)
      ->whereNull('parent_id')
      ->count();

    $orphanReplies = $tipscoding->comments()
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
      ->where('is_reply', true)
      ->whereNull('parent_id')
      ->latest()
      ->get();

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
      'pinnedCount' => $pinnedCount,
      'orphanReplies' => $orphanReplies,
    ]);
  }

  public function notifications()
  {
    $user = Auth::user();

    $allNotifications = $user
      ->notifications
      ->sortByDesc('created_at')
      ->values();

    $perPage = 10;

    $currentPage = LengthAwarePaginator::resolveCurrentPage();

    $currentItems = $allNotifications
      ->slice(
        ($currentPage - 1) * $perPage,
        $perPage
      )
      ->values();

    $notifications = new LengthAwarePaginator(
      $currentItems,
      $allNotifications->count(),
      $perPage,
      $currentPage,
      [
        'path' => LengthAwarePaginator::resolveCurrentPath(),
        'query' => request()->query(),
      ]
    );

    $unreadCount = $user
      ->unreadNotifications
      ->count();

    return view('frontend.tipscoding.notif.notifications', [
      'title' => 'notification',
      'notifications' => $notifications,
      'unreadCount' => $unreadCount,
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
        'tipscoding.comment.pinned',
      ],
      true
    )) {

      /*
    |--------------------------------------------------------------------------
    | Ambil TipsCoding
    |--------------------------------------------------------------------------
    */

      $tipscoding = Tipscoding::query()
        ->with('category')
        ->findOrFail(
          $data['tipscoding_id']
        );

      /*
    |--------------------------------------------------------------------------
    | Ambil ID komentar dari notification
    |--------------------------------------------------------------------------
    */

      $commentId = $data['comment_id'];

      /*
    |--------------------------------------------------------------------------
    | Ambil komentar target
    |--------------------------------------------------------------------------
    |
    | Ini adalah komentar yang menerima notification.
    |
    */

      $comment = TipscodingComment::query()
        ->where(
          'tipscoding_id',
          $tipscoding->id
        )
        ->findOrFail($commentId);

      /*
    |--------------------------------------------------------------------------
    | ID komentar yang akan menjadi fragment
    |--------------------------------------------------------------------------
    |
    | Kita tetap menuju komentar yang sebenarnya menerima
    | reaction / notification.
    |
    */

      $fragmentCommentId = $comment->id;

      /*
    |--------------------------------------------------------------------------
    | Tentukan komentar utama untuk pagination
    |--------------------------------------------------------------------------
    |
    | Kondisi:
    |
    | 1. Komentar utama
    |    → gunakan dirinya sendiri.
    |
    | 2. Reply normal
    |    → gunakan parent comment.
    |
    | 3. Reply orphan
    |    → parent sudah dihapus.
    |    → tidak memiliki komentar utama.
    |
    */

      $targetComment = null;

      if ($comment->parent_id) {

        /*
      |--------------------------------------------------------------------------
      | Reply
      |--------------------------------------------------------------------------
      */

        $targetComment = TipscodingComment::query()
          ->where(
            'tipscoding_id',
            $tipscoding->id
          )
          ->where(
            'status',
            'approved'
          )
          ->where(
            'is_reply',
            false
          )
          ->whereNull('parent_id')
          ->find(
            $comment->parent_id
          );
      } else {

        /*
      |--------------------------------------------------------------------------
      | Komentar utama
      |--------------------------------------------------------------------------
      */

        $targetComment = $comment;
      }

      /*
    |--------------------------------------------------------------------------
    | Tentukan halaman komentar
    |--------------------------------------------------------------------------
    |
    | Jika parent masih ada:
    | hitung posisi menggunakan urutan yang sama dengan
    | query komentar di TipscodingController@show().
    |
    | Jika parent sudah dihapus:
    | reply menjadi orphan dan ditampilkan melalui
    | $orphanReplies menggunakan get(), bukan paginate().
    |
    */

      if ($targetComment) {

        /*
      |--------------------------------------------------------------------------
      | Hitung posisi komentar utama
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
          ->where(
            'is_reply',
            false
          )
          ->whereNull('parent_id')
          ->where(function ($query) use ($targetComment) {

            /*
          |--------------------------------------------------------------------------
          | Komentar pinned berada lebih dahulu
          |--------------------------------------------------------------------------
          */

            $query
              ->where(
                'is_pinned',
                '>',
                $targetComment->is_pinned
              )

              /*
            |--------------------------------------------------------------------------
            | Jika status pinned sama,
            | gunakan created_at DESC
            |--------------------------------------------------------------------------
            */

              ->orWhere(function ($query) use ($targetComment) {

                $query
                  ->where(
                    'is_pinned',
                    $targetComment->is_pinned
                  )
                  ->where(
                    'created_at',
                    '>',
                    $targetComment->created_at
                  );
              })

              /*
            |--------------------------------------------------------------------------
            | Jika created_at sama,
            | gunakan id DESC
            |--------------------------------------------------------------------------
            */

              ->orWhere(function ($query) use ($targetComment) {

                $query
                  ->where(
                    'is_pinned',
                    $targetComment->is_pinned
                  )
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

        /*
      |--------------------------------------------------------------------------
      | Posisi dimulai dari 1
      |--------------------------------------------------------------------------
      */

        $commentPosition++;

        /*
      |--------------------------------------------------------------------------
      | Jumlah komentar per halaman
      |--------------------------------------------------------------------------
      */

        $commentsPerPage = 10;

        /*
      |--------------------------------------------------------------------------
      | Tentukan halaman
      |--------------------------------------------------------------------------
      */

        $page = (int) ceil(
          $commentPosition / $commentsPerPage
        );
      } else {

        /*
      |--------------------------------------------------------------------------
      | Orphan reply
      |--------------------------------------------------------------------------
      |
      | Parent sudah dihapus.
      |
      | Di TipscodingController@show(), orphan reply:
      |
      | ->where('is_reply', true)
      | ->whereNull('parent_id')
      | ->latest()
      | ->get();
      |
      | Artinya orphan reply tidak menggunakan pagination.
      |
      | Karena itu kita tidak perlu menghitung posisi
      | komentar utama.
      |
      */

        $page = 1;
      }

      /*
    |--------------------------------------------------------------------------
    | Redirect ke halaman TipsCoding
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

            'page' =>
            $page,
          ]
        )
        ->withFragment(
          'comment-' . $fragmentCommentId
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Notification lainnya
    |--------------------------------------------------------------------------
    */

    return redirect()
      ->route('notifications.index');
  }

  public function readAllNotifications()
  {
    $user = Auth::user();

    $user->unreadNotifications->each(function ($notification) {
      $notification->markAsRead();
    });

    Alert::html(
      'success',
      "Data semua!
        <span style='color:#2563eb;'>
          notification
        </span> sudah di baca",
      'success'
    );

    return back();
  }

  public function deleteNotification(string $notification)
  {
    $user = Auth::user();

    $notification = $user
      ->notifications
      ->firstWhere('id', $notification);

    abort_if(! $notification, 404);

    $notification->delete();

    Alert::html(
      'success',
      "Data!
        <span style='color:#2563eb;'>
          notification
        </span> berhasil di hapus",
      'success'
    );

    return back();
  }

  public function deleteAllNotifications()
  {
    $user = Auth::user();

    $user->notifications->each(function ($notification) {
      $notification->delete();
    });

    Alert::html(
      'success',
      "Data semua!
        <span style='color:#2563eb;'>
          notification
        </span> berhasil di hapus",
      'success'
    );

    return back();
  }

  public function reportComment(
    TipscodingCommentReportUr $request,
    string $category,
    string $tipscoding,
    TipscodingComment $comment
  ) {
    $user = Auth::user();

    abort_if(
      $comment->status !== 'approved',
      404
    );

    abort_if(
      $comment->tipscoding->slug !== $tipscoding,
      404
    );

    $report = TipscodingCommentReport::firstOrCreate(
      [
        'tipscoding_comment_id' => $comment->id,
        'user_id' => $user->id,
      ],
      [
        'reason' => $request->validated('reason'),
        'description' => $request->validated('description'),
        'status' => 'pending',
      ]
    );

    if (! $report->wasRecentlyCreated) {
      Alert::html(
        'Oops...',
        "Kamu sudah!
        <span style='color:#2563eb;'>
          melaporkan
        </span> komentar ini",
        'warning'
      );

      return back();
    }

    Alert::html(
      'success',
      "Laporan komentar berhasil !
        <span style='color:#2563eb;'>
          di kirim
        </span> dan akan diperiksa",
      'success'
    );

    return back();
  }
}
