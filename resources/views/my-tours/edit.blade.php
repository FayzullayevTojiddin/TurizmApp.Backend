<x-layouts.app :title="'Tahrirlash: ' . $myTour->title">
    <section class="py-10">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-1.5 text-sm text-gray-500 mb-6">
                <a href="{{ route('my-tours.index') }}" class="hover:text-gray-700 transition">Mening turlarim</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                <a href="{{ route('my-tours.show', $myTour) }}" class="hover:text-gray-700 transition">{{ $myTour->title }}</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                <span class="text-gray-900 font-medium">Tahrirlash</span>
            </nav>
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Turni tahrirlash</h1>
            <form method="POST" action="{{ route('my-tours.update', $myTour) }}" class="space-y-5">
                @csrf @method('PUT')
                <div class="bg-white rounded-xl border border-gray-200 p-5 space-y-4">
                    <h2 class="text-sm font-semibold text-gray-900 flex items-center gap-2">
                        <i data-lucide="info" class="w-4 h-4 text-gray-400"></i> Umumiy
                    </h2>
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Tur nomi</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $myTour->title) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('title') border-red-400 @enderror">
                        @error('title') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1.5">Boshlanish</label>
                            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $myTour->start_date->format('Y-m-d')) }}" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1.5">Tugash</label>
                            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $myTour->end_date->format('Y-m-d')) }}" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="duration_days" class="block text-sm font-medium text-gray-700 mb-1.5">Kunlar</label>
                            <input type="number" name="duration_days" id="duration_days" value="{{ old('duration_days', $myTour->duration_days) }}" required min="1"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label for="duration_nights" class="block text-sm font-medium text-gray-700 mb-1.5">Tunlar</label>
                            <input type="number" name="duration_nights" id="duration_nights" value="{{ old('duration_nights', $myTour->duration_nights) }}" required min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-5 space-y-4">
                    <h2 class="text-sm font-semibold text-gray-900 flex items-center gap-2">
                        <i data-lucide="users" class="w-4 h-4 text-gray-400"></i> Sayohatchilar
                    </h2>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="adults_count" class="block text-sm font-medium text-gray-700 mb-1.5">Kattalar</label>
                            <input type="number" name="adults_count" id="adults_count" value="{{ old('adults_count', $myTour->adults_count) }}" required min="1"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label for="children_count" class="block text-sm font-medium text-gray-700 mb-1.5">Bolalar</label>
                            <input type="number" name="children_count" id="children_count" value="{{ old('children_count', $myTour->children_count) }}" min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-5 space-y-2">
                    <h2 class="text-sm font-semibold text-gray-900 flex items-center gap-2 mb-2">
                        <i data-lucide="settings" class="w-4 h-4 text-gray-400"></i> Qo'shimcha xizmatlar
                    </h2>
                    <label class="flex items-center gap-3 p-2.5 rounded-lg hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="include_flight" value="1" {{ old('include_flight', $myTour->include_flight) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <i data-lucide="plane" class="w-4 h-4 text-gray-400"></i>
                        <span class="text-sm text-gray-700">Aviabilet kiritilsin</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 rounded-lg hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="include_transfer" value="1" {{ old('include_transfer', $myTour->include_transfer) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <i data-lucide="car" class="w-4 h-4 text-gray-400"></i>
                        <span class="text-sm text-gray-700">Transfer kiritilsin</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 rounded-lg hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="include_insurance" value="1" {{ old('include_insurance', $myTour->include_insurance) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <i data-lucide="shield" class="w-4 h-4 text-gray-400"></i>
                        <span class="text-sm text-gray-700">Sug'urta kiritilsin</span>
                    </label>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-5">
                    <label for="special_requests" class="block text-sm font-medium text-gray-700 mb-1.5">Maxsus so'rovlar</label>
                    <textarea name="special_requests" id="special_requests" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">{{ old('special_requests', $myTour->special_requests) }}</textarea>
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 text-white font-medium px-5 py-2.5 rounded-lg hover:bg-blue-700 transition text-sm">
                        <i data-lucide="save" class="w-4 h-4"></i> Saqlash
                    </button>
                    <a href="{{ route('my-tours.show', $myTour) }}" class="text-sm text-gray-600 font-medium px-5 py-2.5 rounded-lg border border-gray-200 hover:bg-gray-50 transition">Bekor qilish</a>
                </div>
            </form>
        </div>
    </section>
</x-layouts.app>