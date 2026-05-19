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
          @include('backend.sbreadcrumb.visitor.banned')
        </div>

        <div class="x-border">
          <div class="flex flex-col items-center text-center">
            <x-md-header
              :image="asset('/image/default.png')"
              alt="image"
              title="Visitor banned"
              description="Monitoring data user visitor"
            />
          </div>

          <div class="w-full mt-12 overflow-x-auto">
            <div class="flex justify-center gap-2 px-4 py-2 mx-auto border-gray-200 sm:border-b min-w-max whitespace-nowrap">
              @include('backend.managedata.visitor._navigation')
            </div>

            <div class="w-full">
              <div class="mt-16">
                <div class="content">
                  <section class="w-full px-3 mt-8 mb-5 xl:flex xl:justify-center">
                    <div class="mx-auto max-w-340">
                      <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto min-w-full">
                          <div class="p-1.5 inline-block xl:max-w-full">

                            <div class="overflow-hidden table-border">
                              <div class="grid table-grid">
                                <div class="description">
                                  <x-description
                                    table-name="Visitor"
                                    :page-data="$users"
                                  />
                                </div>

                                <div class="table-header">
                                  <div class="inline-flex items-center gap-x-2">
                                    <div class="refresh">
                                      <x-refresh
                                        :route="route('visitor')"
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
                                      name="username"
                                    />
                                    <x-th
                                      name="role"
                                    />
                                    <x-th
                                      name="banned"
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

                                      <td class="h-px whitespace-nowrap">
                                        <x-td-var
                                          :var="'@'. $user->username"
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
                                        <x-td-var-bg
                                          :bg="$user->status()['bg']"
                                          :text="$user->status()['text']"
                                          :var="$user->status()['status']"
                                        />
                                      </td>

                                      @include(
                                        'backend.managedata.visitor._unban'
                                      )
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
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
