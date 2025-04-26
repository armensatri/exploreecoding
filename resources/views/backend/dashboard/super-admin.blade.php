<h1>{{ Auth::user()->name }}</h1>

<form action="{{ route('auth.logout') }}"
          method="POST"
          class="flex justify-center">
          @csrf

          <button type="submit"
            class="px-3 py-1 mt-4 mb-6 bg-red-600 shadow-sm hover:bg-red-700 rounded-xl">
            <div class="inline-flex items-center justify-center">
              <i class="text-white bi bi-arrow-right-circle"></i>
              <span class="ml-1 text-base tracking-wider text-white">
                Logout
              </span>
            </div>
          </button>
        </form>
