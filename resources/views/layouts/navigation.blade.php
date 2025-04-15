<nav x-data="{ open: false }" class="bg-gradient-to-r from-indigo-700 to-blue-700 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center space-x-3">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <img src="https://i.pinimg.com/736x/c6/38/44/c63844abe5ebb683ef75fd21af69b2ec.jpg" alt="Logo" class="h-8 w-8 rounded-full object-cover border-2 border-white shadow">
                    <span class="text-lg font-semibold text-white tracking-tight hidden sm:inline">Pengaduan</span>
                </a>
            </div>
            <div class="hidden sm:flex space-x-6">
                @auth
                    @if (Auth::user()->role === 'user')
                        <x-nav-link :href="route('dashboard.user')" :active="request()->routeIs('dashboard.user')" class="text-white hover:text-indigo-100">
                            Dashboard
                        </x-nav-link>
                    @elseif (Auth::user()->role === 'staff')
                        <x-nav-link :href="route('dashboard.staff')" :active="request()->routeIs('dashboard.staff')" class="text-white hover:text-indigo-100">
                            Dashboard
                        </x-nav-link>
                    @elseif (Auth::user()->role === 'head_staff')
                        <x-nav-link :href="route('dashboard.head')" :active="request()->routeIs('dashboard.head')" class="text-white hover:text-indigo-100">
                            Dashboard
                        </x-nav-link>
                        <x-nav-link :href="route('headstaff.staff.index')" :active="request()->routeIs('headstaff.staff.*')" class="text-white hover:text-indigo-100">
                            Kelola Staff
                        </x-nav-link>
                    @endif
                @else
                    <x-nav-link :href="route('dashboard.guest.reports.index')" :active="request()->routeIs('dashboard.guest.reports.index')" class="text-white hover:text-indigo-100">
                        Lihat Laporan
                    </x-nav-link>
                @endauth
            </div>
            <div class="hidden sm:flex items-center space-x-4">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center focus:outline-none transition duration-150 ease-in-out">
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-medium text-white">{{ Auth::user()->name }}</span>
                                    <img class="h-8 w-8 rounded-full object-cover border-2 border-white" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffffff&color=4f46e5" alt="User">
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100">
                                <div class="px-4 py-3">
                                    <p class="text-sm text-gray-900 font-medium">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                                </div>
                                <div class="py-1">
                                    <x-dropdown-link :href="route('profile.edit')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-900">
                                        <div class="flex items-center">
                                            <svg class="h-4 w-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            Profile
                                        </div>
                                    </x-dropdown-link>
                                </div>
                                <div class="py-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-900">
                                            <div class="flex items-center">
                                                <svg class="h-4 w-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                </svg>
                                                Logout
                                            </div>
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-indigo-100 text-sm">Masuk</a>
                    <a href="{{ route('register') }}" class="text-white hover:text-indigo-100 text-sm">Daftar</a>
                @endauth
            </div>
            <!-- Mobile Hamburger -->
            <div class="sm:hidden">
                <button @click="open = !open" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-indigo-800">
        <div class="pt-2 pb-3 space-y-1 px-4">
            @auth
                @if (Auth::user()->role === 'user')
                    <x-responsive-nav-link :href="route('dashboard.user')" :active="request()->routeIs('dashboard.user')" class="text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg">
                        Dashboard
                    </x-responsive-nav-link>
                @elseif (Auth::user()->role === 'staff')
                    <x-responsive-nav-link :href="route('dashboard.staff')" :active="request()->routeIs('dashboard.staff')" class="text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg">
                        Dashboard
                    </x-responsive-nav-link>
                @elseif (Auth::user()->role === 'head_staff')
                    <x-responsive-nav-link :href="route('dashboard.head')" :active="request()->routeIs('dashboard.head')" class="text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg">
                        Dashboard
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('headstaff.staff.index')" :active="request()->routeIs('headstaff.staff.*')" class="text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg">
                        Kelola Staff
                    </x-responsive-nav-link>
                @endif
            @else
                <x-responsive-nav-link :href="route('dashboard.guest.reports.index')" :active="request()->routeIs('dashboard.guest.reports.index')" class="text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg">
                    Lihat Laporan
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard.guest.reports.index')" :active="request()->routeIs('dashboard.guest.reports.index')" class="text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg">
                    Lihat Laporan
                </x-responsive-nav-link>
            @endauth
            
            @auth
                <div class="border-t border-indigo-700"></div>
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-indigo-700 rounded-lg">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </div>
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-white hover:bg-indigo-700 rounded-lg">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </div>
                    </x-responsive-nav-link>
                </form>
            @else
                <div class="border-t border-indigo-700"></div>
                <x-responsive-nav-link :href="route('login')" class="text-white hover:bg-indigo-700 rounded-lg">
                    Masuk
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" class="text-white hover:bg-indigo-700 rounded-lg">
                    Daftar
                </x-responsive-nav-link>
            @endauth
        </div>
    </div>
</nav>