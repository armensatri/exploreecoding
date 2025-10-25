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
                  @include('backend.sbreadcrumb.paths.index')
                </div>

                <div class="overflow-hidden table-border">
                  <div class="grid table-grid">
                    <div class="description">
                      <x-description
                        table-name="Paths"
                        :page-data="$paths"
                      />
                    </div>

                    <div class="table-header">
                      <div class="inline-flex items-center gap-x-2">
                        <div class="refresh">
                          <x-refresh
                            :route="route('paths.index')"
                          />
                        </div>

                        <div class="search">
                          <form action="/paths">
                            <x-search
                              search="paths"
                              placeholder="Search data paths"
                            />
                          </form>
                        </div>

                        <div class="button-create">
                          <x-button-create
                            :route="route('paths.create')"
                            button-name="path"
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
                          name="image"
                        />
                        <x-th
                          name="name"
                        />
                        <x-th
                          name="status"
                        />
                        <x-th
                          name="url"
                        />
                        <x-th-action/>
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

                          <td class="size-px whitespace-nowrap">
                            <x-td-image-hover
                              :asset="$path->image"
                              asset-default="/image/default.png"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$path->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var-bg
                              :bg="$path->status->bg"
                              :text="$path->status->text"
                              :var="$path->status->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$path->url"
                            />
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <x-td-action
                              :id="$path->id"

                              :show="route(
                                'paths.show', $path->url
                              )"

                              :edit="route(
                                'paths.edit', $path->url
                              )"

                              :delete="route(
                                'paths.destroy', $path->url
                              )"
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
@endsection
