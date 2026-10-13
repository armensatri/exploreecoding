 @if (Auth::check())

          <div
            id="reportCommentModal"
            class="fixed inset-0 z-50 items-center justify-center hidden px-4 bg-slate-950/50"
            aria-hidden="true"
          >

            <div
              class="w-full max-w-md bg-white shadow-xl rounded-2xl"
              data-report-modal-panel
            >

              <div class="flex items-center justify-between px-5 py-4 border-b border-slate-200">

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
                  class="flex items-center justify-center w-8 h-8 transition rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-700"
                >
                  <i class="bi bi-x-lg"></i>
                </button>

              </div>

              <form
                id="reportCommentForm"
                method="POST"
                action=""
              >

                @csrf

                <div class="px-5 py-5 space-y-5">

                  {{-- REASON --}}

                  <div>

                    <label
                      for="reportReason"
                      class="block mb-2 text-sm font-semibold text-slate-700"
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
                      class="block mb-2 text-sm font-semibold text-slate-700"
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

                    <div class="mt-1 text-xs text-right text-slate-400">
                      Maksimal 1000 karakter
                    </div>

                  </div>

                </div>

                <div class="flex justify-end gap-2 px-5 py-4 border-t border-slate-200">

                  <button
                    type="button"
                    onclick="closeReportComment()"
                    class="px-4 py-2 text-sm font-medium transition border rounded-xl border-slate-300 text-slate-600 hover:bg-slate-50"
                  >
                    Batal
                  </button>

                  <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white transition bg-red-500 rounded-xl hover:bg-red-600"
                  >
                    <i class="bi bi-flag"></i>
                    Kirim laporan
                  </button>

                </div>

              </form>

            </div>

          </div>

        @endif
