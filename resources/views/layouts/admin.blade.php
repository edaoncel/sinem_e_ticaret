<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sinem Admin Panel')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo/link_logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        greenPrimary: '#059669', /* Canlı Zümrüt Yeşili */
                        greenDark: '#065f46',
                        greenLight: '#ecfdf5',   /* Çok hafif yeşil arkaplan vurgusu */
                        sidebarBg: '#ffffff'     /* Beyaz Menü */
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#f8fafc] min-h-screen text-slate-800 antialiased selection:bg-emerald-600 selection:text-white" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex">
        
        <!-- MASAÜSTÜ SIDEBAR (BEYAZ & YEŞİL) -->
        <aside class="hidden md:flex flex-col w-64 bg-white text-slate-700 flex-shrink-0 sticky top-0 h-screen border-r border-slate-200 shadow-sm">
            
            <div class="h-20 flex items-center justify-center px-6 bg-white border-b border-slate-100">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                    <img src="{{ asset('img/logo/logo.png') }}" alt="Sinem" class="h-10 w-auto object-contain">
                </a>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Panel Anasayfa
                </a>

                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition {{ request()->routeIs('admin.products.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    Ürün Yönetimi
                </a>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition {{ request()->routeIs('admin.categories.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 11h.01M7 15h.01M11 7h8M11 11h8M11 15h8"></path></svg>
                    Kategori Yönetimi
                </a>

                <a href="{{ route('admin.marketplaces.settings') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition {{ request()->routeIs('admin.marketplaces.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    Pazaryeri Yönetimi
                </a>

                <a href="{{ route('admin.admins.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition {{ request()->routeIs('admin.admins.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Yöneticiler
                </a>

                @php
                    $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
                @endphp

                <a href="{{ route('admin.messages.index') }}" class="flex items-center justify-between px-4 py-3 rounded-2xl hover:bg-slate-50 transition text-xs font-bold uppercase tracking-wider text-slate-600 hover:text-slate-900">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>Gelen Mesajlar</span>
                    </div>
                    @if($unreadCount > 0)
                        <span class="bg-rose-500 text-white text-[9px] font-black px-2 py-0.5 rounded-full shadow-sm animate-pulse">
                            {{ $unreadCount }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('admin.visitors') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition {{ request()->routeIs('admin.visitors') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    Ziyaretçi Logları
                </a>

                <div class="pt-4 border-t border-slate-100 my-2"></div>

                <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    Siteye Git
                </a>
            </nav>

            <div class="p-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                <div class="text-[11px] text-slate-600 truncate">
                    <span class="block font-bold text-slate-900">{{ Auth::guard('admin')->user()->name ?? 'Yönetici' }}</span>
                    Sinem Panel v1.0
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" title="Çıkış Yap" class="p-2.5 bg-white border border-slate-200 hover:bg-rose-50 hover:border-rose-200 hover:text-rose-600 text-slate-600 rounded-xl transition cursor-pointer shadow-xs">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                </form>
            </div>
        </aside>

        <!-- MOBİL ARKA PLAN KARARTMASI -->
        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false" class="fixed inset-0 bg-slate-950/20 z-40 md:hidden backdrop-blur-xs"></div>

        <!-- MOBİL SIDEBAR -->
        <aside x-show="sidebarOpen" x-cloak 
               x-transition:enter="transition ease-out duration-300 transform" 
               x-transition:enter-start="-translate-x-full" 
               x-transition:enter-end="translate-x-0" 
               x-transition:leave="transition ease-in duration-300 transform" 
               x-transition:leave-start="translate-x-0" 
               x-transition:leave-end="-translate-x-full" 
               class="fixed inset-y-0 left-0 w-64 bg-white text-slate-700 z-50 md:hidden flex flex-col shadow-2xl border-r border-slate-200">
            <div class="h-20 flex items-center justify-between px-6 bg-white border-b border-slate-100">
                <span class="font-bold text-slate-900 text-sm uppercase tracking-wider">Sinem Panel</span>
                <button @click="sidebarOpen = false" class="text-slate-400 hover:text-slate-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Panel Anasayfa
                </a>

                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition {{ request()->routeIs('admin.products.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    Ürün Yönetimi
                </a>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition {{ request()->routeIs('admin.categories.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 11h.01M7 15h.01M11 7h8M11 11h8M11 15h8"></path></svg>
                    Kategori Yönetimi
                </a>

                <a href="{{ route('admin.marketplaces.settings') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition {{ request()->routeIs('admin.marketplaces.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    Pazaryeri Yönetimi
                </a>

                <a href="{{ route('admin.admins.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition {{ request()->routeIs('admin.admins.*') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Yöneticiler
                </a>

                <a href="{{ route('admin.messages.index') }}" class="flex items-center justify-between px-4 py-3 rounded-2xl hover:bg-slate-50 transition text-xs font-bold uppercase tracking-wider text-slate-600 hover:text-slate-900">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>Gelen Mesajlar</span>
                    </div>
                    @if($unreadCount > 0)
                        <span class="bg-rose-500 text-white text-[9px] font-black px-2 py-0.5 rounded-full shadow-sm animate-pulse">
                            {{ $unreadCount }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('admin.visitors') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider transition {{ request()->routeIs('admin.visitors') ? 'bg-emerald-50 text-emerald-800 font-black' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    Ziyaretçi Logları
                </a>

                <div class="pt-4 border-t border-slate-100 my-2"></div>

                <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    Siteye Git
                </a>
            </nav>
        </aside>

        <!-- İÇERİK ALANI VE MOBİL HEADER -->
        <div class="flex-1 flex flex-col min-w-0">
            <header class="md:hidden h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 sticky top-0 z-30 shadow-xs">
                <button @click="sidebarOpen = true" class="p-2.5 text-emerald-800 bg-emerald-50 rounded-xl focus:outline-none border border-emerald-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <img src="{{ asset('img/logo/logo.png') }}" alt="Sinem" class="h-10 w-auto object-contain">
                
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs font-bold text-rose-600 bg-rose-50 px-3 py-2 rounded-xl border border-rose-200 uppercase tracking-wider">Çıkış</button>
                </form>
            </header>

            <main class="flex-1 p-6 sm:p-10">
                @yield('content')
            </main>
        </div>

    </div>

</body>
</html>