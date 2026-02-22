<x-layouts.app title="{{ __('messages.licenses') }}">
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold text-gray-900 mb-3">{{ __('messages.licenses') }}</h1>
                <p class="text-gray-500">{{ __('messages.licenses_desc') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                {{-- Turizm litsenziyasi --}}
                <div class="bg-white rounded-xl border border-gray-200 p-6 text-center">
                    <div class="w-14 h-14 bg-emerald-50 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="file-check" class="w-7 h-7 text-emerald-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __('messages.tourism_license') }}</h3>
                    <p class="text-sm text-gray-500 mb-4">{{ __('messages.tourism_license_desc') }}</p>
                    <a href="{{ asset('documents/turizm-litsenziya.pdf') }}" target="_blank"
                       class="inline-flex items-center gap-2 text-sm font-medium text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-4 py-2 rounded-lg transition">
                        <i data-lucide="eye" class="w-4 h-4"></i> {{ __('messages.view_document') }}
                    </a>
                </div>

                {{-- Yo'l harakati litsenziyasi --}}
                <div class="bg-white rounded-xl border border-gray-200 p-6 text-center">
                    <div class="w-14 h-14 bg-blue-50 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="bus" class="w-7 h-7 text-blue-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __('messages.transport_license') }}</h3>
                    <p class="text-sm text-gray-500 mb-4">{{ __('messages.transport_license_desc') }}</p>
                    <a href="{{ asset('documents/yul-harakati-litsenziya.pdf') }}" target="_blank"
                       class="inline-flex items-center gap-2 text-sm font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 px-4 py-2 rounded-lg transition">
                        <i data-lucide="eye" class="w-4 h-4"></i> {{ __('messages.view_document') }}
                    </a>
                </div>

                {{-- Guvohnoma --}}
                <div class="bg-white rounded-xl border border-gray-200 p-6 text-center">
                    <div class="w-14 h-14 bg-amber-50 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="award" class="w-7 h-7 text-amber-600"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">{{ __('messages.state_registration') }}</h3>
                    <p class="text-sm text-gray-500 mb-4">{{ __('messages.state_registration_desc') }}</p>
                    <a href="{{ asset('documents/guvohnoma.pdf') }}" target="_blank"
                       class="inline-flex items-center gap-2 text-sm font-medium text-amber-700 bg-amber-50 hover:bg-amber-100 px-4 py-2 rounded-lg transition">
                        <i data-lucide="eye" class="w-4 h-4"></i> {{ __('messages.view_document') }}
                    </a>
                </div>
            </div>

            <div class="bg-blue-50 rounded-xl border border-blue-100 p-6">
                <div class="flex items-start gap-3">
                    <i data-lucide="info" class="w-5 h-5 text-blue-600 shrink-0 mt-0.5"></i>
                    <div>
                        <h3 class="text-sm font-semibold text-blue-900 mb-1">{{ __('messages.additional_info') }}</h3>
                        <p class="text-sm text-blue-700 leading-relaxed">
                            {{ __('messages.licenses_note') }} <a href="{{ route('contact') }}" class="underline font-medium">{{ __('messages.contact_us') }}</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
