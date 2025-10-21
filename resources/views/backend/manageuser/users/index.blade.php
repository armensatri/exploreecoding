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
                  @include('backend.sbreadcrumb.users.index')
                </div>

                <div class="overflow-hidden table-border">
                  <div class="grid table-grid">
                    <div class="description">
                      <x-description
                        table-name="Users"
                        :page-data="$users"
                      />
                    </div>

                    <div class="table-header">
                      <div class="inline-flex items-center gap-x-2">
                        <div class="refresh">
                          <x-refresh
                            :route="route('users.index')"
                          />
                        </div>

                        <div class="search">
                          <form action="/users">
                            <x-search
                              search="users"
                              placeholder="Search data users"
                            />
                          </form>
                        </div>

                        <div class="button-create">
                          <x-button-create
                            :route="route('users.create')"
                            button-name="user"
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
                          name="image"
                        />
                        <x-th
                          name="name"
                        />
                        <x-th
                          name="role"
                        />
                        <x-th
                          name="email"
                        />
                        <x-th
                          name="url"
                        />
                        <x-th-action/>
                      </tr>
                    </thead>

                    <tbody class="tbody">
                      @foreach ($users as $user)
                        <tr>
                          <td class="h-px whitespace-nowrap">
                            <x-td-var-center
                              :var="$loop->iteration . '.'"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var-center
                              :var="$user->id"
                            />
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <x-td-image-hover
                              :asset="$user->image"
                              asset-default="/image/default.png"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$user->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var-bg
                              :bg="$user->role->bg"
                              :text="$user->role->text"
                              :var="$user->role->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$user->email"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$user->url"
                            />
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <x-td-action
                              :id="$user->id"

                              :show="route(
                                'users.show', $user->url
                              )"

                              :edit="route(
                                'users.edit', $user->url
                              )"

                              :delete="route(
                                'users.destroy', $user->url
                              )"
                            />
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="grid table-pagination">
                    @if ($users->lastPage() > 1)
                      <x-pagination
                        :pagination="$users"
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
