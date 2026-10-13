<div
  id="replyCommentModal"
  class="fixed inset-0 z-50 items-center justify-center hidden px-4 bg-black/40"
  >

  <div class="w-full max-w-lg p-6 bg-white shadow-xl rounded-2xl">

    <div class="flex items-start justify-between gap-4 mb-5">

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
        class="inline-flex items-center justify-center w-8 h-8 text-gray-400 rounded-lg cursor-pointer shrink-0 hover:bg-gray-100 hover:text-gray-700"
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
        class="block w-full px-4 py-3 text-sm text-gray-800 transition bg-white border border-gray-300 outline-none rounded-xl placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
      ></textarea>

      @error('comment')

        <p class="mt-2 font-serif text-sm text-red-600">
          {{ $message }}
        </p>

      @enderror

      <div class="flex justify-end gap-2 mt-4">

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
