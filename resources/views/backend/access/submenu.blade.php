@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-4 mb-2">
        <div class="app-content">
          <div class="app-content-title">
            {{ $title }}
          </div>
        </div>
      </section>

      @if (session()->has('alert'))
        @include('sweetalert::alert')
      @endif

      <section class="w-full px-4 mt-8 mb-5">
        <div class="max-w-[85rem] mx-auto">
          <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto min-w-full">
              <div class="p-1.5 inline-block xl:max-w-full align-middle leading-none">
                <div class="overflow-hidden app-table-border">
                  <div class="grid app-table-grid">
                    <x-description
                      table-name="access submenu"
                      :page-data="$submenus"
                    />

                    <div class="indexs">
                      <x-indexs
                        :route="route('roles.index')"
                        name="back to roles"
                      />
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
                          name="ssm"
                        />
                        <x-th
                          name="submenu"
                        />
                        <x-th-action/>
                      </tr>
                    </thead>

                    <tbody class="tbody">
                      @foreach ($submenus as $submenu)
                        <tr>
                          <td class="h-px whitespace-nowrap">
                            <div class="my-1.5 center">
                              <x-td-var
                                :var="$loop->iteration . '.'"
                              />
                            </div>
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$submenu->id"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <div class="center">
                              <x-td-var
                                :var="$submenu->ssm"
                              />
                            </div>
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$submenu->name"
                            />
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <div class="center">
                              <input type="checkbox"
                                data-role="{{ $role->id }}"
                                data-submenu="{{ $submenu->id }}"
                                data-role-name="{{ $role->name ?? '' }}"
                                {{ in_array($submenu->id, $role->submenus->pluck('id')->toArray()) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 rounded-md cursor-pointer access-checkbox"
                              />
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="grid app-table-footer">
                    @if ($submenus->lastPage() > 1)
                      <x-pagination
                        :pagination="$submenus"
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

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".access-checkbox").forEach((checkbox) => {
        checkbox.addEventListener("change", async function () {

          const roleId = this.getAttribute("data-role");
          const roleName = this.getAttribute("data-role-name");
          const submenuId = this.getAttribute("data-submenu");
          const isChecked = this.checked ? 1 : 0;

          try {
            const response = await fetch("{{ route('ca.submenu') }}", {
              method: "POST",

              headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                  'meta[name="csrf-token"]'
                ).content,
              },

              body: JSON.stringify({
                role_id: roleId,
                submenu_id: submenuId,
                is_checked: isChecked,
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
                  "{{ route('a.submenu', [':id', ':name']) }}"
                  .replace(":id", roleId)
                  .replace(":name", encodeURIComponent(roleName));
              });

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
