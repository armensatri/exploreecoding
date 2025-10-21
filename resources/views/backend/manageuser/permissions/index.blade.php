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

      <div class="alert">
        @if (session()->has('alert'))
          @include('sweetalert::alert')
        @endif
      </div>

      <section class="w-full px-3 mt-8 mb-5">
        <div class="max-w-[85rem] mx-auto">
          <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto min-w-full">
              <div class="p-1.5 inline-block xl:max-w-full">
                <div class="breadcrumb">
                  @include('backend.sbreadcrumb.permissions.index')
                </div>

                <div class="overflow-hidden table-border">
                  <div class="grid table-grid">
                    <div class="description">
                      <x-description
                        table-name="Permissions"
                        :page-data="$permissions"
                      />
                    </div>

                    <div class="table-header">
                      <div class="inline-flex items-center gap-x-2">
                        <div class="refresh">
                          <x-refresh
                            :route="route('permissions.index')"
                          />
                        </div>

                        <div class="search">
                          <form action="/permissions">
                            <x-search
                              search="permissions"
                              placeholder="Search data permissions"
                            />
                          </form>
                        </div>

                        <div class="button-create">
                          <x-button-create
                            :route="route('permissions.create')"
                            button-name="permission"
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
                          name="name"
                        />
                        <x-th
                          name="guard"
                        />
                        <x-th
                          name="url"
                        />
                        <x-th-action/>
                      </tr>
                    </thead>

                    <tbody class="tbody">
                      @foreach ($permissions as $permission)
                        <tr>
                          <td class="h-px whitespace-nowrap">
                            <x-td-var-center
                              :var="$loop->iteration . '.'"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var-center
                              :var="$permission->id"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$permission->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var-center
                              :var="$permission->guard_name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$permission->url"
                            />
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <x-td-action
                              :id="$permission->id"

                              :show="route(
                                'permissions.show', $permission->url
                              )"

                              :edit="route(
                                'permissions.edit', $permission->url
                              )"

                              :delete="route(
                                'permissions.destroy', $permission->url
                              )"
                            />
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="grid table-pagination">
                    @if ($permissions->lastPage() > 1)
                      <x-pagination
                        :pagination="$permissions"
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
@endsection
