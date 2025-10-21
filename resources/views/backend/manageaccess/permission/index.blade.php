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
          @include('backend.sbreadcrumb.permission.index')
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
              <div class="grid max-h-[350] mt-12 grid-cols-1 gap-16 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($groupper as $controller => $permissions)
                  <div class="boder">
                    <fieldset>
                      <div class="border border-gray-300 shadow-2xs p-4 rounded-3xl w-auto bg-slate-50">
                        <legend class="mb-2 ml-2 text-base font-normal tracking-wide text-yellow-500">
                          {{ ucfirst($controller) }}Controller
                        </legend>

                        @foreach ($permissions as $permission)
                          <div class="flex items-center px-1 ml-1">
                            <div>
                              <div class="flex items-center">
                                <input type="checkbox"
                                  data-role="{{ $role->id }}"
                                  data-permission="{{ $permission->id }}"
                                  data-url="{{ $role->url }}"
                                  {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}
                                  class="ml-1 w-4 h-4 text-blue-500 rounded-[5px] cursor-pointer access-checkbox outline-offset-1 outline-1 outline-blue-500"
                                />
                              </div>
                            </div>

                            <div class="flex items-center text-[15px] text-gray-600 whitespace-nowrap p-2 py-1.5 tracking-wide">
                              <div class="flex gap-1 items-center">
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
      document.querySelectorAll(".access-checkbox").forEach((checkbox) => {
        checkbox.addEventListener("change", async function () {

          const roleId = this.getAttribute("data-role");
          const permissionId = this.getAttribute("data-permission");
          const roleUrl = this.getAttribute("data-url");
          const isChecked = this.checked ? 1 : 0;

          try {
            const response = await fetch(
              "{{ route('access.up.permission') }}", {
              method: "POST",

              headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                  'meta[name="csrf-token"]'
                ).content,
              },

              body: JSON.stringify({
                role_id: roleId,
                permission_id: permissionId,
                role_url: roleUrl,
                is_checked: isChecked
              }),
            });

            if (!response.ok) {
              throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const result = await response.json();

            if (result.success) {
              Swal.fire({
                title: "success",
                text: result.message,
                icon: "success",
              }).then(() => {
                window.location.href =
                "{{ route('access.permission', [':url']) }}"
                .replace(":url", roleUrl)
              })
            } else {
              throw new Error(result.message);
            }
          } catch (error) {
            console.error("error:", error);
            Swal.fire("error", "Something went wrong!", "error");
            this.checked = !this.checked;
          }
        });
      });
    });
  </script>
@endsection
