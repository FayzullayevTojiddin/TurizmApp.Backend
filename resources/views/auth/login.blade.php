<x-layouts.app title="Kirish">
    <section class="py-20 bg-gray-50">
        <div class="max-w-sm mx-auto px-4">
            <div class="text-center mb-8">
                <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="lock" class="w-6 h-6 text-white"></i>
                </div>
                <h1 class="text-xl font-bold text-gray-900">Tizimga kirish</h1>
                <p class="text-sm text-gray-500 mt-1">Hisobingizga kiring</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('email') border-red-400 @enderror">
                        @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Parol</label>
                        <input type="password" name="password" id="password" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>
                    <div class="flex items-center">
                        <label class="flex items-center gap-2 text-sm">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="text-gray-600">Eslab qolish</span>
                        </label>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2.5 rounded-lg hover:bg-blue-700 transition text-sm">
                        Kirish
                    </button>
                </form>
            </div>
            <p class="text-center text-sm text-gray-500 mt-5">
                Hisobingiz yo'qmi? <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Ro'yxatdan o'ting</a>
            </p>
        </div>
    </section>
</x-layouts.app>