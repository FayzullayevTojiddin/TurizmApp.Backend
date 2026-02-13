<footer class="bg-gray-900 text-gray-400">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">

            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 mb-4">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <i data-lucide="globe" class="w-5 h-5 text-white"></i>
                    </div>
                    <span class="text-lg font-bold text-white tracking-tight">TurizmApp</span>
                </a>
                <p class="text-sm leading-relaxed">
                    {{ __('messages.footer_desc') }}
                </p>
            </div>

            <div>
                <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-4">{{ __('messages.pages') }}</h4>
                <ul class="space-y-2.5">
                    <li><a href="{{ route('home') }}" class="text-sm hover:text-white transition">{{ __('messages.home') }}</a></li>
                    <li><a href="{{ route('tours.index') }}" class="text-sm hover:text-white transition">{{ __('messages.tours') }}</a></li>
                    <li><a href="{{ route('about') }}" class="text-sm hover:text-white transition">{{ __('messages.about') }}</a></li>
                    <li><a href="{{ route('contact') }}" class="text-sm hover:text-white transition">{{ __('messages.contact') }}</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-4">{{ __('messages.popular_destinations') }}</h4>
                <ul class="space-y-2.5">
                    <li><a href="#" class="text-sm hover:text-white transition">{{ __('messages.turkey') }}</a></li>
                    <li><a href="#" class="text-sm hover:text-white transition">{{ __('messages.dubai') }}</a></li>
                    <li><a href="#" class="text-sm hover:text-white transition">{{ __('messages.egypt') }}</a></li>
                    <li><a href="#" class="text-sm hover:text-white transition">{{ __('messages.malaysia') }}</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold text-sm uppercase tracking-wider mb-4">{{ __('messages.get_in_touch') }}</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-2.5">
                        <i data-lucide="map-pin" class="w-4 h-4 text-blue-400 shrink-0 mt-0.5"></i>
                        <span class="text-sm">Toshkent sh., Amir Temur ko'chasi 1</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <i data-lucide="phone" class="w-4 h-4 text-blue-400 shrink-0"></i>
                        <a href="tel:+998901234567" class="text-sm hover:text-white transition">+998 90 123 45 67</a>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <i data-lucide="mail" class="w-4 h-4 text-blue-400 shrink-0"></i>
                        <a href="mailto:info@turizmapp.uz" class="text-sm hover:text-white transition">info@turizmapp.uz</a>
                    </li>
                </ul>

                <div class="flex items-center gap-2 mt-5">
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-800 hover:bg-blue-600 transition">
                        <i data-lucide="facebook" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-800 hover:bg-pink-600 transition">
                        <i data-lucide="instagram" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-800 hover:bg-blue-500 transition">
                        <i data-lucide="send" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-800 hover:bg-red-600 transition">
                        <i data-lucide="youtube" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 py-6 flex flex-col sm:flex-row items-center justify-between gap-2">
            <p class="text-sm text-gray-500">&copy; {{ date('Y') }} TurizmApp. {{ __('messages.all_rights') }}</p>
            <div class="flex items-center gap-4">
                <a href="#" class="text-sm text-gray-500 hover:text-gray-300 transition">{{ __('messages.privacy_policy') }}</a>
                <a href="#" class="text-sm text-gray-500 hover:text-gray-300 transition">{{ __('messages.terms') }}</a>
            </div>
        </div>
    </div>
</footer>