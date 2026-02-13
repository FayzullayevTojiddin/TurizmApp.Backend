<x-layouts.app :title="$myTour->title">

    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
                <a href="{{ route('my-tours.index') }}" class="hover:text-gray-700">Mening turlarim</a>
                <span>/</span>
                <span class="text-gray-900">{{ $myTour->title }}</span>
            </nav>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg p-4 mb-6">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Header --}}
            <div class="bg-white rounded-xl border shadow-sm p-6 mb-6">
                <div class="flex items-start justify-between mb-4">
                    <h1 class="text-2xl font-bold text-gray-900">{{ $myTour->title }}</h1>
                    <span class="text-xs font-medium px-2.5 py-1 rounded-full
                        {{ match($myTour->status->value) {
                            'draft' => 'bg-gray-100 text-gray-600',
                            'pending' => 'bg-yellow-100 text-yellow-700',
                            'reviewing' => 'bg-blue-100 text-blue-700',
                            'quoted' => 'bg-purple-100 text-purple-700',
                            'approved' => 'bg-green-100 text-green-700',
                            'booked' => 'bg-emerald-100 text-emerald-700',
                            'cancelled' => 'bg-red-100 text-red-700',
                            default => 'bg-gray-100 text-gray-600',
                        } }}">
                        {{ $myTour->status->label() }}
                    </span>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                    <div class="bg-gray-50 rounded-lg p-3">
                        <div class="text-gray-500">Muddat</div>
                        <div class="font-medium">{{ $myTour->duration_days }} kun / {{ $myTour->duration_nights }} tun</div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <div class="text-gray-500">Sanalar</div>
                        <div class="font-medium">{{ $myTour->start_date->format('d.m.Y') }} — {{ $myTour->end_date->format('d.m.Y') }}</div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <div class="text-gray-500">Sayohatchilar</div>
                        <div class="font-medium">{{ $myTour->adults_count }} katta, {{ $myTour->children_count }} bola</div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3">
                        <div class="text-gray-500">Narx</div>
                        <div class="font-medium">
                            @if($myTour->final_price)
                                <span class="text-green-600">${{ number_format($myTour->final_price, 0) }}</span>
                            @elseif($myTour->estimated_price > 0)
                                ~${{ number_format($myTour->estimated_price, 0) }}
                            @else
                                Belgilanmagan
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 mt-4">
                    @if($myTour->include_flight)
                        <span class="text-xs bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full">✈️ Aviabilet</span>
                    @endif
                    @if($myTour->include_transfer)
                        <span class="text-xs bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full">🚐 Transfer</span>
                    @endif
                    @if($myTour->include_insurance)
                        <span class="text-xs bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full">🛡️ Sug'urta</span>
                    @endif
                </div>

                @if($myTour->special_requests)
                    <div class="mt-4 p-3 bg-yellow-50 rounded-lg">
                        <div class="text-sm font-medium text-yellow-800">Maxsus so'rovlar:</div>
                        <div class="text-sm text-yellow-700 mt-1">{{ $myTour->special_requests }}</div>
                    </div>
                @endif

                @if($myTour->manager_notes)
                    <div class="mt-4 p-3 bg-blue-50 rounded-lg">
                        <div class="text-sm font-medium text-blue-800">Menejer izohi:</div>
                        <div class="text-sm text-blue-700 mt-1">{{ $myTour->manager_notes }}</div>
                    </div>
                @endif
            </div>

            {{-- Items --}}
            @php
                $itemsByDay = $myTour->items->groupBy('day_number');
            @endphp

            @if($itemsByDay->count())
                <div class="space-y-4">
                    <h2 class="text-xl font-bold text-gray-900">Sayohat dasturi</h2>
                    @foreach($itemsByDay as $day => $items)
                        <div class="bg-white rounded-xl border p-5">
                            <h3 class="font-semibold text-gray-900 mb-3">{{ $day ? $day . '-kun' : 'Umumiy' }}</h3>
                            <div class="space-y-3">
                                @foreach($items as $item)
                                    <div class="flex items-start gap-3">
                                        <span class="shrink-0 w-8 h-8 rounded-full flex items-center justify-center text-sm
                                            {{ match($item->type->value) {
                                                'destination' => 'bg-blue-100 text-blue-600',
                                                'hotel' => 'bg-purple-100 text-purple-600',
                                                'attraction' => 'bg-amber-100 text-amber-600',
                                                'activity' => 'bg-green-100 text-green-600',
                                                'transport' => 'bg-sky-100 text-sky-600',
                                                'restaurant' => 'bg-red-100 text-red-600',
                                                default => 'bg-gray-100 text-gray-600',
                                            } }}">
                                            {{ match($item->type->value) {
                                                'destination' => '📍',
                                                'hotel' => '🏨',
                                                'attraction' => '🏛️',
                                                'activity' => '🎯',
                                                'transport' => '✈️',
                                                'restaurant' => '🍽️',
                                                default => '📋',
                                            } }}
                                        </span>
                                        <div>
                                            <div class="font-medium text-gray-900">{{ $item->title }}</div>
                                            <div class="text-sm text-gray-500">{{ $item->type->label() }}</div>
                                            @if($item->description)
                                                <div class="text-sm text-gray-600 mt-1">{{ $item->description }}</div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Actions --}}
            <div class="flex items-center gap-3 mt-8">
                <a href="{{ route('my-tours.index') }}" class="text-sm text-gray-600 hover:text-gray-700 font-medium px-4 py-2 rounded-lg border hover:bg-gray-50 transition">
                    ← Ortga
                </a>
                @if($myTour->isDraft())
                    <a href="{{ route('my-tours.edit', $myTour) }}" class="text-sm text-white bg-blue-600 hover:bg-blue-700 font-medium px-4 py-2 rounded-lg transition">
                        Tahrirlash
                    </a>
                @endif
            </div>

        </div>
    </section>

</x-layouts.app>