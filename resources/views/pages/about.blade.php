<x-layouts.app title="{{ __('messages.about') }}">
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h1 class="text-3xl font-bold text-gray-900 mb-3">{{ __('messages.about') }}</h1>
                <p class="text-gray-500 max-w-xl mx-auto">
                    {{ __('messages.about_desc') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                @foreach([
                    ['icon' => 'globe', 'title' => __('messages.about_destinations'), 'desc' => __('messages.about_destinations_desc')],
                    ['icon' => 'shield-check', 'title' => __('messages.about_trusted'), 'desc' => __('messages.about_trusted_desc')],
                    ['icon' => 'sparkles', 'title' => __('messages.about_custom'), 'desc' => __('messages.about_custom_desc')],
                ] as $feature)
                    <div class="bg-white rounded-xl border border-gray-200 p-6">
                        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center mb-4">
                            <i data-lucide="{{ $feature['icon'] }}" class="w-5 h-5 text-blue-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-1.5">{{ $feature['title'] }}</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">{{ $feature['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-4">{{ __('messages.our_mission') }}</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    {{ __('messages.mission_text_1') }}
                </p>
                <p class="text-gray-600 leading-relaxed">
                    {{ __('messages.mission_text_2') }}
                </p>
            </div>
        </div>
    </section>
</x-layouts.app>