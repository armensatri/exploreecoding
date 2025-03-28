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
                      table-name="Playlists"
                      :page-data="$playlists"
                    />

                    <div class="table-header">
                      <div class="inline-flex items-center gap-x-2">
                        <div class="refresh">
                          <x-refresh
                            :route="route('playlists.index')"
                          />
                        </div>

                        <div class="search">
                          <form action="/playlists">
                            <x-search
                              search="playlists"
                              placeholder="Search data playlists"
                            />
                          </form>
                        </div>

                        <div class="backup">
                          <x-backup
                            table-name="playlists"
                          />
                        </div>

                        <div class="draft">
                          <x-draft
                            :route="route('playlists.draft')"
                          />
                        </div>

                        <div class="button-create">
                          <x-button-create
                            :route="route('playlists.create')"
                            button-name="playlist"
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
                          name="roadmap"
                        />
                        <x-th
                          name="spl"
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
                      @foreach ($playlists as $playlist)
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
                                :var="$playlist->id"
                              />
                            </div>
                          </td>

                          <td class="w-48 h-px min-w-48">
                            <x-td-var-width
                              :var="$playlist->roadmap->name"
                              :tooltip="$playlist->roadmap->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <div class="center">
                              <x-td-var
                                :var="$playlist->spl"
                              />
                            </div>
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <div class="center">
                              <x-td-image
                                :asset="$playlist->image"
                                asset-default="/image/default.png"
                              />
                            </div>
                          </td>

                          <td class="w-48 h-px min-w-48">
                            <x-td-var-width
                              :var="$playlist->name"
                              :tooltip="$playlist->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var-bg
                              :bg="$playlist->status->bg"
                              :text="$playlist->status->text"
                              :var="$playlist->status->name"
                            />
                          </td>

                          <td class="h-px whitespace-nowrap">
                            <x-td-var
                              :var="$playlist->url"
                            />
                          </td>

                          <td class="size-px whitespace-nowrap">
                            <x-td-action
                              :id="$playlist->id"

                              :show="route(
                                'playlists.show', $playlist->url
                              )"

                              :edit="route(
                                'playlists.edit', $playlist->url
                                )"

                              :delete="route(
                                'playlists.destroy', $playlist->url
                              )"
                            />
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <div class="grid app-table-footer">
                    @if ($playlists->lastPage() > 1)
                      <x-pagination
                        :pagination="$playlists"
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
