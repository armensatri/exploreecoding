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
        class="w-full bg-white p-6 xl:p-8 rounded-2xl shadow-xs font-sans text-gray-800 space-y-6"
      >

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
                  ? 'border-l-2 border-blue-500 bg-blue-50/50 pl-3 rounded-r-md'
                  : '' }}">


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
                class="object-cover object-top w-10 h-10 p-px bg-gray-500 rounded-full"
              />


              {{-- ===================================================== --}}
              {{-- CONTENT --}}
              {{-- ===================================================== --}}

              <div class="flex-1 space-y-2 text-sm sm:text-base mt-2">


                {{-- ================================================= --}}
                {{-- USERNAME + WAKTU --}}
                {{-- ================================================= --}}

                <div class="flex items-center space-x-2 flex-wrap">

                  <div class="font-medium text-gray-800">
                    <span>@</span>{{ $comment->user?->username ?? 'user' }}
                  </div>

                  @if ($comment->is_pinned)
        <div class="text-[12px] text-blue-600 font-medium">
            <i class="bi bi-pin-angle-fill"></i>
            Pinned
        </div>
    @endif

                  <div
                    class="text-[13px] text-gray-400 mt-0.5 tracking-normal"
                    >
                    di buat {{ $comment->created_at->diffForHumans() }}
                  </div>

                @if ($comment->edited_at)
                    <div class="text-[13px] text-gray-400 mt-0.5 tracking-normal">
                        · Edited {{ $comment->edited_at->diffForHumans() }}
                    </div>
                @endif

                </div>


                {{-- ================================================= --}}
                {{-- ISI KOMENTAR --}}
                {{-- ================================================= --}}

                <p class="text-gray-800 ml-1 whitespace-pre-line">
                  {{ $comment->comment }}
                </p>


                {{-- ================================================= --}}
                {{-- ACTION KOMENTAR --}}
                {{-- ================================================= --}}

                <div class="ml-1 flex flex-wrap items-center gap-1.5">


                  {{-- ================================================= --}}
                  {{-- EDIT --}}
                  {{-- ================================================= --}}

                  @if ($comment->user_id === $currentUser?->id)

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
                      class="shrink-0 inline-flex items-center justify-center px-2 py-1 bg-blue-500 rounded-md text-[12px] font-medium text-white hover:bg-blue-600 cursor-pointer border border-indigo-200"
                      title="Edit komentar"
                    >
                      <i class="bi bi-pencil-square"></i>
                    </button>

                  @endif


                  {{-- ================================================= --}}
                  {{-- HAPUS --}}
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
                        class="shrink-0 inline-flex items-center justify-center px-2 py-1 bg-red-500 rounded-md text-[12px] font-medium text-white hover:bg-red-600 cursor-pointer border border-red-200"
                        title="Hapus komentar"
                      >
                        <i class="bi bi-trash3"></i>
                      </button>

                    </form>

                  @endif


                  {{-- ================================================= --}}
                  {{-- REPLY --}}
                  {{-- ================================================= --}}

                  <button
                    type="button"
                    onclick="openReplyComment(
                      {{ $comment->id }},
                      @js($comment->user?->username ?? 'user')
                    )"
                    class="shrink-0 inline-flex items-center justify-center px-2 py-1 bg-gray-50 rounded-md text-[12px] font-medium text-gray-700 hover:bg-gray-100 cursor-pointer border border-gray-200"
                    title="Balas komentar"
                  >
                    <i class="bi bi-reply"></i>
                  </button>


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
                    class="reaction-like shrink-0 inline-flex items-center px-2 py-1 rounded-md text-[11px] font-medium cursor-pointer border transition
                      {{ $commentReaction === 'like'
                        ? 'bg-blue-100 border-blue-300 text-blue-700'
                        : 'bg-indigo-50 border-indigo-200 text-gray-700 hover:bg-indigo-100' }}"
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
                    class="reaction-dislike shrink-0 inline-flex items-center px-2 py-1 rounded-md text-[11px] font-medium cursor-pointer border transition
                      {{ $commentReaction === 'dislike'
                        ? 'bg-red-100 border-red-300 text-red-700'
                        : 'bg-indigo-50 border-indigo-200 text-gray-700 hover:bg-indigo-100' }}"
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

                  {{-- PIN --}}
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
                              class="text-xs text-slate-500 hover:text-blue-600"
                          >
                              {{ $comment->is_pinned ? 'Unpin' : 'Pin' }}
                          </button>
                      </form>
                  @endif
                </div>


                {{-- ========================================================= --}}
                {{-- DAFTAR REPLY --}}
                {{-- ========================================================= --}}

                @if ($comment->replies->isNotEmpty())

                  <div
                    class="mt-4 ml-2 sm:ml-6 space-y-4 border-l-2 border-gray-100 pl-4"
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
                            class="object-cover object-top w-8 h-8 p-px bg-gray-500 rounded-full"
                          />


                          {{-- ================================================= --}}
                          {{-- CONTENT REPLY --}}
                          {{-- ================================================= --}}

                          <div class="flex-1 space-y-1 text-sm">


                            {{-- ================================================= --}}
                            {{-- USERNAME + WAKTU --}}
                            {{-- ================================================= --}}

                            <div class="flex items-center space-x-2 flex-wrap">

                              <div class="font-medium text-gray-800">
                                <span>@</span>{{ $reply->user?->username ?? 'user' }}
                              </div>

                              <div class="text-[12px] text-gray-400">
                                {{ $reply->created_at->diffForHumans() }}
                              </div>

                              @if ($reply->edited_at)
                                <div class="text-[13px] text-gray-400 mt-0.5 tracking-normal">
                                    · Edited {{ $reply->edited_at->diffForHumans() }}
                                </div>
                            @endif

                            </div>


                            {{-- ================================================= --}}
                            {{-- ISI REPLY --}}
                            {{-- ================================================= --}}

                            <p class="text-gray-800 whitespace-pre-line">
                              {{ $reply->comment }}
                            </p>


                            {{-- ================================================= --}}
                            {{-- ACTION REPLY --}}
                            {{-- ================================================= --}}

                            <div class="flex flex-wrap items-center gap-1.5">


                              {{-- ================================================= --}}
                              {{-- EDIT REPLY --}}
                              {{-- ================================================= --}}

                              @if ($reply->user_id === $currentUser?->id)

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
                                  class="shrink-0 inline-flex items-center justify-center px-2 py-1 bg-blue-500 rounded-md text-[11px] font-medium text-white hover:bg-blue-600 cursor-pointer border border-indigo-200"
                                  title="Edit balasan"
                                >
                                  <i class="bi bi-pencil-square"></i>
                                </button>

                              @endif


                              {{-- ================================================= --}}
                              {{-- HAPUS REPLY --}}
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
                                    class="shrink-0 inline-flex items-center justify-center px-2 py-1 bg-red-500 rounded-md text-[11px] font-medium text-white hover:bg-red-600 cursor-pointer border border-red-200"
                                    title="Hapus balasan"
                                  >
                                    <i class="bi bi-trash3"></i>
                                  </button>

                                </form>

                              @endif


                              {{-- ================================================= --}}
                              {{-- LIKE REPLY --}}
                              {{-- ================================================= --}}

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
                                class="reaction-like shrink-0 inline-flex items-center px-2 py-1 rounded-md text-[11px] font-medium cursor-pointer border transition
                                  {{ $replyReaction === 'like'
                                    ? 'bg-blue-100 border-blue-300 text-blue-700'
                                    : 'bg-indigo-50 border-indigo-200 text-gray-700 hover:bg-indigo-100' }}"
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


                              {{-- ================================================= --}}
                              {{-- DISLIKE REPLY --}}
                              {{-- ================================================= --}}

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
                                class="reaction-dislike shrink-0 inline-flex items-center px-2 py-1 rounded-md text-[11px] font-medium cursor-pointer border transition
                                  {{ $replyReaction === 'dislike'
                                    ? 'bg-red-100 border-red-300 text-red-700'
                                    : 'bg-indigo-50 border-indigo-200 text-gray-700 hover:bg-indigo-100' }}"
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

        <div class="flex items-start space-x-3 sm:space-x-4 px-3">

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

                  <p class="mt-2 font-serif ml-2 text-sm text-red-600">
                    {{ $message }}
                  </p>

                @enderror

              </div>

              <div class="mt-3 flex justify-end">

                <button
                  type="submit"
                  class="rounded-[10px] bg-blue-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700 cursor-pointer"
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
        class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-400 hover:bg-gray-100 hover:text-gray-700 cursor-pointer"
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
        class="hidden mt-2 font-serif text-sm text-red-600"
      ></p>

      <div class="mt-4 flex justify-end gap-2">

        <button
          type="button"
          onclick="closeEditComment()"
          class="rounded-[10px] border border-gray-300 px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 cursor-pointer"
        >
          Batal
        </button>

        <button
          type="submit"
          class="rounded-[10px] bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 cursor-pointer"
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
        class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg text-gray-400 hover:bg-gray-100 hover:text-gray-700 cursor-pointer"
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
          class="rounded-[10px] border border-gray-300 px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 cursor-pointer"
        >
          Batal
        </button>

        <button
          type="submit"
          class="rounded-[10px] bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 cursor-pointer"
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
  |
  | Contoh URL:
  |
  | /ec/tipscodings/category/javascript/tips/apa-itu-javascript#comment-65
  |
  | Maka browser akan mencari:
  |
  | id="comment-65"
  |
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

      /*
      | Kalau halaman dibuka dari notification,
      | jangan gunakan scroll restoration.
      */

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


      /*
      |--------------------------------------------------------------------------
      | Jangan request berkali-kali
      |--------------------------------------------------------------------------
      */

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


      /*
      |--------------------------------------------------------------------------
      | Semua tombol reaction comment
      |--------------------------------------------------------------------------
      */

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


        /*
        |--------------------------------------------------------------------------
        | AJAX
        |--------------------------------------------------------------------------
        */

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


        /*
        |--------------------------------------------------------------------------
        | Update UI
        |--------------------------------------------------------------------------
        */

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

</script>
