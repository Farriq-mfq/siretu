<nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                    class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                    <i data-lucide="align-left" class="w-6 h-6" id="toggleSidebarMobileHamburger"></i>
                    <i data-lucide="x" class="w-6 h-6 hidden" id="toggleSidebarMobileClose"></i>
                </button>
                <a href={{ url('/') }} class="text-xl font-bold flex items-center lg:ml-2.5">
                    <span class="self-center whitespace-nowrap">
                        SIRETU
                    </span>
                </a>
            </div>
            <div class="flex items-center">
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button">
                    <i data-lucide="user"></i>
                </button>

                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <i data-lucide="log-out" class="h-4 w-4 mr-2"></i>
                                    Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</nav>
