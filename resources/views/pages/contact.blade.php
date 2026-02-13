<x-layouts.app title="Aloqa">
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold text-gray-900 mb-3">Bog'lanish</h1>
                <p class="text-gray-500">Savollaringiz bormi? Biz bilan bog'laning</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-12">
                <div class="bg-white rounded-xl border border-gray-200 p-5 text-center">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="phone" class="w-5 h-5 text-blue-600"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">Telefon</h3>
                    <a href="tel:+998901234567" class="text-sm text-blue-600 hover:underline">+998 90 123 45 67</a>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-5 text-center">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="mail" class="w-5 h-5 text-blue-600"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">Email</h3>
                    <a href="mailto:info@turizmapp.uz" class="text-sm text-blue-600 hover:underline">info@turizmapp.uz</a>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-5 text-center">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="map-pin" class="w-5 h-5 text-blue-600"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-900 mb-1">Manzil</h3>
                    <p class="text-sm text-gray-500">Toshkent sh., Amir Temur ko'chasi 1</p>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-8">
                <h2 class="text-lg font-bold text-gray-900 mb-6">Xabar yuborish</h2>
                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Ismingiz</label>
                            <input type="text" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                            <input type="email" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Mavzu</label>
                        <input type="text" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Xabar</label>
                        <textarea rows="5" required
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"></textarea>
                    </div>
                    <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 text-white font-medium px-5 py-2.5 rounded-lg hover:bg-blue-700 transition text-sm">
                        <i data-lucide="send" class="w-4 h-4"></i> Yuborish
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>