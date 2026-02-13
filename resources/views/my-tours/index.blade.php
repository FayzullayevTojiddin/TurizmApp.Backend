<x-layouts.app title="Mening turlarim">
    <section class="py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Mening turlarim</h1>
                    <p class="text-sm text-gray-500 mt-1">Siz yaratgan barcha turlar</p>
                </div>
                <a href="{{ route('my-tours.create') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white font-medium px-4 py-2 rounded-lg hover:bg-blue-700 transition text-sm">
                    <i data-lucide="plus" class="w-4 h-4"></i> Yangi tur
                </a>
            </div>

            @if(session('success'))
                <div class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg p-3.5 mb-6 text-sm">
                    <i data-lucide="check-circle-2" class="w-4 h-4 shrink-0"></i> {{ session('success') }}
                </div>
            @endif

            @if($tours->count())
                <div class="space-y-3">
                    @foreach($tours as $tour)
                        <div class="bg-white rounded-xl border border-gray-200 p-5 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:border-gray-300 transition">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2.5 mb-1.5">
                                    <h3 class="font-semibold text-gray-900 truncate">{{ $tour->title }}</h3>
                                    <x-status-badge :status="$tour->status" />
                                </div>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-gray-500">
                                    <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3.5 h-3.5"></i> {{ $tour->start_date->format('d.m.Y') }} — {{ $tour->end_date->format('d.m.Y') }}</span>
                                    <span class="flex items-center gap-1"><i data-lucide="clock" class="w-3.5 h-3.5"></i> {{ $tour->duration_days }} kun / {{ $tour->duration_nights }} tun</span>
                                    <span class="flex items-center gap-1"><i data-lucide="users" class="w-3.5 h-3.5"></i> {{ $tour->totalPeople() }} kishi</span>
                                    @if($tour->final_price)
                                        <span class="font-medium text-emerald-600">${{ number_format($tour->final_price, 0) }}</span>
                                    @elseif($tour->estimated_price > 0)
                                        <span>~${{ number_format($tour->estimated_price, 0) }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center gap-1 shrink-0">
                                <a href="{{ route('my-tours.show', $tour) }}" class="inline-flex items-center gap-1.5 text-sm text-gray-600 hover:text-blue-600 font-medium px-3 py-1.5 rounded-lg hover:bg-gray-50 transition">
                                    <i data-lucide="eye" class="w-3.5 h-3.5"></i> Ko'rish
                                </a>
                                @if($tour->isDraft())
                                    <a href="{{ route('my-tours.edit', $tour) }}" class="inline-flex items-center gap-1.5 text-sm text-gray-600 hover:text-gray-900 font-medium px-3 py-1.5 rounded-lg hover:bg-gray-50 transition">
                                        <i data-lucide="pencil" class="w-3.5 h-3.5"></i> Tahrirlash
                                    </a>
                                    <form method="POST" action="{{ route('my-tours.destroy', $tour) }}" onsubmit="return confirm('Ishonchingiz komilmi?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1.5 text-sm text-red-500 hover:text-red-700 font-medium px-3 py-1.5 rounded-lg hover:bg-red-50 transition">
                                            <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6">{{ $tours->links() }}</div>
            @else
                <div class="text-center py-20 bg-white rounded-xl border border-gray-200">
                    <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="map" class="w-8 h-8 text-gray-300"></i>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1">Hali turlar yo'q</h3>
                    <p class="text-sm text-gray-500 mb-5">Birinchi turingizni yarating</p>
                    <a href="{{ route('my-tours.create') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white font-medium px-5 py-2.5 rounded-lg hover:bg-blue-700 transition text-sm">
                        <i data-lucide="plus" class="w-4 h-4"></i> Tur yaratish
                    </a>
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>