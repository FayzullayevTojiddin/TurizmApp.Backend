<x-layouts.app title="{{ __('messages.contact') }}">
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold text-gray-900 mb-3">{{ __('messages.contact_title') }}</h1>
                <p class="text-gray-500">{{ __('messages.contact_desc') }}</p>
            </div>

            @if(session('success'))
                <div class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg p-3.5 mb-6 text-sm">
                    <i data-lucide="check-circle-2" class="w-4 h-4 shrink-0"></i> {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-12">
                <div class="bg-white rounded-xl border border-gray-200 p-5 text-center">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="phone" class="w-5 h-5 text-blue-600"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">{{ __('messages.phone') }}</h3>
                    <a href="tel:+998995712463" class="text-sm text-blue-600 hover:underline">+998 99 571 24 63</a>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-5 text-center">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="mail" class="w-5 h-5 text-blue-600"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">{{ __('messages.email') }}</h3>
                    <a href="mailto:Alalhaq1@mail.ru" class="text-sm text-blue-600 hover:underline">Alalhaq1@mail.ru</a>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-5 text-center">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="map-pin" class="w-5 h-5 text-blue-600"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">{{ __('messages.address') }}</h3>
                    <p class="text-sm text-gray-500">Surxondaryo viloyati, Uzun tumani</p>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-8">
                <h2 class="text-lg font-bold text-gray-900 mb-6">{{ __('messages.send_message') }}</h2>
                <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="contact_name" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.your_name') }}</label>
                            <input type="text" name="name" id="contact_name" required
                                   value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.email') }}</label>
                            <input type="email" name="email" id="contact_email" required
                                   value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="contact_subject" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.subject') }}</label>
                        <input type="text" name="subject" id="contact_subject" required
                               value="{{ old('subject') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('subject') border-red-500 @enderror">
                        @error('subject')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="contact_message" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.message') }}</label>
                        <textarea name="message" id="contact_message" rows="5" required
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 text-white font-medium px-5 py-2.5 rounded-lg hover:bg-blue-700 transition text-sm">
                        <i data-lucide="send" class="w-4 h-4"></i> {{ __('messages.send') }}
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>
