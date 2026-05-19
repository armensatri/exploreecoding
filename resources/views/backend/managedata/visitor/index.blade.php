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
          @include('backend.xbreadcrumb.visitor.index')
        </div>

        <div class="x-border">
          <div class="flex flex-col items-center text-center">
            <x-md-header
              :image="asset('/image/default.png')"
              alt="image"
              title="Data visitor"
              description="Monitoring data user visitor"
            />
          </div>

          <div class="w-full mt-12 overflow-x-auto">
            <div class="flex justify-center gap-2 px-4 py-2 mx-auto border-gray-200 sm:border-b min-w-max whitespace-nowrap">
              @include('backend.managedata.visitor._navigation')
            </div>

            <div class="mt-20 ml-4">
              <div class="flex items-center justify-center gap-x-4">
                <div class="pl-2 pr-1 py-1 text-sm text-green-900 bg-green-200 font-serif rounded-[10px] border border-green-300 tracking-wide">
                  User online
                  <span class="px-2 py-0.75 text-xs text-black bg-white rounded-[7px] font-sans border border-blue-800">
                    {{
                      $users->where('status_on_of', 1)->count()
                    }}
                  </span>
                </div>

                <div class="pl-2 pr-1 py-1 text-sm text-red-900 bg-red-200 font-serif rounded-[10px] border border-red-300 tracking-wide">
                  User offline
                  <span class="px-2 py-0.75 text-xs text-black bg-white rounded-[7px] font-sans border border-blue-800">
                    {{
                      $users->where('status_on_of', 0)->count()
                    }}
                  </span>
                </div>

                <div class="pl-2 pr-1 py-1 text-sm text-blue-900 bg-blue-200 font-serif rounded-[10px] border border-blue-300 tracking-wide">
                  User total
                  <span class="px-2 py-0.75 text-xs text-black bg-white rounded-[7px] font-sans border border-blue-800">
                    {{
                      $users->count()
                    }}
                  </span>
                </div>
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

                                    <div class="search">
                                      <form action="/visitor">
                                        <x-search
                                          search="visitor"
                                          placeholder="Search data visitor"
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
                                      name="username"
                                    />
                                    <x-th
                                      name="role"
                                    />
                                    <x-th
                                      name="auth"
                                    />
                                    <x-th
                                      name="status"
                                    />
                                    <x-th
                                      name="verify"
                                    />
                                    <x-th
                                      name="lastseen"
                                    />
                                    <x-th-action/>
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
                                          :var="'@' . $user->username"
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
                                        <div class="flex items-center justify-center">
                                          <x-td-var-bg
                                            :bg="$user->statusOnOf()['bg']"
                                            :text="$user->statusOnOf()['text']"
                                            :var="$user->statusOnOf()['statusOnOf']"
                                          />
                                        </div>
                                      </td>

                                      <td class="h-px whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                          <x-td-var-bg
                                            :bg="$user->status()['bg']"
                                            :text="$user->status()['text']"
                                            :var="$user->status()['status']"
                                          />
                                        </div>
                                      </td>

                                      <td class="h-px whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                          <x-td-var-bg
                                            bg="bg-red-200"
                                            text="text-red-800"
                                            var="no verify"
                                          />
                                        </div>
                                      </td>

                                      <td class="h-px whitespace-nowrap">
                                        <x-td-var
                                          :var="\Carbon\Carbon::parse($user->last_seen)->diffForHumans()"
                                        />
                                      </td>

                                      @include(
                                        'backend.managedata.visitor._ban'
                                      )

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
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
