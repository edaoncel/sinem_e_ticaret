<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Girişi - Sinem</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-[#f4f7f5] text-slate-800 flex items-center justify-center min-h-screen selection:bg-emerald-700 selection:text-white">
    <div class="w-full max-w-md p-8 sm:p-10 bg-white border border-emerald-100 rounded-3xl shadow-2xl relative overflow-hidden">
        
        <!-- Üst Dekoratif Şerit -->
        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-emerald-800 to-emerald-600"></div>

        <div class="text-center mb-8 pt-2">
            <span class="text-[10px] uppercase tracking-widest text-emerald-700 font-extrabold bg-emerald-50 px-3 py-1 rounded-full border border-emerald-100 inline-block mb-3">Sinem Yönetim Paneli</span>
            <h1 class="text-2xl font-light uppercase tracking-tight text-slate-900">Yönetici Girişi</h1>
            <p class="text-xs text-slate-500 mt-1 font-light">Lütfen yetkili hesap bilgilerinizle giriş yapın.</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-700 text-xs rounded-2xl flex items-center gap-2">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-widest mb-2">E-Posta Adresi</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="ornek@alveral.com" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-3.5 text-xs text-slate-800 focus:border-emerald-600 focus:bg-white outline-none transition placeholder-slate-400">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-widest mb-2">Şifre</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-3.5 text-xs text-slate-800 focus:border-emerald-600 focus:bg-white outline-none transition placeholder-slate-400">
            </div>

            <button type="submit" class="w-full bg-emerald-800 hover:bg-emerald-900 text-white font-bold py-3.5 rounded-2xl transition text-xs uppercase tracking-wider shadow-lg shadow-emerald-800/20 cursor-pointer mt-2">
                Güvenli Giriş Yap
            </button>
        </form>

        <div class="mt-8 text-center border-t border-slate-100 pt-5">
            <a href="{{ url('/') }}" class="text-xs text-slate-500 hover:text-emerald-800 font-medium transition">&larr; Mağazaya Geri Dön</a>
        </div>
    </div>
</body>
</html>