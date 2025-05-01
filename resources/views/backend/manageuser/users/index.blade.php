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

      <section class="w-full px-4 mt-8 mb-5">
        <div class="p-4 overflow-x-auto bg-blue-200 rounded-lg shadow">
          <table class="min-w-full text-sm text-left text-gray-700 border-separate border-spacing-y-2">
            <thead class="text-xs uppercase bg-gray-50">
              <tr>
                <th class="px-6 py-3">Id</th>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Address</th>
                <th class="px-6 py-3">Date</th>
                <th class="px-6 py-3">Price</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white shadow rounded-2xl">
                <td class="px-6 py-4 font-medium rounded-l-2xl">#2632</td>
                <td class="flex items-center gap-2 px-6 py-4">
                  <img src="https://randomuser.me/api/portraits/women/1.jpg" alt="avatar" class="w-8 h-8 rounded-full" />
                  Brooklyn Zoe
                </td>
                <td class="px-6 py-4">302 Snider Street, RUTLAND, VT, 05701</td>
                <td class="px-6 py-4">31 Jul 2020</td>
                <td class="px-6 py-4">$64.00</td>
                <td class="px-6 py-4">
                  <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-red-100 text-red-600 text-xs font-semibold">
                    <span class="inline-block w-2 h-2 bg-red-500 rounded-full"></span>
                    Pending
                  </span>
                </td>
                <td class="px-6 py-4 rounded-r-2xl">
                  <button class="p-2 rounded hover:bg-gray-100">⚙️</button>
                </td>
              </tr>
              <!-- Baris lain -->
            </tbody>
          </table>
        </div>




      </section>
    </div>
  </div>
@endSection
