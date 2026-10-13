<div class="flex items-start px-3 space-x-3 sm:space-x-4">

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
                  class="block w-full px-4 py-3 text-sm text-gray-800 transition bg-white border border-gray-300 outline-none rounded-xl placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >{{ old('comment') }}</textarea>

                @error('comment')

                  <p class="mt-2 ml-2 font-serif text-sm text-red-600">
                    {{ $message }}
                  </p>

                @enderror

              </div>

              <div class="flex justify-end mt-3">

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
