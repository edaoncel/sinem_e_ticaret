@extends('layouts.store')

@section('title', 'Sinem - İletişim & Kurumsal Destek')

@section('content')

<!-- MODERN HERO / ASİMETRİK BAŞLIK -->
<header class="bg-emerald-950 text-white py-24 px-6 relative overflow-hidden">
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-emerald-800/30 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-emerald-900/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl mx-auto relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-8 space-y-6">
            <span class="inline-flex items-center gap-2 text-emerald-300 bg-emerald-900/60 border border-emerald-700/40 px-4 py-2 rounded-xl text-xs font-bold tracking-widest uppercase shadow-sm">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Güvenli Pazar Yeri Çözüm Ortağınız</span>
            </span>
            <h1 class="text-4xl sm:text-6xl font-black tracking-tight leading-none uppercase">
                Kurumsal İletişim & <span class="text-emerald-400">Destek Merkezi</span>
            </h1>
            <p class="text-emerald-100/70 text-base sm:text-lg font-light leading-relaxed max-w-2xl">
                Sinem olarak; Türkiye’nin lider pazaryerleri entegrasyonu ve seçkin ürün portföyümüzle, sizlere en kusursuz dijital alışveriş deneyimini sunuyoruz.
            </p>
        </div>
        
        <div class="lg:col-span-4 bg-emerald-900/40 border border-emerald-800/50 p-6 rounded-3xl backdrop-blur-md space-y-4">
    <h3 class="text-xs font-black uppercase tracking-widest text-emerald-300">Hızlı Erişim Kanalları</h3>
    <ul class="space-y-3 text-sm font-medium">
        <!-- Destek Formu -->
        <li>
            <a href="#bize-ulasin" class="flex items-center justify-between p-3 rounded-xl bg-emerald-950/60 hover:bg-emerald-800/60 transition">
                <span>Destek Formu</span>
                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </a>
        </li>
        <!-- Instagram -->
        <li>
            <a href="https://www.instagram.com/alveral.tr/" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between p-3 rounded-xl bg-emerald-950/60 hover:bg-emerald-800/60 transition">
                <span>Instagram (@alveral.tr)</span>
                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </li>
        <!-- Facebook -->
        <li>
            <a href="https://www.facebook.com/alveral.tr/" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between p-3 rounded-xl bg-emerald-950/60 hover:bg-emerald-800/60 transition">
                <span>Facebook (Alveral TR)</span>
                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </li>
        <!-- TikTok -->
        <li>
            <a href="https://www.tiktok.com/@alveral.tr" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between p-3 rounded-xl bg-emerald-950/60 hover:bg-emerald-800/60 transition">
                <span>TikTok (@alveral.tr)</span>
                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </li>
    </ul>
</div>
    </div>
</header>

<!-- ANA İÇERİK ALANI -->
<main class="max-w-6xl mx-auto px-4 sm:px-8 py-20 w-full space-y-20">
    
    <!-- VİZYON & PAZARYERİ ÖZELLİK BLOKLARI -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="bg-gradient-to-br from-slate-900 to-slate-950 text-white p-8 rounded-3xl shadow-xl space-y-4 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl"></div>
            <div class="w-12 h-12 bg-emerald-900/60 border border-emerald-700/50 rounded-2xl flex items-center justify-center text-emerald-400 text-xl font-black">
                01
            </div>
            <h3 class="text-xl font-bold tracking-tight">Güvenli Pazaryerleri</h3>
            <p class="text-xs text-slate-300 font-light leading-relaxed">
                Tüm sipariş ve teslimat süreçlerinizi en güvenilir ulusal pazar yerleri altyapısıyla destekliyor, tam güvence sağlıyoruz.
            </p>
        </div>

        <div class="bg-gradient-to-br from-slate-900 to-slate-950 text-white p-8 rounded-3xl shadow-xl space-y-4 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl"></div>
            <div class="w-12 h-12 bg-emerald-900/60 border border-emerald-700/50 rounded-2xl flex items-center justify-center text-emerald-400 text-xl font-black">
                02
            </div>
            <h3 class="text-xl font-bold tracking-tight">Seçkin Ürün Seçkisi</h3>
            <p class="text-xs text-slate-300 font-light leading-relaxed">
                Yüksek kalite standartlarına sahip popüler ürünleri kategorize ederek en avantajlı fiyat politikasıyla sunuyoruz.
            </p>
        </div>

        <div class="bg-gradient-to-br from-slate-900 to-slate-950 text-white p-8 rounded-3xl shadow-xl space-y-4 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl"></div>
            <div class="w-12 h-12 bg-emerald-900/60 border border-emerald-700/50 rounded-2xl flex items-center justify-center text-emerald-400 text-xl font-black">
                03
            </div>
            <h3 class="text-xl font-bold tracking-tight">Hızlı Çözüm Ağı</h3>
            <p class="text-xs text-slate-300 font-light leading-relaxed">
                Müşteri memnuniyetini en üst düzeyde tutan dinamik ekibimizle, taleplerinize en kısa sürede profesyonel çözümler üretiyoruz.
            </p>
        </div>

    </div>

    <!-- İKİ SÜTUNLU İLETİŞİM & SOSYAL MEDYA ALANI -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        
        <!-- FORM BÖLÜMÜ -->
        <div id="bize-ulasin" class="lg:col-span-7 bg-white border border-slate-200 p-10 rounded-3xl shadow-2xl scroll-mt-24">
            <div class="mb-8">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-700 bg-emerald-50 px-3 py-1 rounded-md border border-emerald-100">Bize Ulaşın</span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 mt-2">Mesaj Gönderin</h2>
                <p class="text-xs text-slate-500 mt-1">Sorularınız, önerileriniz veya iş birliği talepleriniz için formu doldurabilirsiniz.</p>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold rounded-2xl flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Adınız Soyadınız *</label>
                    <input type="text" name="name" required placeholder="Adınız Soyadınız" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm text-slate-800 focus:outline-none focus:border-emerald-700 focus:bg-white transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">E-Posta Adresiniz *</label>
                    <input type="email" name="email" required placeholder="ornek@domain.com" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm text-slate-800 focus:outline-none focus:border-emerald-700 focus:bg-white transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Konu</label>
                    <input type="text" name="subject" placeholder="Mesajınızın konusu nedir?" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm text-slate-800 focus:outline-none focus:border-emerald-700 focus:bg-white transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Mesajınız *</label>
                    <textarea name="message" rows="4" required placeholder="Mesajınızı buraya yazabilirsiniz..." class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-sm text-slate-800 focus:outline-none focus:border-emerald-700 focus:bg-white transition resize-none"></textarea>
                </div>
                <!-- KVKK Onay Kutusu -->
                <div class="flex items-start gap-3 pt-2">
                    <input type="checkbox" name="kvkk" id="kvkk" required class="mt-0.5 rounded border-slate-300 text-brandOrange focus:ring-brandOrange cursor-pointer">
                    <label for="kvkk" class="text-xs text-slate-600 leading-relaxed cursor-pointer select-none">
                        <a href="{{ route('kvkk.terms') }}" target="_blank" class="text-brandOrange underline hover:opacity-80 font-semibold">KVKK Aydınlatma Metni</a>'ni okudum, kişisel verilerimin işlenmesini kabul ediyorum.
                    </label>
                </div>
                <button type="submit" class="w-full bg-emerald-900 hover:bg-emerald-950 text-white font-black py-4 rounded-2xl text-xs uppercase tracking-widest transition shadow-lg cursor-pointer">
                    Mesajı Gönder
                </button>
            </form>
        </div>

        <div class="lg:col-span-5 space-y-8">
            
            <div class="bg-white border border-slate-200 p-8 rounded-3xl shadow-xl space-y-6">
    <h3 class="font-black text-xl text-slate-900">Sosyal Medya Dünyamız</h3>
    <p class="text-xs text-slate-500 leading-relaxed font-light">
        En yeni ürün koleksiyonlarımızı, kampanya duyurularımızı ve fırsatlarımızı sosyal medya hesaplarımızdan yakından takip edin.
    </p>

    <div class="space-y-3">
        <!-- INSTAGRAM -->
        <a href="https://www.instagram.com/alveral.tr/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-4 p-4 bg-slate-50 hover:bg-emerald-50 rounded-2xl transition border border-slate-100 group">
            <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-amber-500 via-rose-500 to-purple-600 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-105 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                </svg>
            </div>
            <div>
                <span class="block text-slate-900 group-hover:text-emerald-800 font-black text-sm transition">@alveral.tr</span>
                <span class="text-[11px] text-slate-400 font-normal">Resmi Instagram Sayfası</span>
            </div>
        </a>

        <!-- FACEBOOK -->
        <a href="https://www.facebook.com/alveral.tr/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-4 p-4 bg-slate-50 hover:bg-emerald-50 rounded-2xl transition border border-slate-100 group">
            <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-blue-700 to-blue-500 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-105 transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
            </div>
            <div>
                <span class="block text-slate-900 group-hover:text-emerald-800 font-black text-sm transition">Alveral TR</span>
                <span class="text-[11px] text-slate-400 font-normal">Resmi Facebook Sayfası</span>
            </div>
        </a>

        <!-- TIKTOK -->
        <a href="https://www.tiktok.com/@alveral.tr" target="_blank" rel="noopener noreferrer" class="flex items-center gap-4 p-4 bg-slate-50 hover:bg-emerald-50 rounded-2xl transition border border-slate-100 group">
            <div class="w-11 h-11 rounded-2xl bg-slate-900 flex items-center justify-center text-white shrink-0 shadow-md group-hover:scale-105 transition">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 3 15.68 6.34 6.34 0 0 0 9.34 22a6.34 6.34 0 0 0 6.33-6.32V9.05a8.16 8.16 0 0 0 4.92 1.62V7.24a4.87 4.87 0 0 1-1-.55z"/>
                </svg>
            </div>
            <div>
                <span class="block text-slate-900 group-hover:text-emerald-800 font-black text-sm transition">@alveral.tr</span>
                <span class="text-[11px] text-slate-400 font-normal">Resmi TikTok Sayfası</span>
            </div>
        </a>
    </div>
</div>

            <div class="bg-emerald-950 text-white p-8 rounded-3xl shadow-xl space-y-4">
                <div class="w-8 h-8 rounded-lg bg-emerald-800 flex items-center justify-center text-emerald-200 font-bold text-xs">
                    ✓
                </div>
                <h4 class="font-bold text-sm uppercase tracking-wider text-emerald-300">Güvenilir Alışveriş Sözü</h4>
                <p class="text-xs text-emerald-100/70 font-light leading-relaxed">
                    Sinem platformu olarak müşterilerimize her zaman şeffaf, güvenli ve hızlı bir e-ticaret ekosistemi sunmaktan gurur duyuyoruz.
                </p>
            </div>

        </div>

    </div>
</main>
@endsection