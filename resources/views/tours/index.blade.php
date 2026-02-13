<x-layouts.app title="Turlar">

    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Tur paketlar</h1>
                <p class="text-gray-500 text-sm mt-1">Barcha mavjud tur paketlarni ko'ring va tanlang</p>
            </div>

            {{-- Filter --}}
            <form method="GET" action="{{ route('tours.index') }}" class="bg-white rounded-xl border border-gray-200 p-5 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Qidirish</label>
                        <div class="relative">
                            <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"></i>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Tur nomi..."
                                   class="w-full pl-9 pr-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Ovqat rejasi</label>
                        <select name="meal_plan" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-white">
                            <option value="">Barchasi</option>
                            @foreach($mealPlans as $value => $label)
                                <option value="{{ $value }}" {{ request('meal_plan') == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Min narx ($)</label>
                        <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="0"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Maks narx ($)</label>
                        <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="10000"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Saralash</label>
                        <select name="sort" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-white">
                            <option value="">Yangilari</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Narx: past → yuqori</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Narx: yuqori → past</option>
                            <option value="duration" {{ request('sort') == 'duration' ? 'selected' : '' }}>Muddat bo'yicha</option>
                            <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Sana bo'yicha</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center gap-3 mt-4 pt-4 border-t border-gray-100">
                    <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                        <i data-lucide="search" class="w-4 h-4"></i> Qidirish
                    </button>
                    <a href="{{ route('tours.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition">Tozalash</a>
                </div>
            </form>

            {{-- Grid --}}
            @if($tours->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($tours as $tour)
                        <x-tour-card :tour="$tour" />
                    @endforeach
                </div>
                <div class="mt-8">{{ $tours->links() }}</div>
            @else
                <div class="text-center py-20">
                    <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="search-x" class="w-8 h-8 text-gray-300"></i>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1">Turlar topilmadi</h3>
                    <p class="text-sm text-gray-500">Boshqa parametrlar bilan qidirib ko'ring</p>
                </div>
            @endif

        </div>
    </section>

</x-layouts.app>