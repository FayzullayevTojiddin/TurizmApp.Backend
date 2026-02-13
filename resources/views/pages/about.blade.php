<x-layouts.app title="Biz haqimizda">
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h1 class="text-3xl font-bold text-gray-900 mb-3">Biz haqimizda</h1>
                <p class="text-gray-500 max-w-xl mx-auto">
                    TurizmApp — O'zbekistonning ishonchli turizm platformasi. Biz sayohatchilar uchun eng yaxshi tajribani yaratamiz.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                @foreach([
                    ['icon' => 'globe', 'title' => '50+ yo\'nalishlar', 'desc' => 'Dunyoning eng go\'zal joylariga sayohat imkoniyatlari'],
                    ['icon' => 'shield-check', 'title' => 'Ishonchli xizmat', 'desc' => '5 yillik tajriba va 500+ mamnun mijozlar'],
                    ['icon' => 'sparkles', 'title' => 'Shaxsiy tur', 'desc' => 'O\'zingiz xohlagan turni yarating, biz amalga oshiramiz'],
                ] as $feature)
                    <div class="bg-white rounded-xl border border-gray-200 p-6">
                        <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center mb-4">
                            <i data-lucide="{{ $feature['icon'] }}" class="w-5 h-5 text-blue-600"></i>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-1.5">{{ $feature['title'] }}</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">{{ $feature['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Bizning missiyamiz</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Biz har bir O'zbekistonlik sayohatchi uchun dunyoni ochiq va qulay qilishni maqsad qilganmiz. Bizning platformamiz orqali siz tayyor tur paketlarni ko'rib, tanlab, band qilishingiz yoki o'zingizga mos shaxsiy sayohat rejasini yaratishingiz mumkin.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Jamoamiz har bir mijozga individual yondashuv bilan xizmat ko'rsatadi. Sizning sayohatingiz unutilmas bo'lishi uchun biz barcha tafsilotlarni o'ylab chiqamiz.
                </p>
            </div>
        </div>
    </section>
</x-layouts.app>