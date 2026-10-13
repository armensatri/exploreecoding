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

                <div class="px-3 py-3 border-l-2 rounded-r-lg border-slate-200 bg-slate-50/70 sm:px-4">

                  <div class="flex items-start gap-3">

                    {{-- AVATAR --}}

                    <img
                      src="{{ $comment->user?->image ? asset('storage/' . $comment->user->image) : asset('backend/img/user/user.png') }}"
                      alt="image"
                      class="object-cover object-top w-8 h-8 rounded-full shrink-0 sm:h-9 sm:w-9"
                    />

                    <div class="flex-1 min-w-0">

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

                      <div class="mt-1 flex items-center gap-1.5 text-[12px] text-slate-400">

                        <i class="bi bi-arrow-return-right"></i>

                        <span class="italic">
                          Komentar utama telah dihapus
                        </span>

                      </div>

                      {{-- COMMENT --}}

                      <div class="mt-2 text-sm leading-6 text-slate-700">

                        @if ($comment->status === 'hidden')

                          <div class="rounded-lg border border-slate-200 bg-white px-3 py-2.5 italic text-slate-400">
                            <i class="mr-1 bi bi-eye-slash"></i>
                            Komentar ini telah disembunyikan.
                          </div>

                        @else

                          @php
                            $orphanText = $comment->comment;
                            $orphanMention = null;
                            $orphanMessage = $orphanText;

                            if (
                              preg_match(
                                '/^(@[a-zA-Z0-9_.-]+)(\s+)(.*)$/s',
                                $orphanText,
                                $matches
                              )
                            ) {
                              $orphanMention = $matches[1];
                              $orphanMessage = $matches[3];
                            }
                          @endphp

                          @if ($orphanMention)

                            <span class="font-medium text-blue-600">
                              {{ $orphanMention }}
                            </span>

                            @if ($orphanMessage !== '')
                              {{ ' ' . $orphanMessage }}
                            @endif

                          @else

                            {!! nl2br(e($orphanText)) !!}

                          @endif

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

                      <div class="flex flex-wrap items-center gap-3 mt-3">

                        {{-- LIKE / DISLIKE --}}

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
                            class="inline-flex items-center gap-1 text-xs {{ $commentReaction === 'like' ? 'text-blue-600' : 'text-slate-500 hover:text-blue-600' }}"
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
                            class="inline-flex items-center gap-1 text-xs {{ $commentReaction === 'dislike' ? 'text-red-600' : 'text-slate-500 hover:text-red-600' }}"
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
