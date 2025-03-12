<header class="bg-white" x-data="{ open: false }">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
        </a>
      </div>
      <div class="flex lg:hidden">
        <button @click="open = true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
          <span class="sr-only">Open main menu</span>
          <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <a href="{{ route('jobs.index') }}" class="text-sm/6 font-semibold text-gray-900">Jobs</a>
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end space-x-3">
        @if(auth()->check())
        <div>
            <a href="{{ route('my-job-applications.index') }}" class="text-sm/6 font-semibold text-gray-900">My Applications</a>
        </div>
        <form method="POST" action="{{ route('auth.destroy') }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-sm/6 font-semibold text-gray-900">
                Log out
            </button>
        </form>
        @else
        <a href="{{ route('auth.create') }}" class="text-sm/6 font-semibold text-gray-900">Sign in</a>
        @endif
        <div class="text-sm/6 font-semibold text-gray-900">
            {{ auth()->user()->name ??  'Guest' }}
        </div>
      </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" role="dialog" aria-modal="true" x-show="open" x-transition @click.away="open = false">
      <!-- Background backdrop, show/hide based on slide-over state. -->
      <div class="fixed inset-0 z-10" @click="open = false"></div>
      <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-500/10">
        <div class="flex items-center justify-between">
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
          </a>
          <button @click="open = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Close menu</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
              <a href="{{ route('jobs.index') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Jobs</a>
            </div>
            <div class="py-6">
                @if(auth()->check())
                <div>
                    <a href="{{ route('my-job-applications.index')  }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">My Applications</a>
                </div>
                <form method="POST" action="{{ route('auth.destroy') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="-mx-3 block w-full text-left rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">
                        Log out
                    </button>
                </form>
                @else
                <a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log in</a>
                @endif
                <div class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">
                    {{ auth()->user()->name ??  'Guest' }}
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
</header>
