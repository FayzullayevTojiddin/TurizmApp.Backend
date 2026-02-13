<x-layouts.app title="{{ __('messages.hero_title') }}">

    {{-- Hero --}}
    <section class="relative bg-gray-900 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/95 to-gray-900/60"></div>
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1488085061387-422e29b40080?w=1920')] bg-cover bg-center opacity-40"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-28 lg:py-36">
            <div class="max-w-xl">
                <p class="text-blue-400 font-semibold text-sm tracking-wide uppercase mb-4">{{ __('messages.hero_subtitle') }}</p>
                <h1 class="text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-6">
                    {{ __('messages.hero_title') }}
                </h1>
                <p class="text-gray-300 text-lg leading-relaxed mb-8">
                    {{ __('messages.hero_description') }}
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('tours.index') }}"
                       class="inline-flex items-center gap-2 bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-600/25">
                        <i data-lucide="compass" class="w-5 h-5"></i>
                        {{ __('messages.view_tours') }}
                    </a>
                    @auth
                        <a href="{{ route('my-tours.create') }}"
                           class="inline-flex items-center gap-2 bg-white/10 text-white font-semibold px-6 py-3 rounded-lg hover:bg-white/20 transition backdrop-blur-sm border border-white/20">
                            <i data-lucide="plus" class="w-5 h-5"></i>
                            {{ __('messages.create_tour') }}
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center gap-2 bg-white/10 text-white font-semibold px-6 py-3 rounded-lg hover:bg-white/20 transition backdrop-blur-sm border border-white/20">
                            <i data-lucide="user-plus" class="w-5 h-5"></i>
                            {{ __('messages.register') }}
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach([
                    ['icon' => 'users', 'value' => '500+', 'label' => __('messages.happy_clients')],
                    ['icon' => 'map-pin', 'value' => '50+', 'label' => __('messages.destinations')],
                    ['icon' => 'briefcase', 'value' => '100+', 'label' => __('messages.tour_packages')],
                    ['icon' => 'award', 'value' => '5+', 'label' => __('messages.years_experience')],
                ] as $stat)
                    <div class="text-center">
                        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center mx-auto mb-3">
                            <i data-lucide="{{ $stat['icon'] }}" class="w-5 h-5 text-blue-600"></i>
                        </div>
                        <div class="text-2xl font-bold text-gray-900">{{ $stat['value'] }}</div>
                        <div class="text-sm text-gray-500 mt-0.5">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Featured --}}
    @if($featuredTours->count())
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ __('messages.featured_tours') }}</h2>
                        <p class="text-gray-500 text-sm mt-1">{{ __('messages.featured_tours_desc') }}</p>
                    </div>
                    <a href="{{ route('tours.index') }}" class="hidden sm:inline-flex items-center gap-1 text-sm font-medium text-blue-600 hover:text-blue-700 transition">
                        {{ __('messages.view_all') }} <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($featuredTours as $tour)
                        <x-tour-card :tour="$tour" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Latest --}}
    @if($latestTours->count())
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-end justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ __('messages.latest_tours') }}</h2>
                        <p class="text-gray-500 text-sm mt-1">{{ __('messages.latest_tours_desc') }}</p>
                    </div>
                    <a href="{{ route('tours.index') }}" class="hidden sm:inline-flex items-center gap-1 text-sm font-medium text-blue-600 hover:text-blue-700 transition">
                        {{ __('messages.view_all') }} <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($latestTours as $tour)
                        <x-tour-card :tour="$tour" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA --}}
    <section class="bg-gray-900 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="w-14 h-14 bg-blue-600/20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i data-lucide="sparkles" class="w-7 h-7 text-blue-400"></i>
            </div>
            <h2 class="text-3xl font-bold mb-4">{{ __('messages.cta_title') }}</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">
                {{ __('messages.cta_description') }}
            </p>
            @auth
                <a href="{{ route('my-tours.create') }}"
                   class="inline-flex items-center gap-2 bg-blue-600 text-white font-semibold px-8 py-3 rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-600/25">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                    {{ __('messages.create_tour') }}
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="inline-flex items-center gap-2 bg-blue-600 text-white font-semibold px-8 py-3 rounded-lg hover:bg-blue-700 transition shadow-lg shadow-blue-600/25">
                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                    {{ __('messages.register_cta') }}
                </a>
            @endauth
        </div>
    </section>
</x-layouts.app>