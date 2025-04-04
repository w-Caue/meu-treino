<div class="flex justify-between">

    <div x-cloak x-on:click="sidebar.full = !sidebar.full"
        class=" flex-shrink-0 transition-all duration-300 border-r-2 border-gray-300 p-4 hidden sm:block dark:bg-gray-900"
        x-bind:class="{
            'w-44': sidebar.full,
            'w-44 sm:w-20': !sidebar.full,
            'left-0': sidebar
                .navOpen,
            '-left-64 sm:left-0': !sidebar.navOpen
        }">

        <div class="flex" x-bind:class="sidebar.full ? 'justify-start' : 'justify-center'">

            <div>
                <i data-lucide="dumbbell" class="size-10 text-blue-400 bg-gray-100 p-1 rounded-2xl"></i>
            </div>

        </div>
        <div class="relative mt-4 space-y-4 text-sm uppercase font-bold text-gray-600 dark:text-gray-400">

            {{-- HOME --}}
            <a href=""
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('rica.dashboard') ? 'text-blue-500 border-l-2 border-blue-500 ' : ' hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <i data-lucide="house"></i>

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Inicio
                    </h1>
                </div>
            </a>

            <a href=""
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('rica.dashboard') ? 'text-blue-500 border-l-2 border-blue-500 ' : ' hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <i data-lucide="dumbbell"></i>

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Treino
                    </h1>
                </div>
            </a>

            <a href=""
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('rica.dashboard') ? 'text-blue-500 border-l-2 border-blue-500 ' : ' hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <i data-lucide="user-round"></i>

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Perfil
                    </h1>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Mobile -->
{{-- <div x-cloak class="flex justify-between ">

    <div class="fixed z-50 flex-shrink-0 space-y-2 mx-4 my-4 p-2 h-full rounded-lg transition-all duration-300 bg-white sm:hidden dark:bg-gray-900 dark:shadow-gray-800"
        x-bind:class="{
            'top-0 left-0 w-72': sidebar
                .navOpen,
            'top-0 -left-80': !sidebar.navOpen
        }">

        <div class="flex items-center justify-between gap-2">
            <div>
                <i data-lucide="dumbbell" class="size-10 text-blue-400 bg-gray-100 p-1 rounded-2xl"></i>
            </div>

            <button x-on:click="sidebar.navOpen = !sidebar.navOpen" class="block lg:hidden focus:outline-none">
                <!-- Close Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6" x-bind:class="sidebar.navOpen ? '' : 'hidden'">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="relative mt-4 space-y-4 text-xs uppercase font-bold">

            <a href=""
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('rica.dashboard') ? 'text-blue-500 border-l-2 border-blue-500 ' : ' hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <i data-lucide="house"></i>

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Inicio
                    </h1>
                </div>
            </a>

            <a href=""
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('rica.dashboard') ? 'text-blue-500 border-l-2 border-blue-500 ' : ' hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <i data-lucide="dumbbell"></i>

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Treino
                    </h1>
                </div>
            </a>

            <a href=""
                class="relative flex justify-between items-center space-x-2 p-2 cursor-pointer {{ request()->routeIs('rica.dashboard') ? 'text-blue-500 border-l-2 border-blue-500 ' : ' hover:text-blue-500' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <i data-lucide="user-round"></i>

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Perfil
                    </h1>
                </div>
            </a>

        </div>
    </div>
</div> --}}
