@extends('backend.template.main')

@section('content-backend')
  <div class="content">
    <div class="p-4 mx-auto">
      <section class="w-full px-4 mb-2">
        <div class="app-content">
          <div class="app-content-title">
            {{ $title }}
          </div>
        </div>
      </section>

      @if (session()->has('alert'))
        @include('sweetalert::alert')
      @endif

      <section class="w-full px-4 mt-8 mb-5">
        <div class="max-w-[85rem] mx-auto">
          <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto min-w-full">
              <div class="p-1.5 inline-block xl:max-w-full align-middle leading-none">
                <div class="overflow-hidden app-table-border">
                  <div class="grid app-table-grid">
                    <x-description
                      table-name="Roadmaps"
                      :page-data="$roadmaps"
                    />

                    <div class="table-header">
                      <div class="inline-flex items-center gap-x-2">
                        <div class="refresh">
                          <x-refresh
                            :route="route('roadmaps.index')"
                          />
                        </div>

                        <div class="search">
                          <form action="/roadmaps">
                            <x-search
                              search="roadmaps"
                              placeholder="Search data roadmaps"
                            />
                          </form>
                        </div>

                        <div class="backup">
                          <x-backup
                            table-name="roadmaps"
                          />
                        </div>

                        <div class="draft">
                          <x-draft
                            :route="route('roadmaps.draft')"
                          />
                        </div>

                        <div class="button-create">
                          <x-button-create
                            :route="route('roadmaps.create')"
                            button-name="roadmap"
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
                          name="path"
                        />
                        <x-th
                          name="sr"
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
                      @foreach ($roadmaps as $roadmap)
                        <tr>
                          <td class="h-px whitespace-nowrap">
                            <div class="center">
                              <x-td-var
                                :var="$loop->iteration . '.'"
                              />
                            </div>
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <div class="center">
                              <x-td-var
                                :var="$roadmap->id"
                              />
                            </div>
                          </td>

                          <td class="w-48 h-px min-w-48">
                            <x-td-var-width
                              :var="$roadmap->path->name"
                              :tooltip="$roadmap->path->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <div class="center">
                              <x-td-var
                                :var="$roadmap->sr"
                              />
                            </div>
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <div class="center">
                              <x-td-image
                                :asset="$roadmap->image"
                                asset-default="/image/default.png"
                              />
                            </div>
                          </td>

                          <td class="w-48 h-px min-w-48">
                            <x-td-var-width
                              :var="$roadmap->name"
                              :tooltip="$roadmap->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var-bg
                              :bg="$roadmap->status->bg"
                              :text="$roadmap->status->text"
                              :var="$roadmap->status->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$roadmap->url"
                            />
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <x-td-action
                              :id="$roadmap->id"

                              :show="route(
                                'roadmaps.show', $roadmap->url
                              )"

                              :edit="route(
                                'roadmaps.edit', $roadmap->url
                                )"

                              :delete="route(
                                'roadmaps.destroy', $roadmap->url
                              )"
                            />
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="grid app-table-footer">
                    @if ($roadmaps->lastPage() > 1)
                      <x-pagination
                        :pagination="$roadmaps"
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
@endSection
