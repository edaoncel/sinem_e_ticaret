<!DOCTYPE html>
<html lang="tr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sinem')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo/link_logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak] { display: none !important; }</style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        greenPrimary: '#059669',
                        greenDark: '#022c22',
                        greenLight: '#ecfdf5'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#f8faf8] min-h-screen text-slate-800 antialiased flex flex-col justify-between selection:bg-emerald-700 selection:text-white" x-data="{ mobileMenu: false, mobileCatOpen: false }">

    <nav class="bg-white/95 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 h-24 flex justify-between items-center">
            
            <a href="{{ url('/') }}" class="flex items-center">
                <img src="{{ asset('img/logo/logo.png') }}" alt="Sinem" class="h-11 w-auto object-contain">
            </a>

            <div class="hidden md:flex items-center space-x-12 text-xs font-semibold tracking-widest text-slate-700 uppercase">
                <a href="{{ url('/') }}" class="text-emerald-800 hover:text-emerald-600 transition">Ana Sayfa</a>
                <a href="{{ route('contact') }}" class="hover:text-emerald-600 transition">İletişim</a>
            </div>

            <!-- Sağ Butonlar -->
            <div class="flex items-center gap-4">
                @auth('admin')
                    <a href="{{ route('admin.dashboard') }}" class="hidden sm:inline-flex bg-emerald-800 text-white hover:bg-emerald-900 px-6 py-3 rounded-full text-xs font-bold uppercase tracking-wider transition shadow-sm">Yönetim Paneli</a>
                @else
                    <a href="{{ route('admin.login') }}" class="hidden sm:inline-flex border border-slate-300 text-slate-800 hover:bg-slate-900 hover:text-white px-6 py-3 rounded-full text-xs font-bold uppercase tracking-wider transition">Admin Girişi</a>
                @endauth
                
                <button x-on:click="mobileMenu = !mobileMenu" type="button" class="md:hidden p-3 text-slate-800 bg-slate-100 rounded-2xl border border-slate-200 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>

        <!-- Mobil Menü -->
        <div x-show="mobileMenu" x-cloak class="md:hidden bg-white border-b border-slate-200 px-8 py-6 space-y-5 shadow-2xl">
            <a href="{{ url('/') }}" class="block text-sm font-bold text-emerald-800 uppercase tracking-wider">Ana Sayfa</a>

            <div class="pt-2">
                <a href="{{ route('contact') }}" class="block text-sm font-bold text-slate-800 uppercase tracking-wider">İletişim</a>
            </div>
            <div class="pt-4 border-t border-slate-100">
                @auth('admin')
                    <a href="{{ route('admin.dashboard') }}" class="block text-center bg-emerald-800 text-white py-3.5 rounded-full text-xs font-bold uppercase tracking-wider transition">Yönetim Paneli</a>
                @else
                    <a href="{{ route('admin.login') }}" class="block text-center bg-slate-100 text-slate-900 border border-slate-300 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider transition">Admin Girişi</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- SAYFA İÇERİĞİ (Veriler ve Blade Yapısı Kesinlikle Korundu) -->
    <main class="flex-1">
        @yield('content')
    </main>

<footer class="bg-emerald-950 text-emerald-200/80 pt-16 pb-12 border-t border-emerald-900 mt-20">
    <div class="max-w-7xl mx-auto px-6 sm:px-12 grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
        <div class="space-y-3">
            <h3 class="text-white font-bold text-xs tracking-widest uppercase">SİNEM</h3>
            <p class="text-xs font-light leading-relaxed">
                Seçkin ürün kataloğumuz ve güvenilir e-ticaret partnerlerimizle hizmetinizdeyiz.
            </p>
        </div>

        <div>
            <h4 class="text-white font-bold text-xs uppercase tracking-widest mb-4">Hızlı Bağlantılar</h4>
            <ul class="space-y-2 text-xs font-light">
                <li><a href="{{ url('/') }}" class="hover:text-white transition">Anasayfa</a></li>
                <li><a href="{{ url('/#urunler') }}" class="hover:text-white transition">Tüm Ürünler</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-white transition">İletişim</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-bold text-xs uppercase tracking-widest mb-4">Kategoriler</h4>
            <ul class="space-y-2 text-xs font-light">
                @if(isset($categories))
                    @foreach($categories as $cat)
                        <li><a href="{{ url('/?category=' . $cat->slug . '#urunler') }}" class="hover:text-white transition">{{ $cat->name }}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
        
        <div>
            <h3 class="font-bold text-xs uppercase tracking-widest mb-4 text-white">Sosyal Medya Hesaplarımız</h3>
                <ul>
                <!-- 1. INSTAGRAM -->
                <li>
                    <a href="https://www.instagram.com/alveral.tr/" target="_blank" class="hover:text-white transition flex items-center gap-2 group">
                        <svg class="w-4 h-4 text-brandOrange group-hover:scale-110 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                        </svg>
                        <span>Instagram (@alveral.tr)</span>
                    </a>
                </li>

                <!-- 2. FACEBOOK -->
                <li class="mt-2">
                    <a href="https://www.facebook.com/share/19GHvLb4DJ/" target="_blank" class="hover:text-white transition flex items-center gap-2 group">
                        <svg class="w-4 h-4 text-brandOrange group-hover:scale-110 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span>Facebook (Alveral)</span>
                    </a>
                </li>

                <!-- 3. TIKTOK -->
                <li class="mt-2">
                    <a href="https://www.tiktok.com/@alveral.tr" target="_blank" class="hover:text-white transition flex items-center gap-2 group">
                        <svg class="w-4 h-4 text-brandOrange group-hover:scale-110 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.13z"/>
                        </svg>
                        <span>TikTok (@alveral.tr)</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 sm:px-12 pt-8 border-t border-emerald-900/60 flex flex-col sm:flex-row items-center justify-between text-xs font-light">
        <p>&copy; {{ date('Y') }} Sinem. Tüm hakları saklıdır.</p>
        <a href="https://edaoncel.github.io/edaoncell/project.html" target="_blank" rel="noopener noreferrer" class="mt-4 hover:text-white transition duration-300 flex items-center gap-2 group">
            <span class="text-gray-300">Sinem Tasarım & Geliştirme:</span>
            <span class="font-bold text-white underline underline-offset-4 decoration-brandOrange group-hover:text-brandOrange transition tracking-wider">Eda Öncel</span>
        </a>
    </div>
</footer>

</body>
</html>