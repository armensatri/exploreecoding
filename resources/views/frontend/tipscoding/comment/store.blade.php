<section class="mt-10 sm:px-5">

  <div class="alert">

    @if (session()->has('alert'))
      @include('sweetalert::alert')
    @endif

    @php
      $currentUser = Auth::user();
      $currentRole = $currentUser?->role?->name;

      $canManageAllComments = in_array($currentRole, [
        'owner',
        'superadmin',
      ]);

      $canManageTipscodingComments =
        $currentRole === 'creator' &&
        $tipscoding->user_id === $currentUser?->id;
    @endphp


    <div class="flex justify-center py-10">

      <div
        class="w-full rounded-2xl bg-white p-6 font-sans text-gray-800 shadow-xs space-y-6 xl:p-8"
      >

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="mb-4 flex items-center justify-between">

          <div class="text-xl font-semibold text-slate-800">
            Comments
          </div>

          @if ($canManageAllComments || $canManageTipscodingComments)

            <div class="flex items-center gap-2 text-xs">

              <span class="text-slate-400">
                Pinned {{ $pinnedCount }}/5
              </span>

              @if ($pinnedCount >= 5)

                <span class="text-slate-300">
                  · Maksimal 5 komentar
                </span>

              @endif

            </div>

          @endif

        </div>


        {{-- ========================================================= --}}
        {{-- DAFTAR KOMENTAR --}}
        {{-- ========================================================= --}}

        @forelse ($comments as $comment)

          @php

            $canDeleteComment =
              $comment->user_id === $currentUser?->id ||
              $canManageAllComments ||
              $canManageTipscodingComments;

            $commentReaction =
              $comment->reactions->first()?->type;

          @endphp


          {{-- ========================================================= --}}
          {{-- KOMENTAR UTAMA --}}
          {{-- ========================================================= --}}

          <div
            id="comment-{{ $comment->id }}"
            class="scroll-mt-24
              {{ $comment->is_pinned
                ? 'rounded-r-md border-l-2 border-blue-500 bg-blue-50/50 pl-3'
                : '' }}"
          >

            <div
              class="flex items-start space-x-3 sm:space-x-4"
              data-comment-id="{{ $comment->id }}"
            >

              {{-- ===================================================== --}}
              {{-- AVATAR --}}
              {{-- ===================================================== --}}

              <img
                src="{{ $comment->user?->image
                  ? asset('storage/' . $comment->user->image)
                  : asset('backend/img/user/user.png') }}"
                alt="{{ $comment->user?->username ?? 'User' }}"
                class="h-10 w-10 rounded-full bg-gray-500 p-px object-cover object-top"
              />


              {{-- ===================================================== --}}
              {{-- CONTENT --}}
              {{-- ===================================================== --}}

              <div class="mt-2 flex-1 space-y-2 text-sm sm:text-base">


                {{-- ================================================= --}}
                {{-- USERNAME + WAKTU --}}
                {{-- ================================================= --}}

                <div class="flex flex-wrap items-center space-x-2">

                  <div class="font-medium text-gray-800">
                    <span>@</span>{{ $comment->user?->username ?? 'user' }}
                  </div>


                  {{-- PINNED --}}

                  @if ($comment->is_pinned)

                    <div class="text-[12px] font-medium text-blue-600">
                      <i class="bi bi-pin-angle-fill"></i>
                      Pinned
                    </div>

                  @endif


                  {{-- WAKTU --}}

                  <div class="mt-0.5 text-[13px] tracking-normal text-gray-400">
                    di buat {{ $comment->created_at->diffForHumans() }}
                  </div>


                  {{-- EDITED --}}

                  @if ($comment->edited_at)

                    <div class="mt-0.5 text-[13px] tracking-normal text-gray-400">
                      · Edited {{ $comment->edited_at->diffForHumans() }}
                    </div>

                  @endif

                </div>


                {{-- ================================================= --}}
                {{-- ISI KOMENTAR --}}
                {{-- ================================================= --}}

                @if ($comment->status === 'hidden')

                  <div
                    class="ml-1 rounded-lg
                      border border-slate-200
                      bg-slate-50
                      px-3 py-2.5
                      text-sm
                      italic
                      text-slate-400"
                  >
                    <i class="bi bi-eye-slash mr-1"></i>
                    Komentar ini telah disembunyikan.
                  </div>

                @else

                  <p class="ml-1 whitespace-pre-line text-gray-800">
                    {{ $comment->comment }}
                  </p>

                @endif


                {{-- ================================================= --}}
                {{-- ACTION KOMENTAR --}}
                {{-- ================================================= --}}

                <div class="ml-1 flex flex-wrap items-center gap-1.5">


                  {{-- ================================================= --}}
                  {{-- EDIT --}}
                  {{-- ================================================= --}}

                  @if (
                    $comment->status === 'approved' &&
                    $comment->user_id === $currentUser?->id
                  )

                    <button
                      type="button"
                      onclick="openEditComment(
                        {{ $comment->id }},
                        @js($comment->comment),
                        @js(route('tipscodings.comments.update', [
                          'category' => $category->slug,
                          'tipscoding' => $tipscoding->slug,
                          'comment' => $comment->id,
                        ]))
                      )"
                      class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-md border border-indigo-200 bg-blue-500 px-2 py-1 text-[12px] font-medium text-white hover:bg-blue-600"
                      title="Edit komentar"
                    >
                      <i class="bi bi-pencil-square"></i>
                    </button>

                  @endif


                  {{-- ================================================= --}}
                  {{-- DELETE --}}
                  {{-- Tetap tersedia meskipun hidden --}}
                  {{-- ================================================= --}}

                  @if ($canDeleteComment)

                    <form
                      action="{{ route('tipscodings.comments.destroy', [
                        'category' => $category->slug,
                        'tipscoding' => $tipscoding->slug,
                        'comment' => $comment->id,
                      ]) }}"
                      method="POST"
                      class="inline"
                      onsubmit="return confirm('Yakin ingin menghapus komentar ini?')"
                    >

                      @csrf
                      @method('DELETE')

                      <button
                        type="submit"
                        class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-md border border-red-200 bg-red-500 px-2 py-1 text-[12px] font-medium text-white hover:bg-red-600"
                        title="Hapus komentar"
                      >
                        <i class="bi bi-trash3"></i>
                      </button>

                    </form>

                  @endif


                  {{-- ================================================= --}}
                  {{-- ACTION YANG HANYA UNTUK KOMENTAR APPROVED --}}
                  {{-- ================================================= --}}

                  @if ($comment->status === 'approved')


                    {{-- ================================================= --}}
                    {{-- REPLY --}}
                    {{-- ================================================= --}}

                    <button
                      type="button"
                      onclick="openReplyComment(
                        {{ $comment->id }},
                        @js($comment->user?->username ?? 'user')
                      )"
                      class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-md border border-gray-200 bg-gray-50 px-2 py-1 text-[12px] font-medium text-gray-700 hover:bg-gray-100"
                      title="Balas komentar"
                    >
                      <i class="bi bi-reply"></i>
                    </button>


                    {{-- ================================================= --}}
                    {{-- REPORT --}}
                    {{-- ================================================= --}}

                    @if (Auth::check())

                      <button
                        type="button"
                        data-report-comment
                        data-comment-id="{{ $comment->id }}"
                        class="inline-flex items-center gap-1 text-xs font-medium text-slate-500 transition hover:text-red-500"
                      >
                        <i class="bi bi-flag"></i>
                        <span>Report</span>
                      </button>

                    @endif


                    {{-- ================================================= --}}
                    {{-- LIKE --}}
                    {{-- ================================================= --}}

                    <button
                      type="button"
                      data-reaction-button
                      data-comment-id="{{ $comment->id }}"
                      data-type="like"
                      data-url="{{ route('tipscodings.comments.reaction', [
                        'category' => $category->slug,
                        'tipscoding' => $tipscoding->slug,
                        'comment' => $comment->id,
                        'type' => 'like',
                      ]) }}"
                      class="reaction-like inline-flex shrink-0 cursor-pointer items-center rounded-md border px-2 py-1 text-[11px] font-medium transition
                        {{ $commentReaction === 'like'
                          ? 'border-blue-300 bg-blue-100 text-blue-700'
                          : 'border-indigo-200 bg-indigo-50 text-gray-700 hover:bg-indigo-100' }}"
                      title="Like"
                    >

                      <i
                        class="reaction-icon bi bi-hand-thumbs-up{{ $commentReaction === 'like' ? '-fill' : '' }}
                          {{ $commentReaction === 'like'
                            ? 'text-blue-700'
                            : 'text-blue-800' }}"
                      ></i>

                      <span class="reaction-count ml-1">
                        {{ $comment->likes_count }}
                      </span>

                    </button>


                    {{-- ================================================= --}}
                    {{-- DISLIKE --}}
                    {{-- ================================================= --}}

                    <button
                      type="button"
                      data-reaction-button
                      data-comment-id="{{ $comment->id }}"
                      data-type="dislike"
                      data-url="{{ route('tipscodings.comments.reaction', [
                        'category' => $category->slug,
                        'tipscoding' => $tipscoding->slug,
                        'comment' => $comment->id,
                        'type' => 'dislike',
                      ]) }}"
                      class="reaction-dislike inline-flex shrink-0 cursor-pointer items-center rounded-md border px-2 py-1 text-[11px] font-medium transition
                        {{ $commentReaction === 'dislike'
                          ? 'border-red-300 bg-red-100 text-red-700'
                          : 'border-indigo-200 bg-indigo-50 text-gray-700 hover:bg-indigo-100' }}"
                      title="Dislike"
                    >

                      <i
                        class="reaction-icon bi bi-hand-thumbs-down{{ $commentReaction === 'dislike' ? '-fill' : '' }}
                          {{ $commentReaction === 'dislike'
                            ? 'text-red-700'
                            : 'text-red-800' }}"
                      ></i>

                      <span class="reaction-count ml-1">
                        {{ $comment->dislikes_count }}
                      </span>

                    </button>


                    {{-- ================================================= --}}
                    {{-- PIN --}}
                    {{-- ================================================= --}}

                    @php

                      $user = Auth::user();
                      $role = $user?->role?->name;

                      $canPin =
                        $role === 'owner' ||
                        $role === 'superadmin' ||
                        (
                          $role === 'creator' &&
                          $tipscoding->user_id === $user?->id
                        );

                    @endphp

                    @if ($canPin)

                      <form
                        action="{{ route('tipscodings.comments.pin', [
                          'category' => $category->slug,
                          'tipscoding' => $tipscoding->slug,
                          'comment' => $comment->id,
                        ]) }}"
                        method="POST"
                      >

                        @csrf
                        @method('PATCH')

                        <button
                          type="submit"
                          class="cursor-pointer rounded-md px-2 py-1 text-xs
                            {{ $comment->is_pinned
                              ? 'text-blue-600 hover:text-blue-700'
                              : 'text-slate-500 hover:text-blue-600' }}"
                        >
                          {{ $comment->is_pinned ? 'Unpin' : 'Pin' }}
                        </button>

                      </form>

                    @endif

                  @endif

                </div>


                {{-- ========================================================= --}}
                {{-- DAFTAR REPLY NORMAL --}}
                {{-- ========================================================= --}}

                @if ($comment->replies->isNotEmpty())

                  <div
                    class="mt-4 ml-2 space-y-4 border-l-2 border-gray-100 pl-4 sm:ml-6"
                  >

                    @foreach ($comment->replies as $reply)

                      @php

                        $canDeleteReply =
                          $reply->user_id === $currentUser?->id ||
                          $canManageAllComments ||
                          $canManageTipscodingComments;

                        $replyReaction =
                          $reply->reactions->first()?->type;

                      @endphp


                      {{-- ================================================= --}}
                      {{-- REPLY --}}
                      {{-- ================================================= --}}

                      <div
                        id="comment-{{ $reply->id }}"
                        class="scroll-mt-24"
                      >

                        <div
                          class="flex items-start space-x-3"
                          data-comment-id="{{ $reply->id }}"
                        >


                          {{-- ================================================= --}}
                          {{-- AVATAR REPLY --}}
                          {{-- ================================================= --}}

                          <img
                            src="{{ $reply->user?->image
                              ? asset('storage/' . $reply->user->image)
                              : asset('backend/img/user/user.png') }}"
                            alt="{{ $reply->user?->username ?? 'User' }}"
                            class="h-8 w-8 rounded-full bg-gray-500 p-px object-cover object-top"
                          />


                          {{-- ================================================= --}}
                          {{-- CONTENT REPLY --}}
                          {{-- ================================================= --}}

                          <div class="flex-1 space-y-1 text-sm">


                            {{-- ================================================= --}}
                            {{-- USERNAME + WAKTU --}}
                            {{-- ================================================= --}}

                            <div class="flex flex-wrap items-center space-x-2">

                              <div class="font-medium text-gray-800">
                                <span>@</span>{{ $reply->user?->username ?? 'user' }}
                              </div>

                              <div class="text-[12px] text-gray-400">
                                {{ $reply->created_at->diffForHumans() }}
                              </div>

                              @if ($reply->edited_at)

                                <div class="mt-0.5 text-[13px] tracking-normal text-gray-400">
                                  · Edited {{ $reply->edited_at->diffForHumans() }}
                                </div>

                              @endif

                            </div>


                            {{-- ================================================= --}}
                            {{-- ISI REPLY --}}
                            {{-- ================================================= --}}

                            @if ($reply->status === 'hidden')

                              <div
                                class="rounded-lg
                                  border border-slate-200
                                  bg-slate-50
                                  px-3 py-2.5
                                  text-sm
                                  italic
                                  text-slate-400"
                              >
                                <i class="bi bi-eye-slash mr-1"></i>
                                Komentar ini telah disembunyikan.
                              </div>

                            @else

                              <p class="whitespace-pre-line text-gray-800">
                                {{ $reply->comment }}
                              </p>

                            @endif


                            {{-- ================================================= --}}
                            {{-- ACTION REPLY --}}
                            {{-- ================================================= --}}

                            <div class="flex flex-wrap items-center gap-1.5">


                              {{-- ================================================= --}}
                              {{-- EDIT REPLY --}}
                              {{-- ================================================= --}}

                              @if (
                                $reply->status === 'approved' &&
                                $reply->user_id === $currentUser?->id
                              )

                                <button
                                  type="button"
                                  onclick="openEditComment(
                                    {{ $reply->id }},
                                    @js($reply->comment),
                                    @js(route('tipscodings.comments.update', [
                                      'category' => $category->slug,
                                      'tipscoding' => $tipscoding->slug,
                                      'comment' => $reply->id,
                                    ]))
                                  )"
                                  class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-md border border-indigo-200 bg-blue-500 px-2 py-1 text-[11px] font-medium text-white hover:bg-blue-600"
                                  title="Edit balasan"
                                >
                                  <i class="bi bi-pencil-square"></i>
                                </button>

                              @endif


                              {{-- ================================================= --}}
                              {{-- DELETE REPLY --}}
                              {{-- ================================================= --}}

                              @if ($canDeleteReply)

                                <form
                                  action="{{ route('tipscodings.comments.destroy', [
                                    'category' => $category->slug,
                                    'tipscoding' => $tipscoding->slug,
                                    'comment' => $reply->id,
                                  ]) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus balasan ini?')"
                                >

                                  @csrf
                                  @method('DELETE')

                                  <button
                                    type="submit"
                                    class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-md border border-red-200 bg-red-500 px-2 py-1 text-[11px] font-medium text-white hover:bg-red-600"
                                    title="Hapus balasan"
                                  >
                                    <i class="bi bi-trash3"></i>
                                  </button>

                                </form>

                              @endif


                              {{-- ================================================= --}}
                              {{-- REACTION REPLY --}}
                              {{-- ================================================= --}}

                              @if ($reply->status === 'approved')


                                {{-- LIKE --}}

                                <button
                                  type="button"
                                  data-reaction-button
                                  data-comment-id="{{ $reply->id }}"
                                  data-type="like"
                                  data-url="{{ route('tipscodings.comments.reaction', [
                                    'category' => $category->slug,
                                    'tipscoding' => $tipscoding->slug,
                                    'comment' => $reply->id,
                                    'type' => 'like',
                                  ]) }}"
                                  class="reaction-like inline-flex shrink-0 cursor-pointer items-center rounded-md border px-2 py-1 text-[11px] font-medium transition
                                    {{ $replyReaction === 'like'
                                      ? 'border-blue-300 bg-blue-100 text-blue-700'
                                      : 'border-indigo-200 bg-indigo-50 text-gray-700 hover:bg-indigo-100' }}"
                                  title="Like"
                                >

                                  <i
                                    class="reaction-icon bi bi-hand-thumbs-up{{ $replyReaction === 'like' ? '-fill' : '' }}
                                      {{ $replyReaction === 'like'
                                        ? 'text-blue-700'
                                        : 'text-blue-800' }}"
                                  ></i>

                                  <span class="reaction-count ml-1">
                                    {{ $reply->likes_count }}
                                  </span>

                                </button>


                                {{-- DISLIKE --}}

                                <button
                                  type="button"
                                  data-reaction-button
                                  data-comment-id="{{ $reply->id }}"
                                  data-type="dislike"
                                  data-url="{{ route('tipscodings.comments.reaction', [
                                    'category' => $category->slug,
                                    'tipscoding' => $tipscoding->slug,
                                    'comment' => $reply->id,
                                    'type' => 'dislike',
                                  ]) }}"
                                  class="reaction-dislike inline-flex shrink-0 cursor-pointer items-center rounded-md border px-2 py-1 text-[11px] font-medium transition
                                    {{ $replyReaction === 'dislike'
                                      ? 'border-red-300 bg-red-100 text-red-700'
                                      : 'border-indigo-200 bg-indigo-50 text-gray-700 hover:bg-indigo-100' }}"
                                  title="Dislike"
                                >

                                  <i
                                    class="reaction-icon bi bi-hand-thumbs-down{{ $replyReaction === 'dislike' ? '-fill' : '' }}
                                      {{ $replyReaction === 'dislike'
                                        ? 'text-red-700'
                                        : 'text-red-800' }}"
                                  ></i>

                                  <span class="reaction-count ml-1">
                                    {{ $reply->dislikes_count }}
                                  </span>

                                </button>

                              @endif

                            </div>

                          </div>

                        </div>

                      </div>

                    @endforeach

                  </div>

                @endif

              </div>

            </div>

          </div>

        @empty


          {{-- ========================================================= --}}
          {{-- BELUM ADA KOMENTAR --}}
          {{-- ========================================================= --}}

          <div
            class="rounded-xl border border-dashed border-gray-300 py-8 text-center"
          >

            <p class="text-base text-gray-500">
              Belum ada komentar.
            </p>

            <p class="mt-1 text-sm text-gray-400">
              Jadilah yang pertama memberikan komentar.
            </p>

          </div>

        @endforelse


        {{-- ========================================================= --}}
        {{-- REPORT MODAL --}}
        {{-- ========================================================= --}}

        @if (Auth::check())

          <div
            id="reportCommentModal"
            class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-950/50 px-4"
            aria-hidden="true"
          >

            <div
              class="w-full max-w-md rounded-2xl bg-white shadow-xl"
              data-report-modal-panel
            >

              {{-- HEADER --}}

              <div
                class="flex items-center justify-between border-b border-slate-200 px-5 py-4"
              >

                <div>

                  <h3 class="text-lg font-semibold text-slate-800">
                    Report comment
                  </h3>

                  <p class="mt-1 text-xs text-slate-500">
                    Beritahu kami jika komentar ini melanggar aturan.
                  </p>

                </div>

                <button
                  type="button"
                  onclick="closeReportComment()"
                  class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                >
                  <i class="bi bi-x-lg"></i>
                </button>

              </div>


              {{-- FORM --}}

              <form
                id="reportCommentForm"
                method="POST"
                action=""
              >

                @csrf

                <div class="space-y-5 px-5 py-5">


                  {{-- REASON --}}

                  <div>

                    <label
                      for="reportReason"
                      class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                      Alasan
                    </label>

                    <select
                      id="reportReason"
                      name="reason"
                      class="block w-full rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-700 outline-none transition focus:border-red-400 focus:ring-2 focus:ring-red-100"
                      required
                    >

                      <option value="">
                        Pilih alasan
                      </option>

                      <option value="spam">
                        Spam
                      </option>

                      <option value="irrelevant">
                        Tidak relevan
                      </option>

                      <option value="inappropriate">
                        Tidak pantas
                      </option>

                      <option value="violation">
                        Melanggar aturan
                      </option>

                      <option value="other">
                        Lainnya
                      </option>

                    </select>

                  </div>


                  {{-- DESCRIPTION --}}

                  <div>

                    <label
                      for="reportDescription"
                      class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                      Keterangan

                      <span class="font-normal text-slate-400">
                        (opsional)
                      </span>

                    </label>

                    <textarea
                      id="reportDescription"
                      name="description"
                      rows="4"
                      maxlength="1000"
                      placeholder="Jelaskan alasan kamu melaporkan komentar ini..."
                      class="block w-full resize-none rounded-xl border border-slate-300 px-3 py-2.5 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-red-400 focus:ring-2 focus:ring-red-100"
                    ></textarea>

                    <div class="mt-1 text-right text-xs text-slate-400">
                      Maksimal 1000 karakter
                    </div>

                  </div>

                </div>


                {{-- FOOTER --}}

                <div
                  class="flex justify-end gap-2 border-t border-slate-200 px-5 py-4"
                >

                  <button
                    type="button"
                    onclick="closeReportComment()"
                    class="rounded-xl border border-slate-300 px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-50"
                  >
                    Batal
                  </button>

                  <button
                    type="submit"
                    class="inline-flex items-center gap-2 rounded-xl bg-red-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-red-600"
                  >
                    <i class="bi bi-flag"></i>
                    Kirim laporan
                  </button>

                </div>

              </form>

            </div>

          </div>

        @endif


        {{-- ========================================================= --}}
        {{-- ORPHAN REPLIES --}}
        {{-- ========================================================= --}}

        @if ($orphanReplies->isNotEmpty())

          <div class="mt-6 space-y-4">

            @foreach ($orphanReplies as $comment)

              @php

                $commentReaction =
                  $comment->reactions->first()?->type;

                $canDeleteComment =
                  $comment->user_id === $currentUser?->id ||
                  $canManageAllComments ||
                  $canManageTipscodingComments;

              @endphp


              <div
                id="comment-{{ $comment->id }}"
                class="scroll-mt-24"
              >

                <div
                  class="rounded-r-lg border-l-2 border-slate-200 bg-slate-50/70 px-3 py-3 sm:px-4"
                >

                  <div class="flex items-start gap-3">


                    {{-- AVATAR --}}

                    <img
                      src="{{ $comment->user?->image
                        ? asset('storage/' . $comment->user->image)
                        : asset('backend/img/user/user.png') }}"
                      alt="image"
                      class="h-8 w-8 shrink-0 rounded-full object-cover object-top sm:h-9 sm:w-9"
                    >


                    <div class="min-w-0 flex-1">


                      {{-- USERNAME + TIME --}}

                      <div class="flex flex-wrap items-center gap-x-2 gap-y-0.5">

                        <span class="text-sm font-semibold text-slate-700">
                          <span>@</span>{{ $comment->user?->username ?? 'user' }}
                        </span>

                        <span class="text-xs text-slate-400">
                          di buat {{ $comment->created_at->diffForHumans() }}
                        </span>

                      </div>


                      {{-- PARENT DELETED --}}

                      <div
                        class="mt-1 flex items-center gap-1.5 text-[12px] text-slate-400"
                      >

                        <i class="bi bi-arrow-return-right"></i>

                        <span class="italic">
                          Komentar utama telah dihapus
                        </span>

                      </div>


                      {{-- COMMENT --}}

                      <div class="mt-2 text-sm leading-6 text-slate-700">

                        @if ($comment->status === 'hidden')

                          <div
                            class="rounded-lg
                              border border-slate-200
                              bg-white
                              px-3 py-2.5
                              italic
                              text-slate-400"
                          >
                            <i class="bi bi-eye-slash mr-1"></i>
                            Komentar ini telah disembunyikan.
                          </div>

                        @else

                          {!! nl2br(e($comment->comment)) !!}

                        @endif

                      </div>


                      {{-- EDITED --}}

                      @if ($comment->edited_at)

                        <div class="mt-1">

                          <span
                            class="cursor-help text-[11px] text-slate-400"
                            title="Diedit {{ $comment->edited_at->diffForHumans() }}"
                          >
                            Edited
                          </span>

                        </div>

                      @endif


                      {{-- ACTION --}}

                      <div class="mt-3 flex flex-wrap items-center gap-3">


                        {{-- LIKE / DISLIKE HANYA APPROVED --}}

                        @if ($comment->status === 'approved')

                          {{-- LIKE --}}

                          <button
                            type="button"
                            data-reaction-button
                            data-comment-id="{{ $comment->id }}"
                            data-type="like"
                            data-url="{{ route('tipscodings.comments.reaction', [
                              'category' => $category->slug,
                              'tipscoding' => $tipscoding->slug,
                              'comment' => $comment->id,
                              'type' => 'like',
                            ]) }}"
                            class="inline-flex items-center gap-1 text-xs
                              {{ $commentReaction === 'like'
                                ? 'text-blue-600'
                                : 'text-slate-500 hover:text-blue-600' }}"
                          >

                            <i class="bi bi-hand-thumbs-up"></i>

                            <span data-likes-count>
                              {{ $comment->likes_count }}
                            </span>

                          </button>


                          {{-- DISLIKE --}}

                          <button
                            type="button"
                            data-reaction-button
                            data-comment-id="{{ $comment->id }}"
                            data-type="dislike"
                            data-url="{{ route('tipscodings.comments.reaction', [
                              'category' => $category->slug,
                              'tipscoding' => $tipscoding->slug,
                              'comment' => $comment->id,
                              'type' => 'dislike',
                            ]) }}"
                            class="inline-flex items-center gap-1 text-xs
                              {{ $commentReaction === 'dislike'
                                ? 'text-red-600'
                                : 'text-slate-500 hover:text-red-600' }}"
                          >

                            <i class="bi bi-hand-thumbs-down"></i>

                            <span data-dislikes-count>
                              {{ $comment->dislikes_count }}
                            </span>

                          </button>

                        @endif


                        {{-- EDIT --}}

                        @if (
                          $comment->status === 'approved' &&
                          $comment->user_id === $currentUser?->id
                        )

                          <button
                            type="button"
                            onclick="openEditComment(
                              {{ $comment->id }},
                              @js($comment->comment),
                              @js(route('tipscodings.comments.update', [
                                'category' => $category->slug,
                                'tipscoding' => $tipscoding->slug,
                                'comment' => $comment->id,
                              ]))
                            )"
                            class="text-xs text-slate-500 hover:text-blue-600"
                          >
                            Edit
                          </button>

                        @endif


                        {{-- DELETE --}}

                        @if ($canDeleteComment)

                          <form
                            action="{{ route('tipscodings.comments.destroy', [
                              'category' => $category->slug,
                              'tipscoding' => $tipscoding->slug,
                              'comment' => $comment->id,
                            ]) }}"
                            method="POST"
                            class="inline"
                          >

                            @csrf
                            @method('DELETE')

                            <button
                              type="submit"
                              class="text-xs text-slate-500 hover:text-red-600"
                            >
                              Delete
                            </button>

                          </form>

                        @endif

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            @endforeach

          </div>

        @endif


        {{-- ========================================================= --}}
        {{-- PAGINATION --}}
        {{-- ========================================================= --}}

        <div class="grid table-pagination">

          @if ($comments->lastPage() > 1)

            <x-paginate
              :pagination="$comments"
            />

          @endif

        </div>


        {{-- ========================================================= --}}
        {{-- FORM KOMENTAR BARU --}}
        {{-- ========================================================= --}}

        <div class="flex items-start space-x-3 px-3 sm:space-x-4">

          <div class="flex-1 space-y-2">

            <form
              action="{{ route('tipscodings.comments.store', [
                'category' => $category->slug,
                'tipscoding' => $tipscoding->slug,
              ]) }}"
              method="POST"
              class="mb-8"
            >

              @csrf

              <div>

                <textarea
                  id="comment"
                  name="comment"
                  rows="4"
                  placeholder="Tulis komentar kamu..."
                  class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >{{ old('comment') }}</textarea>

                @error('comment')

                  <p class="mt-2 ml-2 font-serif text-sm text-red-600">
                    {{ $message }}
                  </p>

                @enderror

              </div>

              <div class="mt-3 flex justify-end">

                <button
                  type="submit"
                  class="cursor-pointer rounded-[10px] bg-blue-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700"
                >
                  Kirim komentar
                </button>

              </div>

            </form>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>


{{-- ========================================================= --}}
{{-- POPUP EDIT KOMENTAR --}}
{{-- ========================================================= --}}

<div
  id="editCommentModal"
  class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 px-4"
>

  <div
    id="editCommentBox"
    class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-xl"
  >

    <div class="mb-5 flex items-start justify-between gap-4">

      <div>

        <h3 class="text-lg font-semibold text-gray-800">
          Edit komentar
        </h3>

        <p class="mt-1 text-sm text-gray-500">
          Perbarui komentar kamu.
        </p>

      </div>

      <button
        type="button"
        onclick="closeEditComment()"
        class="inline-flex h-8 w-8 shrink-0 cursor-pointer items-center justify-center rounded-lg text-gray-400 hover:bg-gray-100 hover:text-gray-700"
        title="Tutup"
      >
        <i class="bi bi-x-lg"></i>
      </button>

    </div>


    <form
      id="editCommentForm"
      method="POST"
    >

      @csrf
      @method('PATCH')

      <textarea
        id="editCommentTextarea"
        name="comment"
        rows="5"
        placeholder="Tulis komentar kamu..."
        class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
      ></textarea>

      <p
        id="editCommentError"
        class="mt-2 hidden font-serif text-sm text-red-600"
      ></p>

      <div class="mt-4 flex justify-end gap-2">

        <button
          type="button"
          onclick="closeEditComment()"
          class="cursor-pointer rounded-[10px] border border-gray-300 px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50"
        >
          Batal
        </button>

        <button
          type="submit"
          class="cursor-pointer rounded-[10px] bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700"
        >
          Simpan
        </button>

      </div>

    </form>

  </div>

</div>


{{-- ========================================================= --}}
{{-- POPUP REPLY KOMENTAR --}}
{{-- ========================================================= --}}

<div
  id="replyCommentModal"
  class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 px-4"
>

  <div
    class="w-full max-w-lg rounded-2xl bg-white p-6 shadow-xl"
  >

    <div class="mb-5 flex items-start justify-between gap-4">

      <div>

        <h3 class="text-lg font-semibold text-gray-800">
          Balas komentar
        </h3>

        <p
          id="replyCommentUser"
          class="mt-1 text-sm text-gray-500"
        ></p>

      </div>

      <button
        type="button"
        onclick="closeReplyComment()"
        class="inline-flex h-8 w-8 shrink-0 cursor-pointer items-center justify-center rounded-lg text-gray-400 hover:bg-gray-100 hover:text-gray-700"
        title="Tutup"
      >
        <i class="bi bi-x-lg"></i>
      </button>

    </div>


    <form
      id="replyCommentForm"
      action="{{ route('tipscodings.comments.store', [
        'category' => $category->slug,
        'tipscoding' => $tipscoding->slug,
      ]) }}"
      method="POST"
    >

      @csrf

      <input
        type="hidden"
        id="replyParentId"
        name="parent_id"
      />

      <textarea
        id="replyCommentTextarea"
        name="comment"
        rows="5"
        placeholder="Tulis balasan kamu..."
        class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
      ></textarea>

      @error('comment')

        <p class="mt-2 font-serif text-sm text-red-600">
          {{ $message }}
        </p>

      @enderror

      <div class="mt-4 flex justify-end gap-2">

        <button
          type="button"
          onclick="closeReplyComment()"
          class="cursor-pointer rounded-[10px] border border-gray-300 px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50"
        >
          Batal
        </button>

        <button
          type="submit"
          class="cursor-pointer rounded-[10px] bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700"
        >
          Kirim balasan
        </button>

      </div>

    </form>

  </div>

</div>


{{-- ========================================================= --}}
{{-- JAVASCRIPT --}}
{{-- ========================================================= --}}

<script>

  /*
  |--------------------------------------------------------------------------
  | SCROLL KE KOMENTAR DARI NOTIFIKASI
  |--------------------------------------------------------------------------
  */

  document.addEventListener('DOMContentLoaded', function () {

    const hash = window.location.hash;

    if (
      !hash ||
      !hash.startsWith('#comment-')
    ) {
      return;
    }

    setTimeout(function () {

      const comment =
        document.querySelector(hash);

      if (!comment) {
        return;
      }

      comment.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
      });

      comment.classList.add(
        'bg-yellow-50',
        'rounded-xl',
        'transition-colors',
        'duration-500'
      );

      setTimeout(function () {

        comment.classList.remove(
          'bg-yellow-50'
        );

      }, 2500);

    }, 300);

  });


  /*
  |--------------------------------------------------------------------------
  | SCROLL RESTORATION
  |--------------------------------------------------------------------------
  */

  const commentScrollKey =
    'tipscoding-comment-scroll';


  if ('scrollRestoration' in history) {

    history.scrollRestoration =
      'manual';

  }


  /*
  |--------------------------------------------------------------------------
  | SIMPAN SCROLL SEBELUM FORM DIKIRIM
  |--------------------------------------------------------------------------
  */

  document.addEventListener(
    'submit',
    function (event) {

      const form = event.target;

      if (
        form.action &&
        form.action.includes('/comments')
      ) {

        sessionStorage.setItem(
          commentScrollKey,
          String(window.scrollY)
        );

      }

    }
  );


  /*
  |--------------------------------------------------------------------------
  | KEMBALIKAN SCROLL
  |--------------------------------------------------------------------------
  */

  window.addEventListener(
    'load',
    function () {

      if (
        window.location.hash &&
        window.location.hash.startsWith(
          '#comment-'
        )
      ) {

        sessionStorage.removeItem(
          commentScrollKey
        );

        return;

      }

      const savedScroll =
        sessionStorage.getItem(
          commentScrollKey
        );

      if (savedScroll === null) {
        return;
      }

      sessionStorage.removeItem(
        commentScrollKey
      );

      requestAnimationFrame(function () {

        window.scrollTo({
          top: Number(savedScroll),
          behavior: 'instant',
        });

      });

    }
  );


  /*
  |--------------------------------------------------------------------------
  | PAGINATION
  |--------------------------------------------------------------------------
  */

  document.addEventListener(
    'click',
    function (event) {

      const paginationLink =
        event.target.closest(
          '.table-pagination a'
        );

      if (!paginationLink) {
        return;
      }

      sessionStorage.removeItem(
        commentScrollKey
      );

    }
  );


  /*
  |--------------------------------------------------------------------------
  | EDIT COMMENT
  |--------------------------------------------------------------------------
  */

  function openEditComment(
    id,
    comment,
    action
  ) {

    const modal =
      document.getElementById(
        'editCommentModal'
      );

    const form =
      document.getElementById(
        'editCommentForm'
      );

    const textarea =
      document.getElementById(
        'editCommentTextarea'
      );

    const error =
      document.getElementById(
        'editCommentError'
      );

    textarea.value =
      comment;

    form.action =
      action;

    error.textContent =
      '';

    error.classList.add(
      'hidden'
    );

    modal.classList.remove(
      'hidden'
    );

    modal.classList.add(
      'flex'
    );

    setTimeout(function () {

      textarea.focus();

    }, 100);

  }


  /*
  |--------------------------------------------------------------------------
  | CLOSE EDIT
  |--------------------------------------------------------------------------
  */

  function closeEditComment() {

    const modal =
      document.getElementById(
        'editCommentModal'
      );

    const textarea =
      document.getElementById(
        'editCommentTextarea'
      );

    modal.classList.add(
      'hidden'
    );

    modal.classList.remove(
      'flex'
    );

    textarea.value =
      '';

  }


  /*
  |--------------------------------------------------------------------------
  | REPLY COMMENT
  |--------------------------------------------------------------------------
  */

  function openReplyComment(
    id,
    username
  ) {

    const modal =
      document.getElementById(
        'replyCommentModal'
      );

    const parentId =
      document.getElementById(
        'replyParentId'
      );

    const textarea =
      document.getElementById(
        'replyCommentTextarea'
      );

    const user =
      document.getElementById(
        'replyCommentUser'
      );

    parentId.value =
      id;

    user.innerHTML = `
      Membalas komentar
      <span class="font-medium text-blue-600">
        @${username}
      </span>
    `;

    textarea.value =
      '';

    modal.classList.remove(
      'hidden'
    );

    modal.classList.add(
      'flex'
    );

    setTimeout(function () {

      textarea.focus();

    }, 100);

  }


  /*
  |--------------------------------------------------------------------------
  | CLOSE REPLY
  |--------------------------------------------------------------------------
  */

  function closeReplyComment() {

    const modal =
      document.getElementById(
        'replyCommentModal'
      );

    const parentId =
      document.getElementById(
        'replyParentId'
      );

    const textarea =
      document.getElementById(
        'replyCommentTextarea'
      );

    modal.classList.add(
      'hidden'
    );

    modal.classList.remove(
      'flex'
    );

    parentId.value =
      '';

    textarea.value =
      '';

  }


  /*
  |--------------------------------------------------------------------------
  | BACKDROP EDIT
  |--------------------------------------------------------------------------
  */

  document
    .getElementById(
      'editCommentModal'
    )
    .addEventListener(
      'click',
      function (event) {

        if (
          event.target === this
        ) {

          closeEditComment();

        }

      }
    );


  /*
  |--------------------------------------------------------------------------
  | BACKDROP REPLY
  |--------------------------------------------------------------------------
  */

  document
    .getElementById(
      'replyCommentModal'
    )
    .addEventListener(
      'click',
      function (event) {

        if (
          event.target === this
        ) {

          closeReplyComment();

        }

      }
    );


  /*
  |--------------------------------------------------------------------------
  | ESC
  |--------------------------------------------------------------------------
  */

  document.addEventListener(
    'keydown',
    function (event) {

      if (
        event.key === 'Escape'
      ) {

        closeEditComment();

        closeReplyComment();

        closeReportComment();

      }

    }
  );


  /*
  |--------------------------------------------------------------------------
  | LIKE / DISLIKE
  |--------------------------------------------------------------------------
  */

  document.addEventListener(
    'click',
    async function (event) {

      const button =
        event.target.closest(
          '[data-reaction-button]'
        );

      if (!button) {
        return;
      }

      event.preventDefault();

      if (
        button.dataset.loading ===
        'true'
      ) {

        return;

      }

      const commentId =
        button.dataset.commentId;

      const url =
        button.dataset.url;

      const buttons =
        document.querySelectorAll(
          `[data-reaction-button][data-comment-id="${commentId}"]`
        );

      try {

        button.dataset.loading =
          'true';

        buttons.forEach(function (item) {

          item.disabled =
            true;

          item.classList.add(
            'opacity-60'
          );

        });

        const response =
          await fetch(
            url,
            {
              method: 'POST',

              headers: {

                'X-CSRF-TOKEN':
                  document
                    .querySelector(
                      'meta[name="csrf-token"]'
                    )
                    .getAttribute(
                      'content'
                    ),

                'Accept':
                  'application/json',

                'X-Requested-With':
                  'XMLHttpRequest',

              },

            }
          );

        if (!response.ok) {

          throw new Error(
            'Gagal memproses reaction.'
          );

        }

        const data =
          await response.json();

        console.log(
          'REACTION RESPONSE:',
          data
        );

        updateReactionButtons(
          buttons,
          data
        );

      } catch (error) {

        console.error(
          'Reaction error:',
          error
        );

        alert(
          'Terjadi kesalahan saat memproses reaction.'
        );

      } finally {

        buttons.forEach(function (item) {

          item.disabled =
            false;

          item.classList.remove(
            'opacity-60'
          );

          item.dataset.loading =
            'false';

        });

      }

    }
  );


  /*
  |--------------------------------------------------------------------------
  | UPDATE REACTION BUTTONS
  |--------------------------------------------------------------------------
  */

  function updateReactionButtons(
    buttons,
    data
  ) {

    buttons.forEach(function (button) {

      const type =
        button.dataset.type;

      const icon =
        button.querySelector(
          '.reaction-icon'
        );

      const count =
        button.querySelector(
          '.reaction-count'
        );

      if (!icon || !count) {
        return;
      }

      const active =
        data.reaction === type;


      /*
      |--------------------------------------------------------------------------
      | COUNT
      |--------------------------------------------------------------------------
      */

      if (type === 'like') {

        count.textContent =
          data.likes_count;

      }

      if (type === 'dislike') {

        count.textContent =
          data.dislikes_count;

      }


      /*
      |--------------------------------------------------------------------------
      | RESET BUTTON
      |--------------------------------------------------------------------------
      */

      button.classList.remove(

        'bg-blue-100',
        'border-blue-300',
        'text-blue-700',

        'bg-red-100',
        'border-red-300',
        'text-red-700',

        'bg-indigo-50',
        'border-indigo-200',
        'text-gray-700',

        'hover:bg-indigo-100'

      );


      /*
      |--------------------------------------------------------------------------
      | RESET ICON
      |--------------------------------------------------------------------------
      */

      icon.classList.remove(

        'bi-hand-thumbs-up',
        'bi-hand-thumbs-up-fill',

        'bi-hand-thumbs-down',
        'bi-hand-thumbs-down-fill',

        'text-blue-700',
        'text-blue-800',

        'text-red-700',
        'text-red-800'

      );


      /*
      |--------------------------------------------------------------------------
      | LIKE
      |--------------------------------------------------------------------------
      */

      if (
        type === 'like'
      ) {

        if (active) {

          button.classList.add(
            'bg-blue-100',
            'border-blue-300',
            'text-blue-700'
          );

          icon.classList.add(
            'bi-hand-thumbs-up-fill',
            'text-blue-700'
          );

        } else {

          button.classList.add(
            'bg-indigo-50',
            'border-indigo-200',
            'text-gray-700',
            'hover:bg-indigo-100'
          );

          icon.classList.add(
            'bi-hand-thumbs-up',
            'text-blue-800'
          );

        }

      }


      /*
      |--------------------------------------------------------------------------
      | DISLIKE
      |--------------------------------------------------------------------------
      */

      if (
        type === 'dislike'
      ) {

        if (active) {

          button.classList.add(
            'bg-red-100',
            'border-red-300',
            'text-red-700'
          );

          icon.classList.add(
            'bi-hand-thumbs-down-fill',
            'text-red-700'
          );

        } else {

          button.classList.add(
            'bg-indigo-50',
            'border-indigo-200',
            'text-gray-700',
            'hover:bg-indigo-100'
          );

          icon.classList.add(
            'bi-hand-thumbs-down',
            'text-red-800'
          );

        }

      }

    });

  }


  /*
  |--------------------------------------------------------------------------
  | REPORT COMMENT
  |--------------------------------------------------------------------------
  */

  document.addEventListener(
    'click',
    function (event) {

      const button =
        event.target.closest(
          '[data-report-comment]'
        );

      if (!button) {
        return;
      }

      event.preventDefault();

      const modal =
        document.getElementById(
          'reportCommentModal'
        );

      const form =
        document.getElementById(
          'reportCommentForm'
        );

      if (!modal || !form) {
        return;
      }

      const commentId =
        button.dataset.commentId;

      form.action =
        `{{ url('/ec/tipscodings/category/' . $category->slug . '/tips/' . $tipscoding->slug . '/comments') }}/${commentId}/report`;

      form.querySelector(
        '[name="reason"]'
      ).value = '';

      form.querySelector(
        '[name="description"]'
      ).value = '';

      modal.classList.remove(
        'hidden'
      );

      modal.classList.add(
        'flex'
      );

      document.body.classList.add(
        'overflow-hidden'
      );

    }
  );


  /*
  |--------------------------------------------------------------------------
  | CLOSE REPORT
  |--------------------------------------------------------------------------
  */

  function closeReportComment() {

    const modal =
      document.getElementById(
        'reportCommentModal'
      );

    const form =
      document.getElementById(
        'reportCommentForm'
      );

    if (!modal || !form) {
      return;
    }

    modal.classList.add(
      'hidden'
    );

    modal.classList.remove(
      'flex'
    );

    document.body.classList.remove(
      'overflow-hidden'
    );

    form.querySelector(
      '[name="reason"]'
    ).value = '';

    form.querySelector(
      '[name="description"]'
    ).value = '';

  }


  /*
  |--------------------------------------------------------------------------
  | REPORT BACKDROP
  |--------------------------------------------------------------------------
  */

  const reportModal =
    document.getElementById(
      'reportCommentModal'
    );

  if (reportModal) {

    reportModal.addEventListener(
      'click',
      function (event) {

        if (event.target === this) {

          closeReportComment();

        }

      }
    );

  }

</script>
