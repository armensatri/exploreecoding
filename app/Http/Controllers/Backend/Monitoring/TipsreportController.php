<?php

namespace App\Http\Controllers\Backend\Monitoring;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tipscoding\TipscodingCommentReport;
use App\Notifications\TipscodingCommentReportResultNotification;

class TipsreportController extends Controller
{
  public function index()
  {
    $status = request('status');

    $totalReports = TipscodingCommentReport::count();

    $pendingReports = TipscodingCommentReport::where(
      'status',
      'pending'
    )->count();

    $resolvedReports = TipscodingCommentReport::where(
      'status',
      'resolved'
    )->count();

    $rejectedReports = TipscodingCommentReport::where(
      'status',
      'rejected'
    )->count();

    $reports = TipscodingCommentReport::with([
      'user:id,name,username,image',
      'comment:id,user_id,tipscoding_id,comment',
      'comment.user:id,name,username,image',
      'comment.tipscoding:id,title,slug',
      'reviewer:id,name,username',
    ])->when(
      in_array($status, [
        'pending',
        'resolved',
        'rejected',
      ]),
      function ($query) use ($status) {
        $query->where('status', $status);
      }
    )->latest()
      ->paginate(10)
      ->withQueryString();

    return view('backend.monitoring.tipsreport.index', [
      'title' => 'Tipscoding comment report',
      'reports' => $reports,
      'status' => $status,
      'totalReports' => $totalReports,
      'pendingReports' => $pendingReports,
      'resolvedReports' => $resolvedReports,
      'rejectedReports' => $rejectedReports,
    ]);
  }

  public function show(TipscodingCommentReport $report)
  {
    $report->load([
      'user:id,name,username,image',
      'comment:id,user_id,tipscoding_id,comment,status,created_at',
      'comment.user:id,name,username,image',
      'comment.tipscoding:id,title,slug',
      'reviewer:id,name,username,image',
    ]);

    return view('backend.tipscoding.tipsreport.show', [
      'title' => 'Detail tipscoding comment report',
      'report' => $report,
    ]);
  }

  public function resolve(TipscodingCommentReport $report)
  {
    if ($report->status !== 'pending') {
      Alert::html(
        'Oops...',
        'Report ini!
          <span style="color:#2563eb;">
            sudah
          </span> di tangani',
        'warning'
      );

      return back();
    }

    $report->load([
      'comment',
      'user'
    ]);

    if (! $report->comment) {
      Alert::html(
        'Oops...',
        "Komentar yang!
        <span style='color:#2563eb;'>
          di laporkan
        </span> sudah tidak di temukan",
        'warning'
      );

      return back();
    }

    $comment = $report->comment;

    // Komentar sudah hidden
    if ($comment->status === 'hidden') {
      $pendingReports = TipscodingCommentReport::query()
        ->where('tipscoding_comment_id', $comment->id)
        ->where('status', 'pending')
        ->with(['user'])
        ->get();

      foreach ($pendingReports as $pendingReport) {
        $pendingReport->update([
          'status' => 'resolved',
          'reviewed_by' => Auth::id(),
          'reviewed_at' => now(),
        ]);

        $pendingReport->user?->notify(
          new TipscodingCommentReportResultNotification(
            $pendingReport
          )
        );
      }

      Alert::html(
        'Info',
        'Komentar ini sudah!
          <span style="color:#2563eb;">
            di sembunyikan
          </span> Semua report yang masih pending telah ditandai sebagai resolved',
        'info'
      );

      return redirect()->route(
        'tipsreports.show',
        $report->id
      );
    }

    // Sembunyikan komentar
    $comment->update([
      'status' => 'hidden',
    ]);

    //  Resolve semua report pending
    $pendingReports = TipscodingCommentReport::query()
      ->where('tipscoding_comment_id', $comment->id)
      ->where('status', 'pending')
      ->with(['user'])
      ->get();

    foreach ($pendingReports as $pendingReport) {
      $pendingReport->update([
        'status' => 'resolved',
        'reviewed_by' => Auth::id(),
        'reviewed_at' => now(),
      ]);

      $pendingReport->user?->notify(
        new TipscodingCommentReportResultNotification(
          $pendingReport
        )
      );
    }

    Alert::html(
      'Success',
      'Laporan berhasil ditandai sebagai!
        <span style="color:#2563eb;">
          resolved
        </span> dan komentar disembunyikan',
      'success'
    );

    return redirect()->route(
      'tipsreports.show',
      $report->id
    );
  }

  public function reject(TipscodingCommentReport $report)
  {
    if ($report->status !== 'pending') {
      Alert::html(
        'Oops...',
        "Report ini!
          <span style='color:#2563eb;'>
            sudah
          </span> di tangani",
        'warning'
      );

      return back();
    }

    $report->load([
      'comment',
      'user',
    ]);

    $report->update([
      'status' => 'rejected',
      'reviewed_by' => Auth::id(),
      'reviewed_at' => now(),
    ]);

    $report->user?->notify(
      new TipscodingCommentReportResultNotification($report)
    );

    Alert::html(
      'Success',
      'Laporan berhasil!
        <span style="color:#2563eb;">
          di tandai sebagai
        </span> rejected',
      'success'
    );

    return redirect()->route(
      'tipsreports.show',
      $report->id
    );
  }
}
