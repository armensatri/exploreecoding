<div class="flex items-center justify-between mb-4">

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
