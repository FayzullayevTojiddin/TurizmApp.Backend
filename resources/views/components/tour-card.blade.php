@props(['tour'])

<a href="{{ route('tours.show', $tour) }}" class="group block bg-white rounded-xl border border-gray-200 hover:border-gray-300 hover:shadow-lg transition-all duration-200 overflow-hidden">
    <div class="aspect-[16/10] bg-gray-100 relative overflow-hidden">
        @if($tour->cover_image)
            <img src="{{ asset('storage/' . $tour->cover_image) }}" alt="{{ $tour->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        @else
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200">
                <i data-lucide="image" class="w-10 h-10 text-slate-300"></i>
            </div>
        @endif

        @if($tour->discount_percent > 0)
            <span class="absolute top-3 left-3 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded-md">
                -{{ $tour->discount_percent }}%
            </span>
        @endif

        @if($tour->featured)
            <span class="absolute top-3 right-3 bg-amber-500 text-white text-xs font-semibold px-2 py-1 rounded-md flex items-center gap-1">
                <i data-lucide="star" class="w-3 h-3"></i>
                Tavsiya
            </span>
        @endif
    </div>

    <div class="p-4">
        <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 transition line-clamp-1 mb-2">
            {{ $tour->title }}
        </h3>

        <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
            <span class="flex items-center gap-1">
                <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                {{ $tour->duration_days }} kun / {{ $tour->duration_nights }} tun
            </span>
            @if($tour->meal_plan)
                <span class="flex items-center gap-1">
                    <i data-lucide="utensils" class="w-3.5 h-3.5"></i>
                    {{ $tour->meal_plan->label() }}
                </span>
            @endif
        </div>

        <div class="flex items-end justify-between pt-3 border-t border-gray-100">
            <div>
                @if($tour->discount_percent > 0)
                    <span class="text-xs text-gray-400 line-through">${{ number_format($tour->base_price, 0) }}</span>
                @endif
                <div>
                    <span class="text-lg font-bold text-gray-900">${{ number_format($tour->discountedPrice(), 0) }}</span>
                    <span class="text-xs text-gray-500">/ kishi</span>
                </div>
            </div>
            <span class="text-xs font-medium text-blue-600 flex items-center gap-1 group-hover:gap-1.5 transition-all">
                Batafsil <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </span>
        </div>
    </div>
</a>