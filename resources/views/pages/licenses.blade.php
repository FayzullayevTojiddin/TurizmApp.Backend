<x-layouts.app title="{{ __('messages.licenses') }}">
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold text-gray-900 mb-3">{{ __('messages.licenses') }}</h1>
                <p class="text-gray-500">{{ __('messages.licenses_desc') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-emerald-50 rounded-lg flex items-center justify-center shrink-0">
                            <i data-lucide="file-check" class="w-6 h-6 text-emerald-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">{{ __('messages.tourism_license') }}</h3>
                            <p class="text-sm text-gray-500 mb-3">{{ __('messages.tourism_license_desc') }}</p>
                            <div class="space-y-1.5 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.license_number') }}</span>
                                    <span class="font-medium text-gray-900">№ 12345</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.issued_date') }}</span>
                                    <span class="font-medium text-gray-900">15.03.2020</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.valid_until') }}</span>
                                    <span class="font-medium text-gray-900">{{ __('messages.unlimited') }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.status') }}</span>
                                    <span class="inline-flex items-center gap-1 text-emerald-700 font-medium">
                                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> {{ __('messages.active') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center shrink-0">
                            <i data-lucide="award" class="w-6 h-6 text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">{{ __('messages.iata_title') }}</h3>
                            <p class="text-sm text-gray-500 mb-3">{{ __('messages.iata_desc') }}</p>
                            <div class="space-y-1.5 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.certificate_number') }}</span>
                                    <span class="font-medium text-gray-900">IATA-2024-UZ-001</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.issued_date') }}</span>
                                    <span class="font-medium text-gray-900">10.01.2024</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.valid_until') }}</span>
                                    <span class="font-medium text-gray-900">10.01.2027</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.status') }}</span>
                                    <span class="inline-flex items-center gap-1 text-emerald-700 font-medium">
                                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> {{ __('messages.active') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-violet-50 rounded-lg flex items-center justify-center shrink-0">
                            <i data-lucide="shield-check" class="w-6 h-6 text-violet-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">{{ __('messages.insurance_title') }}</h3>
                            <p class="text-sm text-gray-500 mb-3">{{ __('messages.insurance_desc') }}</p>
                            <div class="space-y-1.5 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.contract_number') }}</span>
                                    <span class="font-medium text-gray-900">SA-2023/456</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.issued_date') }}</span>
                                    <span class="font-medium text-gray-900">01.06.2023</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.valid_until') }}</span>
                                    <span class="font-medium text-gray-900">01.06.2026</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.status') }}</span>
                                    <span class="inline-flex items-center gap-1 text-emerald-700 font-medium">
                                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> {{ __('messages.active') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-amber-50 rounded-lg flex items-center justify-center shrink-0">
                            <i data-lucide="stamp" class="w-6 h-6 text-amber-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">{{ __('messages.state_registration') }}</h3>
                            <p class="text-sm text-gray-500 mb-3">{{ __('messages.state_registration_desc') }}</p>
                            <div class="space-y-1.5 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.tin') }}</span>
                                    <span class="font-medium text-gray-900">301 234 567</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.registration_date') }}</span>
                                    <span class="font-medium text-gray-900">20.01.2019</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.org_form') }}</span>
                                    <span class="font-medium text-gray-900">MChJ</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">{{ __('messages.status') }}</span>
                                    <span class="inline-flex items-center gap-1 text-emerald-700 font-medium">
                                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> {{ __('messages.active') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
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