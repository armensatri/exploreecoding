@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-2 mb-2">
        <div class="content-backend">
          <div class="content-backend-title">
            {{ $title }}
          </div>
        </div>
      </section>

      <section class="w-full px-3 mt-8 mb-5">
        <div class="breadcrumb">
          @include('backend.xbreadcrumb.permission.index')
        </div>

        <div class="x-border">
          <div class="flex flex-col items-center text-center">
            <x-md-header
              :image="asset('/image/default.png')"
              alt="image"
              :title="$role->name"
              :description="$role->description"
            />
          </div>

          <div class="w-full mt-12">
            <div class="flex justify-center gap-2 px-4 py-2 mx-auto border-gray-200 sm:border-b min-w-max whitespace-nowrap">
              @include('backend.manageaccess.permission._navigation')
            </div>

            <div class="flex justify-around">
              <div class="grid grid-cols-1 gap-16 mt-12 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($groupper as $controller => $permissions)
                  <div>
                    <fieldset>
                      <div class="w-auto p-4 border border-gray-300 shadow-2xs rounded-3xl bg-slate-50">
                        <legend class="mb-2 ml-2 text-base font-normal tracking-wide text-yellow-500">
                          {{ $controller }} Controller
                        </legend>

                        @foreach ($permissions as $permission)
                          <div class="flex items-center px-1 ml-1">
                            <div>
                              <div class="flex items-center">
                                <!-- Menggunakan properti objek biasa $permission->id lebih disarankan daripada mode array -->
                                <input type="checkbox"
                                  data-role="{{ $role->id }}"
                                  data-permission="{{ $permission->id }}"
                                  data-slug="{{ $role->slug }}"
                                  {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                  class="ml-1 w-4 h-4 text-blue-500 rounded-[5px] cursor-pointer access-checkbox outline-offset-1 outline-1 outline-blue-500"
                                />
                              </div>
                            </div>

                            <div class="flex items-center text-[15px] text-gray-600 whitespace-nowrap p-2 py-1.5 tracking-wide">
                              <div class="flex items-center gap-1">
                                <div class="text-xs text-black">
                                  {{ $permission->id }}
                                </div>
                                <div>-</div>
                                <div>
                                  {{ $permission->name }}
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </fieldset>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Inisialisasi template Toast SweetAlert2 agar terlihat profesional
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
      });

      document.querySelectorAll(".access-checkbox").forEach((checkbox) => {
        checkbox.addEventListener("change", async function () {
          const checkboxElement = this;
          const roleId = checkboxElement.getAttribute("data-role");
          const permissionId = checkboxElement.getAttribute("data-permission");
          const roleSlug = checkboxElement.getAttribute("data-slug");

          // Kunci checkbox sementara untuk menghindari double-click (spam) saat proses request berjalan
          checkboxElement.disabled = true;

          try {
            const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
            if (!csrfTokenElement) {
              throw new Error("Meta tag CSRF token tidak ditemukan!");
            }

            const response = await fetch("{{ route('access.up.permission') }}", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfTokenElement.content,
              },
              body: JSON.stringify({
                role_id: roleId,
                permission_id: permissionId,
                role_slug: roleSlug,
              }),
            });

            if (!response.ok) {
              throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const result = await response.json();

            if (result.success) {
              Toast.fire({
                icon: 'success',
                title: result.message
              });
              // Catatan: window.location.href DIAPUS agar tidak perlu kedip/refresh halaman.
              // Status centang sudah otomatis terjaga di layar.
            } else {
              throw new Error(result.message);
            }
          } catch (error) {
            console.error("Error detail:", error);

            // Kembalikan posisi centang ke semula jika request gagal di server
            checkboxElement.checked = !checkboxElement.checked;

            Toast.fire({
              icon: 'error',
              title: 'Gagal memperbarui hak akses.'
            });
          } finally {
            // Buka kembali kunci checkbox setelah proses selesai
            checkboxElement.disabled = false;
          }
        });
      });
    });
  </script>
@endsection
