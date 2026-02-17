<header class="bg-white/95 backdrop-blur-md border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                <img src="{{ asset('images/icon.jpg') }}" alt="Logo" class="w-10 h-10 rounded-lg object-contain">
                <div class="leading-tight">
                    <span class="text-sm font-bold text-gray-900 block">Zalatiye Lastochka</span>
                    <span class="text-[10px] font-semibold text-blue-600 uppercase tracking-wider">MCHJ Travel</span>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-1">
                <a href="{{ route('home') }}"
                   class="px-3.5 py-2 text-sm font-medium rounded-lg transition {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                    {{ __('messages.home') }}
                </a>
                <a href="{{ route('tours.index') }}"
                   class="px-3.5 py-2 text-sm font-medium rounded-lg transition {{ request()->routeIs('tours.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                    {{ __('messages.tours') }}
                </a>
                <a href="{{ route('about') }}"
                   class="px-3.5 py-2 text-sm font-medium rounded-lg transition {{ request()->routeIs('about') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                    {{ __('messages.about') }}
                </a>
                <a href="{{ route('licenses') }}"
                   class="px-3.5 py-2 text-sm font-medium rounded-lg transition {{ request()->routeIs('licenses') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                    {{ __('messages.licenses') }}
                </a>
                <a href="{{ route('contact') }}"
                   class="px-3.5 py-2 text-sm font-medium rounded-lg transition {{ request()->routeIs('contact') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                    {{ __('messages.contact') }}
                </a>
            </nav>

            <div class="hidden md:flex items-center gap-2">
                {{-- Til tanlash --}}
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-100 transition">
                        <i data-lucide="languages" class="w-4 h-4"></i>
                        {{ strtoupper(app()->getLocale()) }}
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5 text-gray-400"></i>
                    </button>
                    <div x-show="open" @click.away="open = false"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-1.5 w-44 bg-white rounded-xl shadow-lg border border-gray-200 py-1.5 z-50">
                        @foreach(\App\Enums\Language::cases() as $lang)
                            <a href="{{ route('locale.switch', $lang->value) }}"
                               class="flex items-center gap-2.5 px-3 py-2 text-sm hover:bg-gray-50 {{ app()->getLocale() === $lang->value ? 'text-blue-600 font-medium' : 'text-gray-700' }}">
                                {{ $lang->flag() }} {{ $lang->label() }}
                            </a>
                        @endforeach
                    </div>
                </div>

                @guest
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 rounded-lg hover:bg-gray-100 transition">
                        {{ __('messages.login') }}
                    </a>
                    <a href="{{ route('register') }}"
                       class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition shadow-sm">
                        {{ __('messages.register') }}
                    </a>
                @endguest

                @auth
                    <a href="{{ route('my-tours.index') }}"
                       class="px-3.5 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 rounded-lg hover:bg-gray-100 transition flex items-center gap-1.5">
                        <i data-lucide="briefcase" class="w-4 h-4"></i>
                        {{ __('messages.my_tours') }}
                    </a>
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center gap-2 pl-2 pr-3 py-1.5 rounded-lg hover:bg-gray-100 transition">
                            <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=3b82f6&color=fff&bold=true&size=32' }}"
                                 alt="" class="w-7 h-7 rounded-full object-cover ring-2 ring-gray-100">
                            <span class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</span>
                            <i data-lucide="chevron-down" class="w-3.5 h-3.5 text-gray-400"></i>
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-1.5 w-52 bg-white rounded-xl shadow-lg border border-gray-200 py-1.5 z-50">
                            <div class="px-3 py-2 border-b border-gray-100 mb-1">
                                <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                            </div>
                            <a href="{{ route('profile') }}" class="flex items-center gap-2.5 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <i data-lucide="user" class="w-4 h-4 text-gray-400"></i>
                                {{ __('messages.profile') }}
                            </a>
                            <a href="{{ route('my-tours.index') }}" class="flex items-center gap-2.5 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <i data-lucide="map" class="w-4 h-4 text-gray-400"></i>
                                {{ __('messages.my_tours') }}
                            </a>
                            <div class="border-t border-gray-100 mt-1 pt-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-2.5 px-3 py-2 text-sm text-red-600 hover:bg-red-50 w-full text-left">
                                        <i data-lucide="log-out" class="w-4 h-4"></i>
                                        {{ __('messages.logout') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

            <button x-data @click="$dispatch('toggle-mobile-menu')" class="md:hidden p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg">
                <i data-lucide="menu" class="w-5 h-5"></i>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-data="{ open: false }" @toggle-mobile-menu.window="open = !open" x-show="open" x-transition class="md:hidden border-t border-gray-200 bg-white">
        <div class="px-4 py-4 space-y-1">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 px-3 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100' }}">
                <i data-lucide="home" class="w-4 h-4"></i> {{ __('messages.home') }}
            </a>
            <a href="{{ route('tours.index') }}" class="flex items-center gap-2.5 px-3 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('tours.*') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100' }}">
                <i data-lucide="compass" class="w-4 h-4"></i> {{ __('messages.tours') }}
            </a>
            <a href="{{ route('about') }}" class="flex items-center gap-2.5 px-3 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('about') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100' }}">
                <i data-lucide="info" class="w-4 h-4"></i> {{ __('messages.about') }}
            </a>
            <a href="{{ route('licenses') }}" class="flex items-center gap-2.5 px-3 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('licenses') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100' }}">
                <i data-lucide="file-check" class="w-4 h-4"></i> {{ __('messages.licenses') }}
            </a>
            <a href="{{ route('contact') }}" class="flex items-center gap-2.5 px-3 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('contact') ? 'text-blue-600 bg-blue-50' : 'text-gray-600 hover:bg-gray-100' }}">
                <i data-lucide="mail" class="w-4 h-4"></i> {{ __('messages.contact') }}
            </a>

            {{-- Mobile til tanlash --}}
            <hr class="my-2">
            <div class="flex flex-wrap gap-1.5 px-3 py-2">
                @foreach(\App\Enums\Language::cases() as $lang)
                    <a href="{{ route('locale.switch', $lang->value) }}"
                       class="px-2.5 py-1.5 text-xs font-medium rounded-lg {{ app()->getLocale() === $lang->value ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                        {{ $lang->flag() }} {{ strtoupper($lang->value) }}
                    </a>
                @endforeach
            </div>

            <hr class="my-2">

            @guest
                <a href="{{ route('login') }}" class="flex items-center gap-2.5 px-3 py-2.5 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100">
                    <i data-lucide="log-in" class="w-4 h-4"></i> {{ __('messages.login') }}
                </a>
                <a href="{{ route('register') }}" class="flex items-center gap-2.5 px-3 py-2.5 text-sm font-medium text-blue-600 rounded-lg hover:bg-blue-50">
                    <i data-lucide="user-plus" class="w-4 h-4"></i> {{ __('messages.register') }}
                </a>
            @endguest

            @auth
                <a href="{{ route('my-tours.index') }}" class="flex items-center gap-2.5 px-3 py-2.5 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100">
                    <i data-lucide="briefcase" class="w-4 h-4"></i> {{ __('messages.my_tours') }}
                </a>
                <a href="{{ route('profile') }}" class="flex items-center gap-2.5 px-3 py-2.5 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100">
                    <i data-lucide="user" class="w-4 h-4"></i> {{ __('messages.profile') }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2.5 px-3 py-2.5 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50 w-full">
                        <i data-lucide="log-out" class="w-4 h-4"></i> {{ __('messages.logout') }}
                    </button>
                </form>
            @endauth
        </div>
    </div>
</header>