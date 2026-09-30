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
          @include('backend.xbreadcrumb.tipsreport.index')
        </div>

        <div class="x-border">
          <div class="flex flex-col items-center text-center">
            <x-md-header
              :image="asset('/image/default.png')"
              alt="image"
              title="Data comment tipsreport"
              description="Monitoring data system comment tipsreport"
            />
          </div>

          <div class="w-full mt-12 overflow-x-auto">
            <div class="flex justify-center gap-2 px-4 py-2 mx-auto border-b border-gray-200 min-w-max whitespace-nowrap">
              @include('backend.monitoring._navigation')
            </div>

            <div class="mt-20 ml-4">
              @include('backend.monitoring.tipsreport._button-count')
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
                                    table-name="Tipsreports"
                                    :page-data="$reports"
                                  />
                                </div>

                                <div class="table-header">
                                  <div
                                    class="inline-flex items-center gap-x-2">
                                    <div class="refresh">
                                      <x-refresh
                                        :route="route('monitoring.tipsreports-index')"
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
                                      name="tipscoding"
                                    />
                                    <x-th
                                      name="reporter"
                                    />
                                    <x-th
                                      name="comment"
                                    />
                                    <x-th
                                      name="reason"
                                    />
                                    <x-th
                                      name="status"
                                    />
                                    <x-th
                                      name="handle"
                                    />
                                    <x-th-action/>
                                  </tr>
                                </thead>

                                <tbody class="tbody">
                                  @forelse ($reports as $report)
                                    <tr class="hover:bg-slate-100">
                                      <td class="h-px whitespace-nowrap">
                                        <x-td-var-center
                                          :var="$loop->iteration . '.'"
                                        />
                                      </td>

                                      <td class="h-px whitespace-nowrap">
                                        <x-td-var-center
                                          :var="$report->id"
                                        />
                                      </td>

                                      <td class="h-px whitespace-nowrap">
                                        @if ($report->comment?->tipscoding)
                                          <x-td-var-width-x
                                            x-width="w-42"
                                            :var="$report->comment->tipscoding->title ?? '--'"
                                            :tooltip="$report->comment->tipscoding->title ?? '--'"
                                          />
                                        @endif
                                      </td>

                                      <td class="h-px whitespace-nowrap">
                                        @if ($report->user?->username)
                                          <x-td-var
                                            :var="'@'. $report->user->username"
                                          />
                                        @endif
                                      </td>

                                      <td class="h-px whitespace-nowrap">
                                        <x-td-var-width-x
                                          x-width="w-72"
                                          :var="$report->comment?->comment ?? '--'"
                                          :tooltip="$report->comment?->comment ?? '--'"
                                        />
                                      </td>

                                      <td class="h-px whitespace-nowrap">
                                        <x-td-var-bg
                                          bg="bg-slate-200"
                                          text="text-slate-800"
                                          :var="$report->reason ?? '--'"
                                        />
                                      </td>

                                      <td class="h-px whitespace-nowrap">
                                        @php
                                          $status = match($report->status)
                                          {
                                            'pending' => [
                                              'bg' => 'bg-amber-200',
                                              'text' => 'text-amber-800',
                                              'var' => 'pending'
                                            ],

                                            'resolved' => [
                                              'bg' => 'bg-emerald-200',
                                              'text' => 'text-emerald-800',
                                              'var' => 'resolved'
                                            ],

                                            'rejected' => [
                                              'bg' => 'bg-red-200',
                                              'text' => 'text-red-800',
                                              'var' => 'rejected'
                                            ],

                                            'default' => [
                                              'bg' => 'bg-slate-200',
                                              'text' => 'text-slate-800',
                                              'var' => $report->status ?? '--'
                                            ]
                                          }
                                        @endphp

                                        <x-td-var-bg
                                          :bg="$status['bg']"
                                          :text="$status['text']"
                                          :var="$status['var']"
                                        />
                                      </td>

                                      <td class="h-px whitespace-nowrap">
                                        @if ($report->reviewer)
                                          <x-td-var
                                            :var="'by:' . ' ' . '@' . $report->reviewer->username"
                                          />
                                        @else
                                          <div
                                            class="flex items-center px-6 py-4 gap-x-3">
                                            <span class="text-sm text-red-400">
                                              no handle
                                            </span>
                                          </div>
                                        @endif
                                      </td>

                                      @include(
                                        'backend.monitoring.tipsreport._td'
                                      )
                                    </tr>
                                  @empty
                                    <tr>
                                      <td colspan="8"
                                        class="px-4 py-12 text-center">
                                        <div
                                          class="flex items-center justify-center w-12 h-12 mx-auto rounded-full bg-slate-100 text-slate-400">
                                          <i class="text-xl bi bi-flag"></i>
                                        </div>

                                        <div
                                          class="mt-3 text-sm font-medium text-slate-600">
                                          Belum ada report komentar.
                                        </div>

                                        <div
                                          class="mt-1 text-xs text-slate-400">
                                          Report komentar akan muncul di sini.
                                        </div>
                                      </td>
                                    </tr>
                                  @endforelse
                                </tbody>
                              </table>

                              <div class="grid table-pagination">
                                @if ($reports->lastPage() > 1)
                                  <x-pagination
                                    :pagination="$reports"
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
