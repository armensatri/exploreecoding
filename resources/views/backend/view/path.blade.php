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
        <div class="breadcrumb">
          @include('backend.xbreadcrumb.view.path')
        </div>

        <div class="x-border">
          <div class="flex flex-col items-center text-center">
            <x-md-header
              :image="asset('/image/default.png')"
              alt="image"
              title="Data view"
              description="Monitoring data view path content"
            />
          </div>

          <div class="w-full mt-12 overflow-x-auto">
            <div class="flex justify-center gap-2 px-4 py-2 mx-auto border-gray-200 sm:border-b min-w-max whitespace-nowrap">
              @include('backend.view._navigation')
            </div>
          </div>

          <div class="w-full">
            <div class="mt-16">
              <div class="content">
                <section class="flex w-full px-3 mt-8 mb-5 overflow-x-auto overflow-y-hidden">
                  <div class="mx-auto max-w-340">
                    <div class="flex flex-col">
                      <div class="-m-1.5 overflow-x-auto min-w-full">
                        <div class="p-1.5 inline-block xl:max-w-full">

                          <div class="overflow-hidden table-border">
                            <div class="grid table-grid">
                              <div class="description">
                                <x-description
                                  table-name="View path"
                                  :page-data="$paths"
                                />
                              </div>

                              <div class="table-header">
                                <div class="inline-flex items-center gap-x-2">
                                  <div class="refresh">
                                    <x-refresh
                                      :route="route('view.path')"
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
                                    name="sp"
                                  />
                                  <x-th
                                    name="name"
                                  />
                                  <x-th
                                    name="view"
                                  />
                                </tr>
                              </thead>

                              <tbody class="tbody">
                                @foreach ($paths as $path)
                                  <tr>
                                    <td class="h-px whitespace-nowrap">
                                      <x-td-var-center
                                        :var="$loop->iteration . '.'"
                                      />
                                    </td>

                                    <td class="h-px whitespace-nowrap">
                                      <x-td-var-center
                                        :var="$path->id"
                                      />
                                    </td>

                                    <td class="h-px whitespace-nowrap">
                                      <x-td-var-center
                                        :var="$path->sp"
                                      />
                                    </td>

                                    <td class="h-px whitespace-nowrap">
                                      <x-td-var
                                        :var="$path->name"
                                      />
                                    </td>

                                    <td class="h-px whitespace-nowrap">
                                      <x-td-var-center
                                        :var="$path->pathviews_count"
                                      />
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>

                            <div class="grid table-pagination">
                              @if ($paths->lastPage() > 1)
                                <x-pagination
                                  :pagination="$paths"
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
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
