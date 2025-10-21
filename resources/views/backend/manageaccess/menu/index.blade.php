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
          @include('backend.sbreadcrumb.menu.index')
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

          <div class="w-full mt-12 overflow-x-auto">
            <div class="flex justify-center gap-2 px-4 py-2 mx-auto border-gray-200 sm:border-b min-w-max whitespace-nowrap">
            </div>

            <section class="w-full px-3 mt-12 mb-5 xl:flex xl:justify-center">
              <div class="max-w-[85rem] mx-auto">
                <div class="flex flex-col">
                  <div class="-m-1.5 overflow-x-auto min-w-full">
                    <div class="p-1.5 inline-block xl:max-w-full">

                      <div class="overflow-hidden table-border">
                        <div class="grid table-grid">
                          <div class="description">
                            <x-description
                              table-name="menus"
                              :page-data="$menus"
                            />
                          </div>

                          <div class="table-header">
                            <div class="inline-flex items-center gap-x-2">
                              <div class="indexs">
                                <x-indexs
                                  :route="route('access')"
                                  button-name="to access"
                                />
                              </div>
                            </div>
                          </div>
                        </div>

                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-200">
                            <tr>
                              <x-th
                                name="no"
                              />
                              <x-th
                                name="id"
                              />
                              <x-th
                                name="sm"
                              />
                              <x-th
                                name="name"
                              />
                              <x-th
                                name="url"
                              />
                              <x-th-action/>
                            </tr>
                          </thead>

                          <tbody class="tbody">
                            @foreach ($menus as $menu)
                              <tr>
                                <td class="h-px whitespace-nowrap">
                                  <x-td-var-center
                                    :var="$loop->iteration . '.'"
                                  />
                                </td>

                                <td class="h-px whitespace-nowrap">
                                  <x-td-var-center
                                    :var="$menu->id"
                                  />
                                </td>

                                <td class="h-px whitespace-nowrap">
                                  <x-td-var-center
                                    :var="$menu->sm"
                                  />
                                </td>

                                <td class="h-px whitespace-nowrap">
                                  <x-td-var
                                    :var="$menu->name"
                                  />
                                </td>

                                <td class="h-px whitespace-nowrap">
                                  <x-td-var
                                    :var="$menu->url"
                                  />
                                </td>

                                <td class="size-px whitespace-nowrap">
                                  @include(
                                    'backend.manageaccess.menu.input-checkbox'
                                  )
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>

                        <div class="grid table-pagination">
                          @if ($menus->lastPage() > 1)
                            <x-pagination
                              :pagination="$menus"
                            />
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
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
          const menuId = this.getAttribute("data-menu");
          const roleUrl = this.getAttribute("data-url");
          const isChecked = this.checked ? 1 : 0;

          try {
            const response = await fetch("{{ route('access.up.menu') }}", {
              method: "POST",

              headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                  'meta[name="csrf-token"]'
                ).content,
              },

              body: JSON.stringify({
                role_id: roleId,
                menu_id: menuId,
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
                "{{ route('access.menu', [':url']) }}"
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
