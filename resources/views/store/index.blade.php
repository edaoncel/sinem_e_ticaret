<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinem - E - Ticaret Resmi Satış Sitesi</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo/link_logo.png') }}">
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        greenDark: '#064e3b',
                        greenPrimary: '#059669',
                        greenLight: '#ecfdf5',
                        greenAccent: '#10b981'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-[#f4f7f5] min-h-screen text-slate-800 antialiased flex flex-col justify-between selection:bg-emerald-700 selection:text-white" x-data="{ mobileMenu: false, mobileCatOpen: false }">

<div>
<nav class="bg-white/90 backdrop-blur-md border-b border-emerald-100 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 h-20 flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center">
                <img src="{{ asset('img/logo/logo.png') }}" alt="Sinem" class="h-10 sm:h-12 w-auto object-contain">
            </a>

<!-- Masaüstü Menü -->
<div class="hidden md:flex items-center space-x-6 text-xs font-semibold tracking-widest text-slate-700 uppercase">
    <a href="{{ url('/') }}" class="text-emerald-700 hover:text-emerald-900 transition">ANASAYFA</a>
    
    @php
        $menuCategories = \App\Models\Category::where('show_in_menu', true)->get();
    @endphp

    @foreach($menuCategories as $menuCat)
        <a href="{{ url('/?category=' . $menuCat->slug . '#urunler') }}" 
           class="group relative inline-flex items-center gap-2 px-3.5 py-1.5 rounded-2xl bg-gradient-to-r from-amber-500/10 via-rose-500/10 to-amber-500/10 border border-amber-300 text-amber-900 font-extrabold hover:shadow-md hover:shadow-amber-500/20 hover:scale-105 transition-all duration-300">
            
            <!-- Yanıp Sönen Sinyal Noktası -->
            <span class="relative flex h-2 w-2">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2 w-2 bg-rose-600"></span>
            </span>

            <span>{{ $menuCat->name }}</span>

            <!-- Minik Parlayan "ÖZEL" Rozeti -->
            <span class="bg-gradient-to-r from-rose-600 to-amber-600 text-white text-[8px] font-black px-1.5 py-0.5 rounded-full shadow-xs animate-pulse">
                ÖZEL
            </span>
        </a>
    @endforeach

    <a href="{{ route('contact') }}" class="hover:text-emerald-700 transition">İLETİŞİM</a>

    @auth('admin')
        <a href="{{ route('admin.dashboard') }}" class="bg-emerald-800 text-white px-5 py-2.5 rounded-full hover:bg-emerald-900 transition text-[11px]">Panel</a>
    @else
        <a href="{{ route('admin.login') }}" class="border border-emerald-700 text-emerald-800 px-5 py-2.5 rounded-full hover:bg-emerald-800 hover:text-white transition text-[11px]">Giriş Yap</a>
    @endauth
</div>

            <!-- Mobil Hamburger Butonu -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenu = !mobileMenu" class="p-2.5 rounded-2xl bg-emerald-50 text-emerald-900 border border-emerald-200 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenu" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- MOBİL AÇILIR MENÜ -->
        <div x-show="mobileMenu" x-cloak 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden bg-white border-b border-emerald-100 px-6 py-6 space-y-4 shadow-2xl">
            
            <a href="{{ url('/') }}" class="block text-sm font-bold text-emerald-800">ANASAYFA</a>
            
            <div class="border-y border-amber-100 py-3 my-2 bg-amber-50/40 px-3 rounded-xl">
                <span class="text-[10px] font-bold text-amber-700 uppercase tracking-wider block mb-2">✨ Özel Menü Kategorileri</span>
                <div class="space-y-2">
                    @php
                        $menuCategories = \App\Models\Category::where('show_in_menu', true)->get();
                    @endphp
                    @foreach($menuCategories as $menuCat)
                        <a href="{{ url('/?category=' . $menuCat->slug . '#urunler') }}" class="block text-xs font-bold text-slate-700 hover:text-amber-600 pl-2">
                            • {{ $menuCat->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('contact') }}" class="block text-sm font-bold text-slate-700">İLETİŞİM</a>

            <div class="pt-2 border-t border-slate-100">
                @auth('admin')
                    <a href="{{ route('admin.dashboard') }}" class="block text-center bg-emerald-800 text-white py-3 rounded-2xl text-xs font-bold uppercase tracking-wider shadow-md">Panel</a>
                @else
                    <a href="{{ route('admin.login') }}" class="block text-center bg-emerald-50 text-emerald-900 border border-emerald-200 py-3 rounded-2xl text-xs font-bold uppercase tracking-wider">Giriş Yap</a>
                @endauth
            </div>
        </div>
    </nav>

   
    <header class="bg-gradient-to-b from-emerald-900 to-emerald-950 text-white py-16 px-6 text-center relative overflow-hidden">
        <div class="max-w-3xl mx-auto relative z-10">
            <span class="text-emerald-300 uppercase tracking-widest text-[10px] font-extrabold bg-emerald-800/50 px-3.5 py-1.5 rounded-full border border-emerald-700/50 inline-block mb-3">
                Resmi Satış Mağazası
            </span>
            <h1 class="text-3xl sm:text-5xl font-light tracking-tight text-white uppercase mb-4">
                Seçkin Koleksiyonlar
            </h1>
            <p class="text-emerald-100/80 text-xs sm:text-sm font-light max-w-xl mx-auto leading-relaxed mb-8">
                Sinem olarak özenle tasarlanan ürünleri yüksek kalite anlayışıyla sunuyoruz. Beğendiğiniz parçayı dilediğiniz anlaşmalı e-ticaret platformumuzdan güvenle temin edebilirsiniz.
            </p>

            <!-- Arama Alanı -->
            <form action="{{ url('/') }}#urunler" method="GET" class="flex items-center bg-white p-2 rounded-full shadow-2xl max-w-xl mx-auto border-2 border-emerald-400/30">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Aradığınız ürünü veya kategoriyi yazın..." class="w-full px-5 py-2.5 rounded-full text-slate-800 focus:outline-none text-xs font-medium placeholder-slate-400">
                <button type="submit" class="bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition shrink-0">
                    Keşfet
                </button>
            </form>
        </div>
    </header>

    <!-- PAZARYERİ LOGO BANNERI -->
    <div class="bg-white border-b border-emerald-100 py-5 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 flex flex-col sm:flex-row items-center justify-between gap-4">
            <span class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
                Güvendiğiniz Mağazalarımız:
            </span>
            <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-8">
                <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-orange-50 border border-orange-200 text-orange-600 font-extrabold text-xs">
                    <span class="w-2 h-2 rounded-full bg-orange-500"></span> Trendyol
                </div>
                <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-amber-50 border border-amber-200 text-amber-600 font-extrabold text-xs">
                    <span class="w-2 h-2 rounded-full bg-amber-500"></span> Hepsiburada
                </div>
            </div>
        </div>
    </div>

    <!-- ANA MAĞAZA DÜZENİ -->
    <main x-data="{ openModal: false, product: null }" class="max-w-7xl mx-auto px-6 sm:px-12 py-12">

        <!-- AVANTAJLAR GRIDI -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-5 rounded-3xl border border-emerald-100 shadow-sm flex items-center gap-4">
                <div class="w-11 h-11 rounded-2xl bg-emerald-50 text-emerald-800 flex items-center justify-center text-lg shrink-0">🚚</div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-slate-900">Hızlı & Güvenli Kargo</h4>
                    <p class="text-[11px] text-slate-500 font-light mt-0.5">Pazaryeri güvencesiyle aynı gün kargo imkanı.</p>
                </div>
            </div>
            
            <div class="bg-white p-5 rounded-3xl border border-emerald-100 shadow-sm flex items-center gap-4">
                <div class="w-11 h-11 rounded-2xl bg-emerald-50 text-emerald-800 flex items-center justify-center text-lg shrink-0">🔒</div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-slate-900">Kolay İade Garantisi</h4>
                    <p class="text-[11px] text-slate-500 font-light mt-0.5">Sorunsuz ve şeffaf iade / değişim süreçleri.</p>
                </div>
            </div>

            <div class="bg-white p-5 rounded-3xl border border-emerald-100 shadow-sm flex items-center gap-4">
                <div class="w-11 h-11 rounded-2xl bg-emerald-50 text-emerald-800 flex items-center justify-center text-lg shrink-0">💯</div>
                <div>
                    <h4 class="font-bold text-xs uppercase tracking-wider text-slate-900">Orijinal Ürünler</h4>
                    <p class="text-[11px] text-slate-500 font-light mt-0.5">Özenle seçilmiş %100 orijinal kalite.</p>
                </div>
            </div>
        </div>

<div class="grid grid-cols-1 lg:grid-cols-4 gap-6 lg:gap-10">
        
    <!-- 🌟 NORMAL KATEGORİ ALANI 🌟 -->
    <aside class="lg:col-span-1 space-y-6" x-data="{ catOpen: false }">
        
        <div class="lg:hidden">
            <button @click="catOpen = !catOpen" class="w-full bg-white border border-emerald-100 rounded-2xl px-5 py-3.5 shadow-sm flex items-center justify-between text-xs font-bold text-slate-900 uppercase tracking-widest focus:outline-none">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    Kategori Filtrele
                </span>
                <svg class="w-4 h-4 text-slate-500 transition-transform duration-300" :class="catOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
        </div>

        <div class="bg-white border border-emerald-100 rounded-3xl p-5 sm:p-6 shadow-sm"
            :class="catOpen ? 'block' : 'hidden lg:block'" 
            x-cloak.lg>
            
            <h3 class="text-xs font-bold text-slate-900 uppercase tracking-widest mb-4 pb-3 border-b border-slate-100 flex items-center justify-between">
                Kategoriler
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            </h3>
            
            <div class="space-y-1.5">
                <a href="{{ url('/#urunler') }}" class="block px-4 py-2.5 rounded-2xl text-xs font-bold {{ !request('category') ? 'bg-emerald-800 text-white' : 'text-slate-700 hover:bg-emerald-50' }} transition">
                    Tüm Ürünler
                </a>
                @if(isset($categories))
                    @foreach($categories as $cat)
                        <a href="{{ url('/?category=' . $cat->slug . '#urunler') }}" class="flex items-center justify-between px-4 py-2.5 rounded-2xl text-xs font-medium {{ request('category') === $cat->slug ? 'bg-emerald-800 text-white font-bold' : 'text-slate-600 hover:bg-emerald-50' }} transition">
                            <span class="truncate pr-2">{{ $cat->name }}</span>
                            <span class="text-[10px] opacity-70 px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-900 shrink-0">{{ $cat->products->count() ?? 0 }}</span>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="bg-emerald-900 text-white rounded-3xl p-5 sm:p-6 shadow-md border border-emerald-800 hidden lg:block">
            <span class="bg-emerald-800 text-emerald-200 text-[10px] uppercase font-bold tracking-widest px-3 py-1 rounded-full inline-block mb-3">Güvenli Yönlendirme</span>
            <h4 class="text-xs font-bold uppercase tracking-wider mb-1">Orijinal Ürün Garantisi</h4>
            <p class="text-[11px] text-emerald-200/80 font-light leading-relaxed">Beğendiğiniz ürünü pazaryeri mağazalarımızdan tercih ettiğiniz ödeme yöntemiyle güvenle sipariş edin.</p>
        </div>
    </aside>

    <section class="lg:col-span-3 space-y-10 sm:space-y-14">

        @php
            $menuCategorySlugs = \App\Models\Category::where('show_in_menu', true)->pluck('slug')->toArray();
            $currentCatSlug = isset($category) && $category ? $category->slug : request('category');
            $isSpecialMenuCategory = in_array($currentCatSlug, $menuCategorySlugs);
        @endphp

        <!-- TÜM ÜRÜNLER VİTRİNİ -->
        <div id="urunler" class="scroll-mt-28">
            
            <div class="mb-5 sm:mb-6 pb-3 border-b border-slate-200 flex items-center justify-between">
                <div>
                    <span class="{{ $isSpecialMenuCategory ? 'text-amber-600' : 'text-emerald-700' }} font-bold uppercase tracking-widest text-[10px] block mb-0.5">
                        {{ $isSpecialMenuCategory ? 'Özel Seçki Koleksiyonu' : 'Katalog' }}
                    </span>
                    <h2 class="text-lg sm:text-2xl font-light tracking-tight text-slate-900 uppercase">
                        {{ isset($category) && $category ? $category->name : 'Ürünler' }}
                    </h2>
                </div>
                <!-- Toplam sayısı paginate için total() olarak güncellendi -->
                <span class="text-xs text-slate-500 font-mono">Toplam: <strong class="{{ $isSpecialMenuCategory ? 'text-amber-700' : 'text-emerald-800' }}">{{ isset($products) ? $products->total() : 0 }}</strong></span>
            </div>

            <!-- ÜRÜN GRID YAPISI -->
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                @forelse($products as $product)
                    <div class="relative group">
                        
                        @if($isSpecialMenuCategory)
                            <div class="absolute -inset-1 rounded-3xl bg-gradient-to-r from-amber-400 via-amber-200 to-yellow-400 opacity-60 blur-lg group-hover:opacity-100 transition duration-700 animate-pulse pointer-events-none"></div>
                        @endif

                        <div class="relative bg-white {{ $isSpecialMenuCategory ? 'border-2 border-amber-300 shadow-lg' : 'border border-emerald-100/80 shadow-sm' }} rounded-2xl sm:rounded-3xl p-2.5 sm:p-4 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 h-full">
                            
                            @if($isSpecialMenuCategory)
                                <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 bg-amber-500 text-white text-[7px] sm:text-[9px] font-black uppercase tracking-widest px-2 py-0.5 sm:px-3 sm:py-1 rounded-full shadow-sm z-20 flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-ping"></span>
                                    ÖZEL
                                </div>
                            @endif

                            <div>
                                <!-- RESİM SLİDER BÖLÜMÜ -->
                                <div class="h-36 sm:h-60 bg-slate-50 rounded-xl sm:rounded-2xl overflow-hidden mb-2.5 sm:mb-4 relative select-none" 
                                     x-data="{ active: 0, images: {{ json_encode($product->images ?? []) }} }">
                                    
                                    @if($product->images && count($product->images) > 0)
                                        <template x-for="(img, idx) in images" :key="idx">
                                            <div x-show="active === idx" class="absolute inset-0 w-full h-full transition-opacity duration-300">
                                                <img :src="'{{ asset('') }}' + img" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                            </div>
                                        </template>

                                        <template x-if="images.length > 1">
                                            <div>
                                                <button @click.stop="active = (active === 0) ? images.length - 1 : active - 1" 
                                                        class="absolute left-1 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/70 text-white p-1 rounded-full opacity-0 group-hover:opacity-100 transition duration-200 z-10 focus:outline-none">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                                                </button>
                                                <button @click.stop="active = (active === images.length - 1) ? 0 : active + 1" 
                                                        class="absolute right-1 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/70 text-white p-1 rounded-full opacity-0 group-hover:opacity-100 transition duration-200 z-10 focus:outline-none">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                                </button>
                                                <div class="absolute bottom-2 left-0 right-0 flex justify-center gap-1 z-10">
                                                    <template x-for="(img, idx) in images" :key="idx">
                                                        <button @click.stop="active = idx" 
                                                                class="w-1.5 h-1.5 rounded-full transition-all duration-300"
                                                                :class="active === idx ? 'bg-white w-3' : 'bg-white/60'">
                                                        </button>
                                                    </template>
                                                </div>
                                            </div>
                                        </template>
                                    @else
                                        <div class="flex items-center justify-center h-full text-slate-400 text-[10px] sm:text-xs">Görsel Yok</div>
                                    @endif
                                </div>

                                <h3 class="font-bold text-slate-900 text-xs sm:text-sm line-clamp-1 mb-1">{{ $product->name }}</h3>
                                <p class="text-slate-500 text-[10px] sm:text-xs line-clamp-2 font-light mb-2.5 sm:mb-4">{{ $product->description ?? 'Özel tasarım.' }}</p>
                            </div>

                            <div class="pt-2 sm:pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
                                <div class="min-w-0">
                                    @if($product->discount_price && $product->price > 0)
                                        <span class="text-xs sm:text-base font-bold truncate block {{ $isSpecialMenuCategory ? 'text-amber-600' : 'text-emerald-800' }}">{{ number_format($product->discount_price, 2) }} ₺</span>
                                        <span class="text-[9px] sm:text-[10px] text-slate-400 line-through truncate block">{{ number_format($product->price, 2) }} ₺</span>
                                    @else
                                        <span class="text-xs sm:text-base font-bold text-slate-900 truncate block">{{ number_format($product->price, 2) }} ₺</span>
                                    @endif
                                </div>
                                
                                <button @click="openModal = true; product = JSON.parse($el.getAttribute('data-product'))"
                                        data-product="{{ json_encode([
                                            'name' => $product->name,
                                            'trendyol_url' => $product->trendyol_url,
                                            'hepsiburada_url' => $product->hepsiburada_url,
                                            'idefix_url' => $product->idefix_url,
                                            'amazon_url' => $product->amazon_url,
                                            'pazarama_url' => $product->pazarama_url
                                        ]) }}"
                                        class="{{ $isSpecialMenuCategory ? 'bg-amber-500 hover:bg-amber-600 shadow-md shadow-amber-500/20' : 'bg-emerald-800 hover:bg-emerald-900' }} text-white px-2.5 py-1.5 sm:px-4 sm:py-2 rounded-xl text-[10px] sm:text-xs font-bold uppercase transition shrink-0">
                                    İncele
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center bg-white border border-emerald-100 rounded-3xl text-slate-400 text-xs uppercase tracking-widest">
                        Aradığınız kriterlere uygun ürün bulunamadı.
                    </div>
                @endforelse
            </div>

            <!-- 🌟 SAYFALAMA (PAGINATION) DÜĞMELERİ 🌟 -->
            @if(isset($products) && method_exists($products, 'links') && $products->hasPages())
                <div class="mt-8 flex justify-center">
                    {{ $products->links() }}
                </div>
            @endif

        </div>

    </section>
</div>

<!-- KATEGORİ KAYDIRMA ALANI -->
<section class="mt-10 sm:mt-12 bg-white border border-emerald-100 rounded-3xl p-4 sm:p-6 shadow-sm"
         x-data="{
             autoScroll: null,
             startAutoScroll() {
                 this.autoScroll = setInterval(() => {
                     const slider = $refs.catSlider;
                     if (!slider) return;
                     if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 10) {
                         slider.scrollTo({ left: 0, behavior: 'smooth' });
                     } else {
                         slider.scrollBy({ left: 200, behavior: 'smooth' });
                     }
                 }, 3000);
             },
             stopAutoScroll() {
                 clearInterval(this.autoScroll);
             }
         }"
         x-init="startAutoScroll()"
         @mouseenter="stopAutoScroll()"
         @mouseleave="startAutoScroll()">

    <div x-ref="catSlider" class="flex gap-4 sm:gap-6 overflow-x-auto pb-4 pt-1 snap-x snap-mandatory scroll-smooth focus:outline-none" style="scrollbar-width: none; -ms-overflow-style: none;">
        <style>
            div[x-ref="catSlider"]::-webkit-scrollbar {
                display: none;
            }
        </style>

        @forelse($categories as $category)
            <a href="{{ route('store.index', ['category' => $category->slug]) }}#urunler" class="group flex flex-col items-center text-center shrink-0 w-28 sm:w-40 snap-start">
                <div class="w-24 h-24 sm:w-36 sm:h-36 rounded-full overflow-hidden bg-slate-100 shadow-sm group-hover:shadow-md group-hover:scale-105 transition duration-300 relative border-2 sm:border-4 border-slate-100 group-hover:border-emerald-600">
                    @if($category->image)
                        <img src="{{ url('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-400 font-bold text-xs">
                            Yok
                        </div>
                    @endif
                </div>

                <h3 class="mt-2.5 sm:mt-3 text-xs font-bold text-slate-900 group-hover:text-emerald-700 transition truncate w-full px-1">
                    {{ $category->name }}
                </h3>

                <span class="text-[10px] text-slate-400 font-light mt-0.5">
                    {{ $category->products->count() }} Ürün
                </span>
            </a>
        @empty
            <div class="w-full py-8 text-center text-slate-400 text-xs">
                Henüz eklenmiş kategori bulunmuyor.
            </div>
        @endforelse
    </div>
</section>

<!-- 🌟 EN ÇOK SATANLAR VİTRİNİ (Asimetrik Bento Yerleşimi) 🌟 -->
@if(isset($bestSellers) && count($bestSellers) > 0)
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 my-12 sm:my-16">
    <div class="flex items-center justify-between mb-6 sm:mb-8 pb-4 border-b border-slate-200">
        <div>
            <span class="text-amber-600 font-extrabold uppercase tracking-widest text-[10px] block mb-1 flex items-center gap-1.5">
                <span>🔥</span> En Çok Tercih Edilenler
            </span>
            <h2 class="text-xl sm:text-3xl font-light tracking-tight text-slate-900 uppercase">
                Trend Seçkiler
            </h2>
        </div>
        <a href="{{ url('/?filter=bestseller#urunler') }}" class="text-xs font-bold text-slate-700 hover:text-amber-600 transition flex items-center gap-1 shrink-0">
            Tümünü Gör &rarr;
        </a>
    </div>

    <!-- Masaüstünde 3 sütunlu esnek bento grid yapısı -->
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
        @foreach($bestSellers as $index => $product)
            @php
                // İsteğinize göre kartların boyutlandırma ve yerleşim Mantığı (0 tabanlı indeks: 0 dan 6'ya)
                $cardClasses = '';
                $imageClasses = '';

                if ($index === 0) {
                    // 1. Ürün: Yatay büyük solda (2 sütun kaplar)
                    $cardClasses = 'col-span-2 lg:col-span-2 bg-gradient-to-r from-amber-50/40 via-white to-white';
                    $imageClasses = 'h-52 sm:h-80';
                } elseif ($index === 1) {
                    // 2. Ürün: Sağda dikey (1 sütun, yüksek görsel)
                    $cardClasses = 'col-span-1 lg:col-span-1 lg:row-span-2';
                    $imageClasses = 'h-52 sm:h-[420px]';
                } elseif ($index >= 2 && $index <= 4) {
                    // 3, 4, 5. Ürünler: Solda küçük kare/standart
                    $cardClasses = 'col-span-1 lg:col-span-1';
                    $imageClasses = 'h-36 sm:h-48';
                } else {
                    // 6 ve 7. Ürünler: Sağda yatay (2 sütun kaplar)
                    $cardClasses = 'col-span-2 lg:col-span-2';
                    $imageClasses = 'h-44 sm:h-64';
                }
            @endphp

            <div class="bg-white border border-slate-200/80 rounded-2xl sm:rounded-3xl p-2.5 sm:p-4 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all duration-300 flex flex-col justify-between group relative overflow-hidden {{ $cardClasses }}">
                
                <div class="absolute top-2.5 left-2.5 sm:top-3 sm:left-3 bg-slate-900 text-white text-[7px] sm:text-[9px] font-black uppercase tracking-widest px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full shadow-sm z-20">
                    🔥 Trend #{{ $index + 1 }}
                </div>

                <div>
                    <!-- Dinamik Görsel Alanı -->
                    <div class="{{ $imageClasses }} bg-slate-50 rounded-xl sm:rounded-2xl overflow-hidden mb-2.5 sm:mb-4 relative select-none" 
                         x-data="{ active: 0, images: {{ json_encode($product->images ?? []) }} }">
                        
                        @if($product->images && count($product->images) > 0)
                            <template x-for="(img, idx) in images" :key="idx">
                                <div x-show="active === idx" class="absolute inset-0 w-full h-full transition-opacity duration-300">
                                    <img :src="'{{ asset('') }}' + img" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                </div>
                            </template>
                        @else
                            <div class="flex items-center justify-center h-full text-slate-400 text-xs">Görsel Yok</div>
                        @endif
                    </div>

                    <h3 class="font-bold text-slate-900 text-xs sm:text-sm line-clamp-1 mb-1 group-hover:text-amber-600 transition-colors">{{ $product->name }}</h3>
                    <p class="text-slate-500 text-[10px] sm:text-xs line-clamp-2 font-light mb-2.5 sm:mb-4">{{ $product->description ?? 'Özel tasarım ve yüksek kalite.' }}</p>
                </div>

                <div class="pt-2 sm:pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
                    <div class="min-w-0">
                        @if($product->discount_price && $product->price > 0)
                            <span class="text-xs sm:text-base font-bold truncate block text-amber-600">{{ number_format($product->discount_price, 2) }} ₺</span>
                            <span class="text-[9px] sm:text-[10px] text-slate-400 line-through truncate block">{{ number_format($product->price, 2) }} ₺</span>
                        @else
                            <span class="text-xs sm:text-base font-bold text-slate-900 truncate block">{{ number_format($product->price, 2) }} ₺</span>
                        @endif
                    </div>
                    
                    <button @click="openModal = true; product = JSON.parse($el.getAttribute('data-product'))"
                            data-product="{{ json_encode([
                                'name' => $product->name,
                                'trendyol_url' => $product->trendyol_url,
                                'hepsiburada_url' => $product->hepsiburada_url,
                                'idefix_url' => $product->idefix_url,
                                'amazon_url' => $product->amazon_url,
                                'pazarama_url' => $product->pazarama_url
                            ]) }}"
                            class="bg-slate-900 hover:bg-amber-600 text-white px-2.5 py-1.5 sm:px-4 sm:py-2 rounded-xl text-[10px] sm:text-xs font-bold uppercase transition shrink-0">
                        İncele
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

<!-- GÜNÜN İNDİRİMLERİ VİTRİNİ -->
@if(isset($discountedProducts) && count($discountedProducts) > 0)
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 my-12 sm:my-16">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 pb-4 border-b border-rose-200 bg-rose-50/50 p-4 rounded-3xl gap-3">
        <div>
            <span class="text-rose-600 font-extrabold uppercase tracking-widest text-[10px] block mb-1 flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-rose-500 animate-ping"></span> Sınırlı Süreli Fırsatlar
            </span>
            <h2 class="text-xl sm:text-3xl font-light tracking-tight text-slate-900 uppercase">
                Günün İndirimleri
            </h2>
        </div>
        <span class="bg-rose-600 text-white text-xs font-bold px-3 py-1.5 rounded-xl shadow-xs self-start sm:self-auto">
            KAÇIRMAYIN
        </span>
    </div>

    <!-- Otomatik Kaydırma Özellikli Container -->
    <div x-data="{
             autoScroll: null,
             startAutoScroll() {
                 this.autoScroll = setInterval(() => {
                     const slider = $refs.discountSlider;
                     if (!slider) return;
                     // Sona gelindiyse başa dön, değilse bir sonraki karta kaydır
                     if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 10) {
                         slider.scrollTo({ left: 0, behavior: 'smooth' });
                     } else {
                         slider.scrollBy({ left: 320, behavior: 'smooth' });
                     }
                 }, 3000);
             },
             stopAutoScroll() {
                 clearInterval(this.autoScroll);
             }
         }"
         x-init="startAutoScroll()"
         @mouseenter="stopAutoScroll()"
         @mouseleave="startAutoScroll()">

        <div x-ref="discountSlider" class="flex gap-4 sm:gap-6 overflow-x-auto pb-4 snap-x snap-mandatory scroll-smooth focus:outline-none" style="scrollbar-width: none; -ms-overflow-style: none;">
            <style>
                div[x-ref="discountSlider"]::-webkit-scrollbar {
                    display: none;
                }
            </style>

            @foreach($discountedProducts as $product)
                <div class="bg-white border-2 border-rose-100 rounded-3xl p-4 sm:p-5 shadow-sm hover:shadow-xl hover:border-rose-400 transition-all duration-300 flex flex-col justify-between group relative overflow-hidden shrink-0 w-72 sm:w-96 snap-start">
                    
                    <div class="absolute top-3.5 right-3.5 sm:top-4 sm:right-4 bg-rose-600 text-white text-[8px] sm:text-[9px] font-black uppercase tracking-widest px-3 py-1 sm:px-3.5 sm:py-1.5 rounded-full shadow-sm z-20">
                        ÖZEL İNDİRİM
                    </div>

                    <div>
                        <div class="h-52 sm:h-64 bg-slate-50 rounded-2xl overflow-hidden mb-3.5 sm:mb-4 relative select-none" 
                             x-data="{ active: 0, images: {{ json_encode($product->images ?? []) }} }">
                            
                            @if($product->images && count($product->images) > 0)
                                <template x-for="(img, idx) in images" :key="idx">
                                    <div x-show="active === idx" class="absolute inset-0 w-full h-full transition-opacity duration-300">
                                        <img :src="'{{ asset('') }}' + img" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                    </div>
                                </template>
                            @else
                                <div class="flex items-center justify-center h-full text-slate-400 text-xs">Görsel Yok</div>
                            @endif
                        </div>

                        <h3 class="font-bold text-slate-900 text-sm sm:text-base line-clamp-1 mb-1 group-hover:text-rose-600 transition-colors">{{ $product->name }}</h3>
                        <p class="text-slate-500 text-xs line-clamp-2 font-light mb-3 sm:mb-4">{{ $product->description ?? 'Özel fırsat ürünü.' }}</p>
                    </div>

                    <div class="pt-3.5 sm:pt-4 border-t border-slate-100 flex items-center justify-between gap-2">
                        <div class="min-w-0">
                            <span class="text-base sm:text-lg font-extrabold text-rose-600 truncate block">{{ number_format($product->discount_price, 2) }} ₺</span>
                            <span class="text-[10px] sm:text-xs text-slate-400 line-through truncate block">{{ number_format($product->price, 2) }} ₺</span>
                        </div>
                        
                        <button @click="openModal = true; product = JSON.parse($el.getAttribute('data-product'))"
                                data-product="{{ json_encode([
                                    'name' => $product->name,
                                    'trendyol_url' => $product->trendyol_url,
                                    'hepsiburada_url' => $product->hepsiburada_url,
                                    'idefix_url' => $product->idefix_url,
                                    'amazon_url' => $product->amazon_url,
                                    'pazarama_url' => $product->pazarama_url
                                ]) }}"
                                class="bg-rose-600 hover:bg-rose-700 text-white px-3.5 py-2 sm:px-5 sm:py-2.5 rounded-xl text-[10px] sm:text-xs font-bold uppercase transition shadow-md shadow-rose-500/20 shrink-0">
                            Hemen İncele
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

        <div x-show="openModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-emerald-950/70 backdrop-blur-md">
            <div @click.away="openModal = false" class="bg-white rounded-3xl max-w-lg w-full p-8 shadow-2xl relative border border-emerald-100">
                
                <button @click="openModal = false" class="absolute top-5 right-5 text-slate-400 hover:text-slate-800 p-2 rounded-full hover:bg-slate-100 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <div class="mb-6 pr-6">
                    <span class="bg-emerald-100 text-emerald-800 text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full">Resmi Satış Noktaları</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-2" x-text="product?.name"></h3>
                    <p class="text-xs text-slate-500 mt-1">Bu ürünü satın almak istediğiniz pazaryeri platformunu seçin:</p>
                </div>

                <div class="space-y-3 max-h-[60vh] overflow-y-auto pr-1">
                    
                    <template x-if="product?.trendyol_url">
                        <a :href="product.trendyol_url" target="_blank" class="flex items-center justify-between p-4 rounded-2xl bg-orange-50/70 border-2 border-orange-200/80 hover:border-orange-500 hover:shadow-md transition duration-300 group">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-orange-500 text-white flex items-center justify-center font-black text-xs shadow-md">TY</div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">Trendyol</h4>
                                    <span class="text-[10px] text-slate-500">Trendyol güvencesiyle satın alın</span>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-orange-600 group-hover:translate-x-1 transition flex items-center gap-1">Mağazaya Git &rarr;</span>
                        </a>
                    </template>

          
                    <template x-if="product?.hepsiburada_url">
                        <a :href="product.hepsiburada_url" target="_blank" class="flex items-center justify-between p-4 rounded-2xl bg-amber-50/70 border-2 border-amber-200/80 hover:border-amber-500 hover:shadow-md transition duration-300 group">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-amber-500 text-white flex items-center justify-center font-black text-xs shadow-md">HB</div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">Hepsiburada</h4>
                                    <span class="text-[10px] text-slate-500">Hepsiburada güvencesiyle satın alın</span>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-amber-600 group-hover:translate-x-1 transition flex items-center gap-1">Mağazaya Git &rarr;</span>
                        </a>
                    </template>

                    <!-- <template x-if="product?.idefix_url">
                        <a :href="product.idefix_url" target="_blank" class="flex items-center justify-between p-4 rounded-2xl bg-blue-50/70 border-2 border-blue-200/80 hover:border-blue-500 hover:shadow-md transition duration-300 group">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center font-black text-xs shadow-md">FIX</div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">İdefix</h4>
                                    <span class="text-[10px] text-slate-500">İdefix güvencesiyle satın alın</span>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-blue-600 group-hover:translate-x-1 transition flex items-center gap-1">Mağazaya Git &rarr;</span>
                        </a>
                    </template>

                    <template x-if="product?.amazon_url">
                        <a :href="product.amazon_url" target="_blank" class="flex items-center justify-between p-4 rounded-2xl bg-yellow-50/70 border-2 border-yellow-200/80 hover:border-yellow-500 hover:shadow-md transition duration-300 group">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-slate-900 text-yellow-400 flex items-center justify-center font-black text-xs shadow-md">AMZ</div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">Amazon TR</h4>
                                    <span class="text-[10px] text-slate-500">Amazon güvencesiyle satın alın</span>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-slate-900 group-hover:translate-x-1 transition flex items-center gap-1">Mağazaya Git &rarr;</span>
                        </a>
                    </template>

                    <template x-if="product?.pazarama_url">
                        <a :href="product.pazarama_url" target="_blank" class="flex items-center justify-between p-4 rounded-2xl bg-red-50/70 border-2 border-red-200/80 hover:border-red-500 hover:shadow-md transition duration-300 group">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-red-600 text-white flex items-center justify-center font-black text-xs shadow-md">PZ</div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">Pazarama</h4>
                                    <span class="text-[10px] text-slate-500">Pazarama güvencesiyle satın alın</span>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-red-600 group-hover:translate-x-1 transition flex items-center gap-1">Mağazaya Git &rarr;</span>
                        </a>
                    </template> -->

                </div>
            </div>
        </div>
    </main>
</div>

<div x-data="{ 
    isOpen: false, 
    messages: [
        { sender: 'ai', text: 'Merhaba! Ben Sinem Asistanıyım. Size en uygun ürünü bulmak veya sorularınızı yanıtlamak için buradayım! 🤖' }
    ], 
    userInput: '',
    sendMessage(text) {
        let cleanText = (text || '').trim();
        if(!cleanText) return;

        this.messages.push({ sender: 'user', text: cleanText });
        this.userInput = '';
        
        this.scrollToBottom();

        setTimeout(() => {
            let t = cleanText.toLowerCase();
            let reply = 'Harika bir soru! Detaylı bilgi için iletişim sayfamızı ziyaret edebilir veya sosyal medya hesaplarımızdan bize yazabilirsiniz. 🛍️';

            if(t.includes('kargo') || t.includes('teslimat')) {
                reply = 'Siparişlerimiz ulusal pazaryerleri (Trendyol, Hepsiburada vb.) üzerinden aynı gün kargoya verilmektedir! 🚚';
            } else if(t.includes('en çok satan') || t.includes('popüler') || t.includes('çok satan')) {
                reply = 'En çok tercih edilen popüler ürünlerimizi yukarıdaki En Çok Satanlar vitrininde inceleyebilirsiniz! 🔥';
            } else if(t.includes('instagram') || t.includes('sosyal')) {
                reply = 'Bizi Instagram üzerinden @alveral.tr hesabımızdan takip edebilirsiniz! 📸';
            } else if(t.includes('iade') || t.includes('değişim')) {
                reply = 'İade ve değişim işlemlerinizi sipariş oluşturduğunuz pazaryeri platformu üzerinden kolayca gerçekleştirebilirsiniz! 🔄';
            }

            this.messages.push({ sender: 'ai', text: reply });
            this.scrollToBottom();
        }, 400);
    },
    scrollToBottom() {
        this.$nextTick(() => {
            let body = document.getElementById('aiChatBody');
            if(body) {
                body.scrollTop = body.scrollHeight;
            }
        });
    }
}" class="fixed bottom-6 right-6 z-50 font-sans">

    <!-- Sohbet Penceresi -->
    <div x-show="isOpen" 
         x-cloak 
         class="absolute bottom-16 right-0 w-80 sm:w-96 bg-white rounded-3xl shadow-2xl border border-emerald-100 overflow-hidden flex flex-col h-[460px]">
        
        <!-- Header -->
        <div class="bg-emerald-900 text-white p-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <h3 class="font-bold text-xs uppercase tracking-wider">Sinem Asistan</h3>
            </div>
            <button @click="isOpen = false" type="button" class="text-emerald-200 hover:text-white text-lg font-bold cursor-pointer">&times;</button>
        </div>

        <!-- Hızlı Sorular -->
        <div class="bg-slate-50 p-2.5 border-b border-slate-100 flex gap-1.5 overflow-x-auto text-[11px] whitespace-nowrap">
            <button @click="sendMessage('En çok satanlar neler?')" type="button" class="bg-emerald-50 text-emerald-800 border border-emerald-200 px-3 py-1 rounded-full font-semibold hover:bg-emerald-800 hover:text-white transition cursor-pointer">🔥 Çok Satanlar</button>
            <button @click="sendMessage('Kargo süreci nasıl?')" type="button" class="bg-emerald-50 text-emerald-800 border border-emerald-200 px-3 py-1 rounded-full font-semibold hover:bg-emerald-800 hover:text-white transition cursor-pointer">🚚 Kargo</button>
            <button @click="sendMessage('İade yapabilir miyim?')" type="button" class="bg-emerald-50 text-emerald-800 border border-emerald-200 px-3 py-1 rounded-full font-semibold hover:bg-emerald-800 hover:text-white transition cursor-pointer">🔄 İade</button>
            <button @click="sendMessage('Instagram adresiniz nedir?')" type="button" class="bg-emerald-50 text-emerald-800 border border-emerald-200 px-3 py-1 rounded-full font-semibold hover:bg-emerald-800 hover:text-white transition cursor-pointer">📸 Instagram</button>
        </div>

        <!-- Mesajlar Gövdesi -->
        <div id="aiChatBody" class="flex-1 p-4 overflow-y-auto space-y-3 bg-[#fafcfb] text-xs">
            <template x-for="(msg, index) in messages" :key="index">
                <div :class="msg.sender === 'user' ? 'text-right' : 'text-left'">
                    <div :class="msg.sender === 'user' ? 'bg-emerald-800 text-white ml-auto rounded-2xl rounded-tr-sm' : 'bg-white text-slate-800 border border-emerald-100 mr-auto rounded-2xl rounded-tl-sm shadow-xs'" 
                         class="inline-block p-3 max-w-[85%] leading-relaxed" x-text="msg.text"></div>
                </div>
            </template>
        </div>

        <!-- Mesaj Yazma Alanı -->
        <div class="p-3 bg-white border-t border-slate-100 flex gap-2">
            <input type="text" x-model="userInput" @keydown.enter.prevent="sendMessage(userInput)" placeholder="Bir şeyler sorun..." class="flex-1 bg-slate-50 border border-slate-200 rounded-full px-4 py-2 text-xs focus:outline-none focus:border-emerald-700">
            <button @click="sendMessage(userInput)" type="button" class="bg-emerald-800 hover:bg-emerald-900 text-white px-4 py-2 rounded-full text-xs font-bold transition cursor-pointer">Gönder</button>
        </div>
    </div>

    <!-- Asistanı Açıp Kapatma Butonu -->
    <button @click="isOpen = !isOpen" type="button" class="bg-emerald-800 hover:bg-emerald-900 text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 relative group cursor-pointer">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
        <span class="absolute -top-1 -right-1 w-3.5 h-3.5 bg-emerald-400 rounded-full border-2 border-white animate-ping"></span>
    </button>
</div>

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