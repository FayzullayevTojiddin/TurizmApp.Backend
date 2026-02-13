<x-layouts.app title="{{ __('messages.register_title') }}">
    <section class="py-20 bg-gray-50">
        <div class="max-w-sm mx-auto px-4">
            <div class="text-center mb-8">
                <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="user-plus" class="w-6 h-6 text-white"></i>
                </div>
                <h1 class="text-xl font-bold text-gray-900">{{ __('messages.register_title') }}</h1>
                <p class="text-sm text-gray-500 mt-1">{{ __('messages.register_desc') }}</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.name') }}</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('name') border-red-400 @enderror">
                        @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.email') }}</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('email') border-red-400 @enderror">
                        @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.password') }}</label>
                        <input type="password" name="password" id="password" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('password') border-red-400 @enderror">
                        @error('password') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">{{ __('messages.confirm_password') }}</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2.5 rounded-lg hover:bg-blue-700 transition text-sm">
                        {{ __('messages.register_title') }}
                    </button>
                </form>
            </div>
            <p class="text-center text-sm text-gray-500 mt-5">
                {{ __('messages.has_account') }} <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">{{ __('messages.login_link') }}</a>
            </p>
        </div>
    </section>
</x-layouts.app>