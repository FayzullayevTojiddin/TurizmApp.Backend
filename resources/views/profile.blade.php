<x-layouts.app title="Profil">
    <section class="py-10">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Profil sozlamalari</h1>

            @if(session('success'))
                <div class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg p-3.5 mb-6 text-sm">
                    <i data-lucide="check-circle-2" class="w-4 h-4 shrink-0"></i> {{ session('success') }}
                </div>
            @endif

            {{-- Profil ma'lumotlari --}}
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-5 mb-8">
                @csrf @method('PUT')
                <div class="bg-white rounded-xl border border-gray-200 p-5 space-y-5">
                    <h2 class="text-sm font-semibold text-gray-900 flex items-center gap-2">
                        <i data-lucide="user" class="w-4 h-4 text-gray-400"></i> Shaxsiy ma'lumotlar
                    </h2>

                    <div class="flex items-center gap-4">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=3b82f6&color=fff&bold=true&size=64' }}"
                             alt="" class="w-16 h-16 rounded-full object-cover ring-2 ring-gray-100">
                        <div>
                            <label for="avatar" class="inline-flex items-center gap-1.5 text-sm text-blue-600 hover:text-blue-700 font-medium cursor-pointer">
                                <i data-lucide="camera" class="w-4 h-4"></i> Rasmni o'zgartirish
                            </label>
                            <input type="file" name="avatar" id="avatar" accept="image/*" class="hidden">
                            @error('avatar') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Ism</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('name') border-red-400 @enderror">
                        @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('email') border-red-400 @enderror">
                        @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 text-white font-medium px-5 py-2.5 rounded-lg hover:bg-blue-700 transition text-sm">
                    <i data-lucide="save" class="w-4 h-4"></i> Saqlash
                </button>
            </form>

            {{-- Parolni o'zgartirish --}}
            <form method="POST" action="{{ route('profile.password') }}" class="space-y-5">
                @csrf @method('PUT')
                <div class="bg-white rounded-xl border border-gray-200 p-5 space-y-5">
                    <h2 class="text-sm font-semibold text-gray-900 flex items-center gap-2">
                        <i data-lucide="lock" class="w-4 h-4 text-gray-400"></i> Parolni o'zgartirish
                    </h2>

                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1.5">Joriy parol</label>
                        <input type="password" name="current_password" id="current_password" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('current_password') border-red-400 @enderror">
                        @error('current_password') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Yangi parol</label>
                        <input type="password" name="password" id="password" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('password') border-red-400 @enderror">
                        @error('password') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">Yangi parolni tasdiqlang</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center gap-2 bg-gray-900 text-white font-medium px-5 py-2.5 rounded-lg hover:bg-gray-800 transition text-sm">
                    <i data-lucide="key" class="w-4 h-4"></i> Parolni o'zgartirish
                </button>
            </form>
        </div>
    </section>
</x-layouts.app>