<x-layouts.app :title="$tourPackage->translatedTitle()">

    <section class="py-10" x-data="{ showBooking: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg p-3.5 mb-6 text-sm">
                    <i data-lucide="check-circle-2" class="w-4 h-4 shrink-0"></i> {{ session('success') }}
                </div>
            @endif

            <nav class="flex items-center gap-1.5 text-sm text-gray-500 mb-6">
                <a href="{{ route('home') }}" class="hover:text-gray-700 transition">{{ __('messages.home') }}</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                <a href="{{ route('tours.index') }}" class="hover:text-gray-700 transition">{{ __('messages.tours') }}</a>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                <span class="text-gray-900 font-medium">{{ $tourPackage->translatedTitle() }}</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Content --}}
                <div class="lg:col-span-2 space-y-8">
                    <div class="aspect-[16/9] rounded-xl overflow-hidden bg-gray-100">
                        @if($tourPackage->cover_image)
                            <img src="{{ asset('storage/' . $tourPackage->cover_image) }}" alt="{{ $tourPackage->translatedTitle() }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200">
                                <i data-lucide="image" class="w-16 h-16 text-slate-300"></i>
                            </div>
                        @endif
                    </div>

                    {{-- Gallery --}}
                    @if($tourPackage->gallery && count($tourPackage->gallery))
                        <div>
                            <h2 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <i data-lucide="images" class="w-5 h-5"></i> {{ __('messages.gallery') }}
                            </h2>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                @foreach($tourPackage->gallery as $image)
                                    <a href="{{ asset('storage/' . $image) }}" target="_blank" class="aspect-[4/3] rounded-lg overflow-hidden bg-gray-100 block hover:opacity-90 transition">
                                        <img src="{{ asset('storage/' . $image) }}" alt="{{ $tourPackage->translatedTitle() }}" class="w-full h-full object-cover">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Videos --}}
                    @if($tourPackage->videos && count($tourPackage->videos))
                        <div>
                            <h2 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <i data-lucide="play-circle" class="w-5 h-5"></i> {{ __('messages.videos') }}
                            </h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach($tourPackage->videos as $video)
                                    <div class="rounded-lg overflow-hidden bg-black aspect-video">
                                        <video controls class="w-full h-full object-contain" preload="metadata">
                                            <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                                        </video>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div>
                        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-3">{{ $tourPackage->translatedTitle() }}</h1>
                        @if($tourPackage->translatedDescription())
                            <div class="prose prose-gray max-w-none text-gray-600">{!! $tourPackage->translatedDescription() !!}</div>
                        @endif
                    </div>

                    @php $itemsByDay = $tourPackage->items->groupBy('day_number'); @endphp

                    @if($itemsByDay->count())
                        <div>
                            <h2 class="text-lg font-bold text-gray-900 mb-4">{{ __('messages.tour_program') }}</h2>
                            <div class="space-y-4">
                                @foreach($itemsByDay as $day => $items)
                                    <div class="bg-white rounded-xl border border-gray-200 p-5">
                                        <h3 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                            <span class="w-7 h-7 bg-blue-600 text-white rounded-lg flex items-center justify-center text-xs font-bold">{{ $day ?: '-' }}</span>
                                            {{ $day ? $day . __('messages.day_suffix') : __('messages.general_items') }}
                                        </h3>
                                        <div class="space-y-4 ml-9">
                                            @foreach($items as $item)
                                                <div class="flex items-start gap-3">
                                                    <x-item-icon :type="$item->type->value" />
                                                    <div class="flex-1 min-w-0">
                                                        <div class="flex items-center gap-2">
                                                            <span class="text-sm font-medium text-gray-900">{{ $item->translatedTitle() }}</span>
                                                            <span class="text-xs bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded font-medium">{{ $item->type->label() }}</span>
                                                        </div>
                                                        @if($item->translatedDescription())
                                                            <p class="text-sm text-gray-500 mt-1">{{ $item->translatedDescription() }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @if($tourPackage->included_services)
                            <div class="bg-emerald-50 rounded-xl p-5 border border-emerald-100">
                                <h3 class="text-sm font-semibold text-emerald-800 mb-3 flex items-center gap-2">
                                    <i data-lucide="check-circle-2" class="w-4 h-4"></i> {{ __('messages.included_services') }}
                                </h3>
                                <ul class="space-y-2">
                                    @foreach($tourPackage->included_services as $service)
                                        <li class="text-sm text-emerald-700 flex items-center gap-2">
                                            <i data-lucide="check" class="w-3.5 h-3.5 shrink-0"></i> {{ $service }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($tourPackage->excluded_services)
                            <div class="bg-red-50 rounded-xl p-5 border border-red-100">
                                <h3 class="text-sm font-semibold text-red-800 mb-3 flex items-center gap-2">
                                    <i data-lucide="x-circle" class="w-4 h-4"></i> {{ __('messages.excluded_services') }}
                                </h3>
                                <ul class="space-y-2">
                                    @foreach($tourPackage->excluded_services as $service)
                                        <li class="text-sm text-red-700 flex items-center gap-2">
                                            <i data-lucide="x" class="w-3.5 h-3.5 shrink-0"></i> {{ $service }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl border border-gray-200 p-6 sticky top-24 space-y-5">
                        <div>
                            @if($tourPackage->discount_percent > 0)
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-sm text-gray-400 line-through">${{ number_format($tourPackage->base_price, 0) }}</span>
                                    <span class="text-xs bg-red-100 text-red-700 font-semibold px-1.5 py-0.5 rounded">-{{ $tourPackage->discount_percent }}%</span>
                                </div>
                            @endif
                            <div class="text-3xl font-bold text-gray-900">
                                ${{ number_format($tourPackage->discountedPrice(), 0) }}
                                <span class="text-sm font-normal text-gray-500">/ {{ __('messages.per_person') }}</span>
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        <div class="space-y-3 text-sm">
                            @foreach([
                                ['icon' => 'calendar', 'label' => __('messages.duration'), 'value' => $tourPackage->duration_days . ' ' . __('messages.days') . ' / ' . $tourPackage->duration_nights . ' ' . __('messages.nights')],
                                ['icon' => 'users', 'label' => __('messages.people'), 'value' => $tourPackage->min_people . ' — ' . $tourPackage->max_people . ' ' . __('messages.person')],
                            ] as $info)
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500 flex items-center gap-1.5">
                                        <i data-lucide="{{ $info['icon'] }}" class="w-4 h-4"></i> {{ $info['label'] }}
                                    </span>
                                    <span class="font-medium text-gray-900">{{ $info['value'] }}</span>
                                </div>
                            @endforeach
                            @if($tourPackage->meal_plan)
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500 flex items-center gap-1.5">
                                        <i data-lucide="utensils" class="w-4 h-4"></i> {{ __('messages.meal') }}
                                    </span>
                                    <span class="font-medium text-gray-900">{{ $tourPackage->meal_plan->label() }}</span>
                                </div>
                            @endif
                        </div>

                        <hr class="border-gray-100">

                        <button @click="showBooking = true"
                                class="flex items-center justify-center gap-2 w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition cursor-pointer">
                            <i data-lucide="credit-card" class="w-4 h-4"></i> {{ __('messages.book_now') }}
                        </button>
                        <a href="{{ route('contact') }}" class="flex items-center justify-center gap-2 w-full border border-gray-200 text-gray-700 font-medium py-3 rounded-lg hover:bg-gray-50 transition">
                            <i data-lucide="message-circle" class="w-4 h-4"></i> {{ __('messages.ask_question') }}
                        </a>
                    </div>
                </div>
            </div>

            {{-- Related tours --}}
            @if($relatedTours->count())
                <div class="mt-16 pt-12 border-t border-gray-200">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">{{ __('messages.related_tours') }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($relatedTours as $tour)
                            <x-tour-card :tour="$tour" />
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        {{-- ====== BOOKING MODAL ====== --}}
        <div x-show="showBooking" x-cloak
             style="position:fixed;inset:0;z-index:9999;display:flex;align-items:center;justify-content:center;padding:1rem;">

            <div style="position:absolute;inset:0;background:rgba(0,0,0,0.5);" @click="showBooking = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"></div>

            <div style="position:relative;z-index:10;width:100%;max-width:28rem;"
                 class="bg-white rounded-2xl shadow-2xl p-6 mx-auto"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95">

                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-lg font-bold text-gray-900">{{ __('messages.booking') }}</h3>
                    <button @click="showBooking = false" class="p-1.5 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>

                <div class="bg-gray-50 rounded-lg p-3 mb-5">
                    <p class="text-sm font-medium text-gray-900">{{ $tourPackage->translatedTitle() }}</p>
                    <p class="text-xs text-gray-500 mt-0.5">
                        {{ $tourPackage->duration_days }} {{ __('messages.days') }}
                    </p>
                    <p class="text-sm font-bold text-blue-600 mt-1">${{ number_format($tourPackage->discountedPrice(), 0) }} / {{ __('messages.per_person') }}</p>
                </div>

                <form method="POST" action="{{ route('bookings.store', $tourPackage) }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="booking_name" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.name') }}</label>
                        <input type="text" name="name" id="booking_name" required
                               value="{{ auth()->check() ? auth()->user()->name : '' }}"
                               placeholder="{{ __('messages.full_name_placeholder') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>

                    <div>
                        <label for="booking_phone" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.phone_label') }}</label>
                        <input type="tel" name="phone" id="booking_phone" required
                               placeholder="+998 90 123 45 67"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="booking_adults" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.adults') }}</label>
                            <input type="number" name="adults_count" id="booking_adults" required
                                   min="1" max="{{ $tourPackage->max_people }}" value="1"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label for="booking_children" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.children') }}</label>
                            <input type="number" name="children_count" id="booking_children"
                                   min="0" value="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                    </div>

                    <div>
                        <label for="booking_notes" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.notes') }} <span class="text-gray-400">({{ __('messages.optional') }})</span></label>
                        <textarea name="notes" id="booking_notes" rows="2" placeholder="{{ __('messages.additional_info_placeholder') }}"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"></textarea>
                    </div>

                    <button type="submit"
                            class="w-full flex items-center justify-center gap-2 bg-blue-600 text-white font-semibold py-2.5 rounded-lg hover:bg-blue-700 transition text-sm">
                        <i data-lucide="check" class="w-4 h-4"></i> {{ __('messages.place_order') }}
                    </button>
                </form>
            </div>
        </div>

    </section>

    @push('styles')
        <style>[x-cloak] { display: none !important; }</style>
    @endpush

</x-layouts.app>