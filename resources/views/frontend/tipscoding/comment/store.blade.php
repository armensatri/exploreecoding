<section class="mt-10 sm:px-5">
  <div class="comment">
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
        class="w-full p-6 space-y-6 font-sans text-gray-800
        bg-white shadow-xs rounded-2xl xl:p-8">

        {{-- Header --}}
        @include('frontend.tipscoding.comment.header')

        {{-- Daftar comment --}}
        @include('frontend.tipscoding.comment.daftar-comment')

        {{-- Report modal --}}
        @include('frontend.tipscoding.comment.report-modal')

        {{-- Orphan replies --}}
        @include('frontend.tipscoding.comment.orphan-replies')

        {{-- Paginate --}}
        <div class="grid table-pagination">
          @if ($comments->lastPage() > 1)
            <x-paginate :pagination="$comments" />
          @endif
        </div>

        {{-- Form comentar baru --}}
        @include('frontend.tipscoding.comment.form-comentar-baru')
      </div>
    </div>
  </div>
</section>

{{-- Popup edit comentar --}}
@include('frontend.tipscoding.comment.popup-edit-comentar')

{{-- Popup reply comentar --}}
@include('frontend.tipscoding.comment.popup-reply-comentar')

<script>
  // Scroll ke komentar dari notifikasi
  document.addEventListener('DOMContentLoaded', function () {
    const hash = window.location.hash;
    if (!hash || !hash.startsWith('#comment-')) return;

    setTimeout(function () {
      const comment = document.querySelector(hash);
      if (!comment) return;

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
        comment.classList.remove('bg-yellow-50');
      }, 2500);
    }, 300);
  });


  // Scroll restoration
  const commentScrollKey = 'tipscoding-comment-scroll';

  if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
  }

  // Simpan scroll sebelum form di kirim
  document.addEventListener('submit', function (event) {
    const form = event.target;

    if (form.action && form.action.includes('/comments')) {
      sessionStorage.setItem(commentScrollKey, String(window.scrollY));
    }
  });

  // kembalikan scroll
  window.addEventListener('load', function () {
    if (window.location.hash && window.location.hash.startsWith(
      '#comment-'
    )) {
      sessionStorage.removeItem(commentScrollKey);
      return;
    }

    const savedScroll = sessionStorage.getItem(commentScrollKey);

    if (savedScroll === null) return;
    sessionStorage.removeItem(commentScrollKey);

    requestAnimationFrame(function () {
      window.scrollTo({
        top: Number(savedScroll),
        behavior: 'instant',
      });
    });
  });

  // Pagination
  document.addEventListener('click', function (event) {
    const paginationLink = event.target.closest(
      '.table-pagination a'
    );

    if (!paginationLink) return;

    sessionStorage.removeItem(commentScrollKey);
  });

  // Edit comment
  function openEditComment(id, comment, action) {
    const modal = document.getElementById('editCommentModal');
    const form = document.getElementById('editCommentForm');
    const textarea = document.getElementById('editCommentTextarea');
    const error = document.getElementById('editCommentError');

    if (!modal || !form || !textarea || !error) return;

    textarea.value = comment;
    form.action = action;
    error.textContent = '';

    error.classList.add('hidden');
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    setTimeout(function () {
      textarea.focus();
    }, 100);
  }

  // Close edit
  function closeEditComment() {
    const modal = document.getElementById('editCommentModal');
    const textarea = document.getElementById('editCommentTextarea');

    if (!modal) return;

    modal.classList.add('hidden');
    modal.classList.remove('flex');

    if (textarea) {
      textarea.value = '';
    }
  }

  // Reply comment
  let replyMentionPrefix = '';

  // Open reply
  function openReplyComment(id, username) {
    const modal = document.getElementById('replyCommentModal');
    const parentId = document.getElementById('replyParentId');
    const textarea = document.getElementById('replyCommentTextarea');
    const user = document.getElementById('replyCommentUser');

    if (!modal || !parentId || !textarea || !user) return;

    // Open reply . id comment yg di balas
    parentId.value = id;

    // Open reply . mention
    replyMentionPrefix = `@${username} `;

    // Open reply . informasi user
    user.innerHTML = `
      Membalas
      <span class="font-medium text-blue-600">
        @${username}
      </span>
    `;

    // Open reply . isi textarea
    textarea.value = replyMentionPrefix;

    // Open reply . tampilkan modal
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    // Open reply . fokus
    setTimeout(function () {
      textarea.focus();
      textarea.setSelectionRange(
        textarea.value.length,
        textarea.value.length
      );
    }, 100);
  }

  // Proteksi mention
  const replyTextarea = document.getElementById('replyCommentTextarea');

  if (replyTextarea) {
    // Proteksi mention . keydown
    replyTextarea.addEventListener('keydown', function (event) {
      if (!replyMentionPrefix) return;

      const prefixLength = replyMentionPrefix.length;
      const selectionStart = this.selectionStart;

      // Proteksi mention . keydown . ctrl + a & cmd + a
      if ((
        event.ctrlKey || event.metaKey
      ) && event.key.toLowerCase() === 'a') {
        event.preventDefault();
        this.setSelectionRange(prefixLength, this.value.length);

        return;
      }

      // Proteksi mention . keydown . backspace
      if (event.key === 'Backspace' &&selectionStart <= prefixLength) {
        event.preventDefault();
        this.setSelectionRange(prefixLength, prefixLength);

        return;
      }

      // Proteksi mention . keydown . delete
      if (event.key === 'Delete' && selectionStart < prefixLength) {
        event.preventDefault();
        this.setSelectionRange(prefixLength, prefixLength);

        return;
      }

      // Proteksi mention . keydown . home
      if (event.key === 'Home' && !event.shiftKey) {
        event.preventDefault();
        this.setSelectionRange(prefixLength, prefixLength);

        return;
      }

      // Proteksi mention . keydown . shift + home
      if (event.key === 'Home' && event.shiftKey) {
        event.preventDefault();
        this.setSelectionRange(prefixLength, selectionStart);

        return;
      }

      // Proteksi mention . keydown . arrow left
      if (event.key === 'ArrowLeft' && selectionStart <= prefixLength) {
        event.preventDefault();
        this.setSelectionRange(prefixLength, prefixLength);

        return;
      }
    });

    // Proteksi mention . input
    replyTextarea.addEventListener('input', function () {
      if (!replyMentionPrefix) return;

      // Proteksi mention . input . mention masih utuh
      if (this.value.startsWith(replyMentionPrefix)) return;

      const currentValue = this.value;
      const mentionText = replyMentionPrefix.trim();
      let content = currentValue;

      // Proteksi mention . input . cari mention lama
      if (currentValue.startsWith('@')) {
        const firstSpace = currentValue.indexOf(' ');

        if (firstSpace !== -1) {
          content = currentValue.substring(firstSpace + 1);
        }
      }

      // Proteksi mention . input . pasang kembali mention
      this.value = `${mentionText} ${content}`;

      // Proteksi mention . input . cursor
      this.setSelectionRange(this.value.length, this.value.length);
    });

    // Proteksi mention . click
    replyTextarea.addEventListener('click', function () {
      if (this.selectionStart < replyMentionPrefix.length) {
        this.setSelectionRange(
          replyMentionPrefix.length,
          replyMentionPrefix.length
        );
      }
    });

    // Proteksi mention . focus
    replyTextarea.addEventListener('focus', function () {
      if (this.selectionStart < replyMentionPrefix.length) {
        this.setSelectionRange(
          replyMentionPrefix.length,
          replyMentionPrefix.length
        );
      }
    });
  }

  // Close reply
  function closeReplyComment() {
    const modal = document.getElementById('replyCommentModal');
    const parentId = document.getElementById('replyParentId');
    const textarea = document.getElementById('replyCommentTextarea');

    if (!modal) return;

    modal.classList.add('hidden');
    modal.classList.remove('flex');

    if (parentId) { parentId.value = ''; }
    if (textarea) { textarea.value = ''; }

    // Close reply . reset mention
    replyMentionPrefix = '';
  }

  // Backdrop edit
  const editCommentModal = document.getElementById('editCommentModal');

  if (editCommentModal) {
    editCommentModal.addEventListener('click', function (event) {
      if (event.target === this) {
        closeEditComment();
      }
    });
  }

  // Backdrop reply
  const replyCommentModal = document.getElementById(
    'replyCommentModal'
  );

  if (replyCommentModal) {
    replyCommentModal.addEventListener('click', function (event) {
      if (event.target === this) {
        closeReplyComment();
      }
    });
  }

  // Esc
  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      closeEditComment();
      closeReplyComment();
      closeReportComment();
    }
  });

  // Like & dislike
  document.addEventListener('click', async function (event) {
    const button = event.target.closest('[data-reaction-button]');

    if (!button) return;
    event.preventDefault();

    if (button.dataset.loading === 'true') return;

    const commentId = button.dataset.commentId;
    const url = button.dataset.url;
    const buttons = document.querySelectorAll(
      `[data-reaction-button][data-comment-id="${commentId}"]`
    );

    try {
      button.dataset.loading = 'true';

      buttons.forEach(function (item) {
        item.disabled = true;
        item.classList.add('opacity-60');
      });

      const csrfToken = document.querySelector(
        'meta[name="csrf-token"]'
      );

      if (!csrfToken) {
        throw new Error('CSRF token tidak ditemukan.');
      }

      const response = await fetch(url, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest',
        },
      });

      if (!response.ok) {
        throw new Error('Gagal memproses reaction.');
      }

      const data = await response.json();

      updateReactionButtons(
        buttons,
        data
      );
    } catch (error) {
      console.error('Reaction error:', error);

      alert(
        'Terjadi kesalahan saat memproses reaction.'
      );
    } finally {
      buttons.forEach(function (item) {
        item.disabled = false;
        item.classList.remove('opacity-60');
        item.dataset.loading = 'false';
      });
    }
  });

  // Update reaction buttons
  function updateReactionButtons(buttons, data) {
    buttons.forEach(function (button) {
      const type = button.dataset.type;
      const icon = button.querySelector('.reaction-icon');
      const count = button.querySelector('.reaction-count');

      if (!icon || !count) return;
      const active = data.reaction === type;

      // Update reaction buttons . count like
      if (type === 'like') {
        count.textContent = data.likes_count;
      }

      // Update reaction buttons . count dislike
      if (type === 'dislike') {
        count.textContent = data.dislikes_count;
      }

      // Update reaction buttons . reset button
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

      // Update reaction buttons . reset icon
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

      // Update reaction buttons . like color
      if (type === 'like') {
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

      // Update reaction buttons . dislike color
      if (type === 'dislike') {
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

  // Report comment
  document.addEventListener('click', function (event) {
    const button = event.target.closest('[data-report-comment]');

    if (!button) return;
    event.preventDefault();

    const modal = document.getElementById('reportCommentModal');
    const form = document.getElementById('reportCommentForm');

    if (!modal || !form) return;

    const commentId = button.dataset.commentId;

    form.action = `{{
      url('/ec/tipscodings/category/'
      . $category->slug
      . '/tips/'
      . $tipscoding->slug
      . '/comments')
    }}/${commentId}/report`;

    form.querySelector('[name="reason"]').value = '';
    form.querySelector('[name="description"]').value = '';

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');
  });

  // Close report
  function closeReportComment() {
    const modal = document.getElementById('reportCommentModal');
    const form = document.getElementById('reportCommentForm');

    if (!modal || !form) return;

    modal.classList.add('hidden');
    modal.classList.remove('flex');

    document.body.classList.remove('overflow-hidden');

    form.querySelector('[name="reason"]').value = '';
    form.querySelector('[name="description"]').value = '';
  }

  // Report backdrop
  const reportModal = document.getElementById('reportCommentModal');

  if (reportModal) {
    reportModal.addEventListener('click',function (event) {
      if (event.target === this) {
        closeReportComment();
      }
    });
  }
</script>
