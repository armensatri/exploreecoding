@forelse ($comments as $comment)
  @php
    $canDeleteComment = $comment->user_id === $currentUser?->id ||
      $canManageAllComments ||
      $canManageTipscodingComments;

    $commentReaction = $comment->reactions->first()?->type;
  @endphp

  {{-- Komentar utama --}}
  <div
    id="comment-{{ $comment->id }}"
    class="scroll-mt-24 {{ $comment->is_pinned ? 'rounded-r-md
    border-l-2 border-blue-500 bg-blue-50/50 pl-3' : '' }}">

    <div
      class="flex items-start space-x-3 sm:space-x-4"
      data-comment-id="{{ $comment->id }}">

      {{-- Avatar --}}
      <img
        src="{{ $comment->user?->image
        ? asset('storage/' . $comment->user->image)
        : asset('backend/img/user/user.png') }}"
        alt="{{ $comment->user?->username ?? 'User' }}"
        class="object-cover object-top w-10 h-10 p-px
        bg-gray-500 rounded-full"
      />

      {{-- Content --}}
      <div class="flex-1 mt-2 space-y-2 text-sm sm:text-base">
        {{-- Username + waktu --}}
        <div class="flex flex-wrap items-center space-x-2">
          <div class="font-medium text-gray-800">
            <span>@</span>{{ $comment->user?->username ?? 'user' }}
          </div>

          {{-- Pinned --}}
          @if ($comment->is_pinned)
            <div class="text-[12px] font-medium text-blue-600">
              <i class="bi bi-pin-angle-fill"></i>
              Pinned
            </div>
          @endif

          {{-- Waktu --}}
          <div
            class="mt-0.5 text-[13px] tracking-normal
            text-gray-400">
            di buat {{ $comment->created_at->diffForHumans() }}
          </div>

          {{-- Edited --}}
          @if ($comment->edited_at)
            <div
              class="mt-0.5 text-[13px] tracking-normal
              text-gray-400">
              · Edited {{ $comment->edited_at->diffForHumans() }}
            </div>
          @endif
        </div>

        {{-- Isi komentar --}}
        @if ($comment->status === 'hidden')
          <div
            class="ml-1 rounded-lg border border-slate-200
            bg-slate-50 px-3 py-2.5 text-sm italic
            text-slate-400">
            <i class="mr-1 bi bi-eye-slash"></i>
            Komentar ini telah disembunyikan.
          </div>
        @else
          <p class="ml-1 text-gray-800 whitespace-pre-line">
            {{ $comment->comment }}
          </p>
        @endif

        {{-- Action komentar --}}
        <div class="ml-1 flex flex-wrap items-center gap-1.5">
          {{-- Edit --}}
          @if (
            $comment->status === 'approved' &&
            $comment->user_id === $currentUser?->id
          )
            <button type="button"
              onclick="openEditComment(
                {{ $comment->id }},
                @js($comment->comment),
                @js(route('tipscodings.comments.update', [
                  'category' => $category->slug,
                  'tipscoding' => $tipscoding->slug,
                  'comment' => $comment->id,
                ]))
              )"
              class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-md border border-indigo-200 bg-blue-500 px-2 py-1 text-[12px] font-medium
              text-white hover:bg-blue-600"
              title="Edit komentar">
              <i class="bi bi-pencil-square"></i>
            </button>
          @endif

          {{-- Delete SAMPAI SINI DULU--}}
          @if ($canDeleteComment)
            <form action="{{ route('tipscodings.comments.destroy', [
                'category' => $category->slug,
                'tipscoding' => $tipscoding->slug,
                'comment' => $comment->id,
              ]) }}"
              method="POST"
              class="inline"
              onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
              @csrf
              @method('DELETE')

              <button
                type="submit"
                class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-md border border-red-200 bg-red-500 px-2 py-1 text-[12px] font-medium text-white hover:bg-red-600"
                title="Hapus komentar">
                <i class="bi bi-trash3"></i>
              </button>
            </form>
          @endif

          {{-- Action approved --}}
          @if ($comment->status === 'approved')

            {{-- Reply --}}
            <button
              type="button"
              onclick="openReplyComment(
                {{ $comment->id }},
                @js($comment->user?->username ?? 'user')
              )"
              class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-md border border-gray-200 bg-gray-50 px-2 py-1 text-[12px] font-medium text-gray-700 hover:bg-gray-100"
              title="Balas komentar">
              <i class="bi bi-reply"></i>
            </button>

            {{-- Report --}}
            @if (Auth::check())
              <button
                type="button"
                data-report-comment
                data-comment-id="{{ $comment->id }}"
                class="inline-flex items-center gap-1 text-xs font-medium transition text-slate-500 hover:text-red-500">
                <i class="bi bi-flag"></i>
                <span>Report</span>
              </button>
            @endif

            {{-- Like --}}
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
              class="reaction-like inline-flex shrink-0 cursor-pointer items-center rounded-md border px-2 py-1 text-[11px] font-medium transition {{ $commentReaction === 'like' ? 'border-blue-300 bg-blue-100 text-blue-700' : 'border-indigo-200 bg-indigo-50 text-gray-700 hover:bg-indigo-100' }}"
              title="Like">
              <i class="reaction-icon bi bi-hand-thumbs-up{{ $commentReaction === 'like' ? '-fill' : '' }} {{ $commentReaction === 'like' ? 'text-blue-700' : 'text-blue-800' }}"></i>

              <span class="ml-1 reaction-count">
                {{ $comment->likes_count }}
              </span>
            </button>

            {{-- Dislike --}}
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
              class="reaction-dislike inline-flex shrink-0 cursor-pointer items-center rounded-md border px-2 py-1 text-[11px] font-medium transition {{ $commentReaction === 'dislike' ? 'border-red-300 bg-red-100 text-red-700' : 'border-indigo-200 bg-indigo-50 text-gray-700 hover:bg-indigo-100' }}"
              title="Dislike">
              <i class="reaction-icon bi bi-hand-thumbs-down{{ $commentReaction === 'dislike' ? '-fill' : '' }} {{ $commentReaction === 'dislike' ? 'text-red-700' : 'text-red-800' }}"></i>

              <span class="ml-1 reaction-count">
                {{ $comment->dislikes_count }}
              </span>
            </button>

            {{-- Pin --}}
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
                method="POST">
                @csrf
                @method('PATCH')

                <button
                  type="submit"
                  class="cursor-pointer rounded-md px-2 py-1 text-xs {{ $comment->is_pinned ? 'text-blue-600 hover:text-blue-700' : 'text-slate-500 hover:text-blue-600' }}">
                  {{ $comment->is_pinned ? 'Unpin' : 'Pin' }}
                </button>
              </form>
            @endif
          @endif
        </div>

        {{-- Daftar reply --}}
        @if ($comment->replies->isNotEmpty())
          <div class="pl-4 mt-4 ml-2 space-y-4 border-l-2 border-gray-100 sm:ml-6">

            @foreach ($comment->replies as $reply)
              @php
                $canDeleteReply =
                  $reply->user_id === $currentUser?->id ||
                  $canManageAllComments ||
                  $canManageTipscodingComments;

                $replyReaction = $reply->reactions->first()?->type;
              @endphp

              {{-- Daftar reply . Reply --}}
              <div
                id="comment-{{ $reply->id }}"
                class="scroll-mt-24">

                <div class="flex items-start space-x-3" data-comment-id="{{ $reply->id }}">

                  {{-- Daftar reply . Avatar --}}
                  <img
                    src="{{ $reply->user?->image ? asset('storage/' . $reply->user->image) : asset('backend/img/user/user.png') }}"
                    alt="{{ $reply->user?->username ?? 'User' }}"
                    class="object-cover object-top w-8 h-8 p-px bg-gray-500 rounded-full" />

                  {{-- Daftar reply . Content --}}
                  <div class="flex-1 space-y-1 text-sm">

                    {{-- Daftar reply . username + waktu --}}
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

                    {{-- Daftar reply . isi reply --}}
                    @if ($reply->status === 'hidden')
                      <div class="rounded-lg border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm italic text-slate-400">
                        <i class="mr-1 bi bi-eye-slash"></i>
                        Komentar ini telah disembunyikan.
                      </div>
                    @else
                      @php
                        $replyText = $reply->comment;
                        $replyMention = null;
                        $replyMessage = $replyText;

                        if (
                          preg_match(
                            '/^(@[a-zA-Z0-9_.-]+)(\s+)(.*)$/s',
                            $replyText,
                            $matches
                          )
                        ) {
                          $replyMention = $matches[1];
                          $replyMessage = $matches[3];
                        }
                      @endphp

                      <div class="py-2.5 text-gray-800">
                        @if ($replyMention)
                          <span class="font-medium text-blue-600">
                            {{ $replyMention }}
                          </span>

                          @if ($replyMessage !== '')
                            {{ ' ' . $replyMessage }}
                          @endif
                        @else
                          {{ $replyText }}
                        @endif
                      </div>
                    @endif

                    {{-- Daftar reply . action reply --}}
                    <div class="flex flex-wrap items-center gap-1.5">

                      {{-- Daftar reply . edit reply --}}
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
                          title="Edit balasan">
                          <i class="bi bi-pencil-square"></i>
                        </button>
                      @endif

                      {{-- Daftar reply . delete reply --}}
                      @if ($canDeleteReply)
                        <form
                          action="{{ route('tipscodings.comments.destroy', [
                            'category' => $category->slug,
                            'tipscoding' => $tipscoding->slug,
                            'comment' => $reply->id,
                          ]) }}"
                          method="POST"
                          class="inline"
                          onsubmit="return confirm('Yakin ingin menghapus balasan ini?')">
                          @csrf
                          @method('DELETE')

                          <button
                            type="submit"
                            class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-md border border-red-200 bg-red-500 px-2 py-1 text-[11px] font-medium text-white hover:bg-red-600"
                            title="Hapus balasan">
                            <i class="bi bi-trash3"></i>
                          </button>
                        </form>
                      @endif

                      {{-- Daftar reply . approved --}}
                      @if ($reply->status === 'approved')
                        <button
                          type="button"
                          onclick="openReplyComment(
                            {{ $reply->id }},
                            @js($reply->user?->username ?? 'user')
                          )"
                          class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-md border border-gray-200 bg-gray-50 px-2 py-1 text-[11px] font-medium text-gray-700 hover:bg-gray-100"
                          title="Balas {{ '@' . ($reply->user?->username ?? 'user') }}">
                          <i class="bi bi-reply"></i>
                        </button>
                      @endif

                      {{-- Daftar reply . report reply --}}
                      @if (
                        $reply->status === 'approved' &&
                        Auth::check()
                      )
                        <button
                          type="button"
                          data-report-comment
                          data-comment-id="{{ $reply->id }}"
                          class="inline-flex items-center gap-1 text-xs font-medium transition text-slate-500 hover:text-red-500"
                          title="Report balasan">
                          <i class="bi bi-flag"></i>
                          <span>Report</span>
                        </button>
                      @endif

                      {{-- Daftar reply . reaction reply --}}
                      @if ($reply->status === 'approved')

                        {{-- Daftar reply . reaction . like --}}
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
                          class="reaction-like inline-flex shrink-0 cursor-pointer items-center rounded-md border px-2 py-1 text-[11px] font-medium transition {{ $replyReaction === 'like' ? 'border-blue-300 bg-blue-100 text-blue-700' : 'border-indigo-200 bg-indigo-50 text-gray-700 hover:bg-indigo-100' }}"
                          title="Like">
                          <i class="reaction-icon bi bi-hand-thumbs-up{{ $replyReaction === 'like' ? '-fill' : '' }} {{ $replyReaction === 'like' ? 'text-blue-700' : 'text-blue-800' }}"></i>

                          <span class="ml-1 reaction-count">
                            {{ $reply->likes_count }}
                          </span>
                        </button>

                        {{-- Daftar reply . reaction . dislike --}}
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
                          class="reaction-dislike inline-flex shrink-0 cursor-pointer items-center rounded-md border px-2 py-1 text-[11px] font-medium transition {{ $replyReaction === 'dislike' ? 'border-red-300 bg-red-100 text-red-700' : 'border-indigo-200 bg-indigo-50 text-gray-700 hover:bg-indigo-100' }}"
                          title="Dislike">
                          <i class="reaction-icon bi bi-hand-thumbs-down{{ $replyReaction === 'dislike' ? '-fill' : '' }} {{ $replyReaction === 'dislike' ? 'text-red-700' : 'text-red-800' }}"></i>

                          <span class="ml-1 reaction-count">
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

  {{-- Belum ada komentar --}}
  <div class="py-8 text-center border border-gray-300 border-dashed rounded-xl">
    <p class="text-base text-gray-500">
      Belum ada komentar.
    </p>

    <p class="mt-1 text-sm text-gray-400">
      Jadilah yang pertama memberikan komentar.
    </p>
  </div>

@endforelse
