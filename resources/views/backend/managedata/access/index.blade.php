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
          @include('backend.sbreadcrumb.access.index')
        </div>

        <div class="x-border">
          <div class="flex flex-col items-center text-center">
            <x-md-header
              :image="asset('/image/default.png')"
              alt="image"
              title="Data access"
              description="Monitoring data role access"
            />
          </div>

          <div class="w-full mt-12 overflow-x-auto">
            <div class="flex justify-center gap-2 px-4 py-2 mx-auto border-gray-200 sm:border-b min-w-max whitespace-nowrap">
            </div>

            <section class="w-full px-3 mt-12 mb-5 xl:flex xl:justify-center">
              <div class="mx-auto max-w-340">
                <div class="flex flex-col">
                  <div class="-m-1.5 overflow-x-auto min-w-full">
                    <div class="p-1.5 inline-block xl:max-w-full">

                      <div class="overflow-hidden table-border">
                        <div class="grid table-grid">
                          <div class="description">
                            <x-description
                              table-name="Access"
                              :page-data="$roles"
                            />
                          </div>

                          <div class="table-header">
                            <div class="inline-flex items-center gap-x-2">
                              <div class="refresh">
                                <x-refresh
                                  :route="route('access')"
                                />
                              </div>

                              <div class="search">
                                <form action="/access">
                                  <x-search
                                    search="role access"
                                    placeholder="Search data role access"
                                  />
                                </form>
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
                                name="sr"
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
                            @foreach ($roles as $role)
                              <tr>
                                <td class="h-px whitespace-nowrap">
                                  <x-td-var-center
                                    :var="$loop->iteration . '.'"
                                  />
                                </td>

                                <td class="h-px whitespace-nowrap">
                                  <x-td-var-center
                                    :var="$role->id"
                                  />
                                </td>

                                <td class="h-px whitespace-nowrap">
                                  <x-td-var-center
                                    :var="$role->sr"
                                  />
                                </td>

                                <td class="h-px whitespace-nowrap">
                                  <x-td-var-bg
                                    :bg="$role->bg"
                                    :text="$role->text"
                                    :var="$role->name"
                                  />
                                </td>

                                <td class="h-px whitespace-nowrap">
                                  <x-td-var
                                    :var="$role->url"
                                  />
                                </td>

                                <td class="size-px whitespace-nowrap">
                                  @include(
                                    'backend.managedata.access._td_access'
                                  )
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>

                        <div class="grid table-pagination">
                          @if ($roles->lastPage() > 1)
                            <x-pagination
                              :pagination="$roles"
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
@endsection
