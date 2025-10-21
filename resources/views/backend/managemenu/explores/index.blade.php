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
                  @include('backend.sbreadcrumb.explores.index')
                </div>

                <div class="overflow-hidden table-border">
                  <div class="grid table-grid">
                    <div class="description">
                      <x-description
                        table-name="Explores"
                        :page-data="$explores"
                      />
                    </div>

                    <div class="table-header">
                      <div class="inline-flex items-center gap-x-2">
                        <div class="refresh">
                          <x-refresh
                            :route="route('explores.index')"
                          />
                        </div>

                        <div class="search">
                          <form action="/explores">
                            <x-search
                              search="explores"
                              placeholder="Search data explores"
                            />
                          </form>
                        </div>

                        <div class="button-create">
                          <x-button-create
                            :route="route('explores.create')"
                            button-name="explore"
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
                          name="se"
                        />
                        <x-th
                          name="name"
                        />
                        <x-th
                          name="route"
                        />
                        <x-th
                          name="button"
                        />
                        <x-th
                          name="url"
                        />
                        <x-th-action/>
                      </tr>
                    </thead>

                    <tbody class="tbody">
                      @foreach ($explores as $explore)
                        <tr>
                          <td class="h-px whitespace-nowrap">
                            <x-td-var-center
                              :var="$loop->iteration . '.'"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var-center
                              :var="$explore->id"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var-center
                              :var="$explore->se"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$explore->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$explore->routee"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$explore->button_name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$explore->url"
                            />
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <x-td-action
                              :id="$explore->id"

                              :show="route(
                                'explores.show', $explore->url
                              )"

                              :edit="route(
                                'explores.edit', $explore->url
                              )"

                              :delete="route(
                                'explores.destroy', $explore->url
                              )"
                            />
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="grid table-pagination">
                    @if ($explores->lastPage() > 1)
                      <x-pagination
                        :pagination="$explores"
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
