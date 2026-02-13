<x-layouts.app title="{{ __('messages.create_new_tour') }}">
    <section class="py-10">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-1.5 text-sm text-gray-500 mb-6">
                <a href="{{ route('my-tours.index') }}" class="hover:text-gray-700 transition">{{ __('messages.my_tours') }}</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                <span class="text-gray-900 font-medium">{{ __('messages.new_tour') }}</span>
            </nav>
            <h1 class="text-2xl font-bold text-gray-900 mb-6">{{ __('messages.create_new_tour') }}</h1>
            <form method="POST" action="{{ route('my-tours.store') }}" class="space-y-5">
                @csrf
                <div class="bg-white rounded-xl border border-gray-200 p-5 space-y-4">
                    <h2 class="text-sm font-semibold text-gray-900 flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4 text-gray-400"></i> {{ __('messages.general') }}
                    </h2>
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.tour_name') }}</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                               placeholder="{{ __('messages.tour_name_placeholder') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('title') border-red-400 @enderror">
                        @error('title') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.start_date') }}</label>
                            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('start_date') border-red-400 @enderror">
                            @error('start_date') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.end_date') }}</label>
                            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('end_date') border-red-400 @enderror">
                            @error('end_date') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="duration_days" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.days_label') }}</label>
                            <input type="number" name="duration_days" id="duration_days" value="{{ old('duration_days') }}" required min="1"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label for="duration_nights" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.nights_label') }}</label>
                            <input type="number" name="duration_nights" id="duration_nights" value="{{ old('duration_nights') }}" required min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-5 space-y-4">
                    <h2 class="text-sm font-semibold text-gray-900 flex items-center gap-2">
                        <i data-lucide="users" class="w-4 h-4 text-gray-400"></i> {{ __('messages.travelers') }}
                    </h2>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="adults_count" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.adults') }}</label>
                            <input type="number" name="adults_count" id="adults_count" value="{{ old('adults_count', 1) }}" required min="1"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label for="children_count" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.children') }}</label>
                            <input type="number" name="children_count" id="children_count" value="{{ old('children_count', 0) }}" min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-5 space-y-2">
                    <h2 class="text-sm font-semibold text-gray-900 flex items-center gap-2 mb-2">
                        <i data-lucide="settings" class="w-4 h-4 text-gray-400"></i> {{ __('messages.extra_services') }}
                    </h2>
                    <label class="flex items-center gap-3 p-2.5 rounded-lg hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="include_flight" value="1" {{ old('include_flight') ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <i data-lucide="plane" class="w-4 h-4 text-gray-400"></i>
                        <span class="text-sm text-gray-700">{{ __('messages.include_flight') }}</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 rounded-lg hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="include_transfer" value="1" {{ old('include_transfer') ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <i data-lucide="car" class="w-4 h-4 text-gray-400"></i>
                        <span class="text-sm text-gray-700">{{ __('messages.include_transfer') }}</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 rounded-lg hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="include_insurance" value="1" {{ old('include_insurance') ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <i data-lucide="shield" class="w-4 h-4 text-gray-400"></i>
                        <span class="text-sm text-gray-700">{{ __('messages.include_insurance') }}</span>
                    </label>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-5">
                    <label for="special_requests" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.special_requests') }}</label>
                    <textarea name="special_requests" id="special_requests" rows="3" placeholder="{{ __('messages.special_requests_placeholder') }}"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">{{ old('special_requests') }}</textarea>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 text-white font-medium px-5 py-2.5 rounded-lg hover:bg-blue-700 transition text-sm">
                        <i data-lucide="check" class="w-4 h-4"></i> {{ __('messages.create') }}
                    </button>
                    <a href="{{ route('my-tours.index') }}" class="text-sm text-gray-600 font-medium px-5 py-2.5 rounded-lg border border-gray-200 hover:bg-gray-50 transition">{{ __('messages.cancel') }}</a>
                </div>
            </form>
        </div>
    </section>
</x-layouts.app>