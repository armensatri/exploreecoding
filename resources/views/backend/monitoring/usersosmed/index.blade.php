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
          @include('backend.xbreadcrumb.monitoring.users-sosmed')
        </div>

        <div class="x-border">
          <div class="flex flex-col items-center text-center">
            <x-md-header
              :image="asset('/image/default.png')"
              alt="image"
              title="Data user sosmed"
              description="Monitoring data system user sosial media"
            />
          </div>

          <div class="w-full mt-12">
            <div class="flex justify-center gap-2 px-4 py-4 mx-auto border-b border-gray-200">
              @include('backend.monitoring._navigation')
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
                                  table-name="User sosmed"
                                  :page-data="$sosmeds"
                                />
                              </div>

                              <div class="table-header">
                                <div class="inline-flex items-center gap-x-2">
                                  <div class="refresh">
                                    <x-refresh
                                      :route="route('sosmeds.index')"
                                    />
                                  </div>

                                  <div class="search">
                                    <form action="/monitoring/usersosmeds">
                                      <x-search
                                        search="sosmeds"
                                        placeholder="Search data sosmeds"
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
                                    name="image"
                                  />
                                  <x-th
                                    name="user"
                                  />
                                  <x-th
                                    name="sosmeds"
                                  />
                                </tr>
                              </thead>

                              <tbody class="tbody">
                                @foreach ($sosmeds as $sosmed)
                                  <tr>
                                    <td class="h-px whitespace-nowrap">
                                      <x-td-var-center
                                        :var="$loop->iteration . '.'"
                                      />
                                    </td>

                                    <td class="h-px whitespace-nowrap">
                                      <x-td-var
                                        :var="$sosmed->id"
                                      />
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                      <x-td-image-hover
                                        :asset="$sosmed->user->image"
                                        asset-default="/image/default.png"
                                      />
                                    </td>

                                    <td class="h-px whitespace-nowrap">
                                      <x-td-var
                                        :var="$sosmed->user->id . '@' . $sosmed->user->username"
                                      />
                                    </td>

                                    <td class="h-px whitespace-nowrap">
                                      @include(
                                        'backend.monitoring.usersosmed._index-sosmed'
                                      )
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>

                            <div class="grid table-pagination">
                              @if ($sosmeds->lastPage() > 1)
                                <x-pagination
                                  :pagination="$sosmeds"
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
