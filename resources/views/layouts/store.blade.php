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

    <!-- MODERN FOOTER -->
    <footer id="iletisim" class="bg-[#022c22] text-slate-300 pt-20 pb-12 mt-28 border-t border-emerald-950">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 grid grid-cols-1 md:grid-cols-3 gap-12 text-xs">
            
            <div class="space-y-4">
                <img src="{{ asset('img/logo/logo.png') }}" alt="Sinem" class="h-10 w-auto object-contain">
                <p class="text-emerald-100/70 font-light leading-relaxed">
                    Yenilikçi vizyonumuz ve özenle derlenmiş seçkimizle, en kaliteli alışveriş deneyimini güvenilir pazaryerleri güvencesiyle sunuyoruz.
                </p>
            </div>

            <div class="space-y-4">
                <h3 class="font-bold text-xs uppercase tracking-widest text-white">Hızlı Keşif</h3>
                <ul class="space-y-3 text-emerald-100/70 font-light">
                    <li><a href="{{ url('/') }}" class="hover:text-white transition">Ana Sayfa</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Hakkımızda & İletişim</a></li>
                    
                    <li>
                        <a href="https://www.instagram.com/alveral.tr/" target="_blank" class="hover:text-white transition flex items-center gap-2 group">
                            <svg class="w-4 h-4 text-emerald-400 group-hover:scale-110 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                            </svg>
                            <span>Instagram (@alveral.tr)</span>
                        </a>
                    </li>

                    @auth('admin')
                        <li class="pt-2 border-t border-emerald-900/60">
                            <a href="{{ route('admin.dashboard') }}" class="text-emerald-300 hover:text-white font-bold transition flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Yönetim Paneli</span>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>

            <div class="space-y-4">
                <h3 class="font-bold text-xs uppercase tracking-widest text-white">İletişim</h3>
                <p class="text-emerald-100/70 font-light">Destek ve iş birliği talepleriniz için:</p>
                <a href="mailto:iletisim@alveral.com" class="inline-block text-emerald-300 font-bold hover:text-white transition tracking-wide text-sm">
                    iletisim@alveral.com
                </a>
            </div>

        </div>

        <div class="max-w-7xl mx-auto px-6 sm:px-12 border-t border-emerald-900/60 mt-16 pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-emerald-100/50 font-light gap-4">
            <p>© {{ date('Y') }} Sinem. Tüm hakları saklıdır.</p>
            <a href="https://edaoncel.github.io/edaoncell/project.html" target="_blank" rel="noopener noreferrer" class="hover:text-white transition duration-300 flex items-center gap-2 group">
                <span class="text-emerald-100/50">Sinem Tasarım & Geliştirme:</span>
                <span class="font-bold text-white underline underline-offset-4 decoration-emerald-500 group-hover:text-emerald-300 transition tracking-wider">Eda Öncel</span>
            </a>
        </div>
    </footer>

</body>
</html>