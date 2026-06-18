<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title') | {{ $setting->site_name }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('style.css') }}?v=1.0.2" />
  <style>
    /* Pulse Animation for Floating Buttons matching the web's amber theme */
    @keyframes contact-pulse-amber {
      0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.8);
      }
      70% {
        transform: scale(1.03);
        box-shadow: 0 0 0 14px rgba(245, 158, 11, 0);
      }
      100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(245, 158, 11, 0);
      }
    }
    
    .pulsate-phone-btn {
      animation: contact-pulse-amber 2s infinite;
    }

    .pulsate-zalo-btn {
      animation: contact-pulse-amber 2.2s infinite; /* slightly offset duration for natural flow */
    }
  </style>
</head>
<body class="font-sans bg-black text-white leading-relaxed flex flex-col min-h-screen">
  <!-- Navbar -->
  <header class="sticky top-0 z-50 bg-black/80 backdrop-blur-xl border-b border-white/5">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
      <a href="{{ url('/') }}" class="text-2xl font-extrabold tracking-tight text-amber-400">{{ $setting->site_name }}</a>
      <nav class="hidden items-center gap-8 md:flex">
        <a href="{{ url('/') }}" class="text-white transition-all duration-300 hover:text-amber-400">Trang chủ</a>
        <a href="{{ url('/') }}#about" class="text-white transition-all duration-300 hover:text-amber-400">Giới thiệu</a>
        <a href="{{ url('/') }}#services" class="text-white transition-all duration-300 hover:text-amber-400">Dịch vụ</a>
        
        @auth
          <a href="{{ url('/dashboard') }}" class="rounded-full bg-amber-400 px-6 py-2 text-sm font-semibold text-black transition-all duration-300 hover:scale-[1.02]">
            Dashboard
          </a>
        @else
          <a href="{{ route('login') }}" class="rounded-full border border-amber-400 px-6 py-2 text-sm font-semibold text-white transition-all duration-300 hover:bg-amber-400/10">
            Đăng nhập
          </a>
        @endauth
      </nav>
      
      <!-- Mobile menu toggle -->
      <button id="menu-btn" class="text-white md:hidden">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden border-t border-white/10 bg-slate-950/95 px-6 py-4 md:hidden">
      <a href="{{ url('/') }}" class="block py-3 text-white transition-all duration-300 hover:text-amber-400">Trang chủ</a>
      <a href="{{ url('/') }}#about" class="block py-3 text-white transition-all duration-300 hover:text-amber-400">Giới thiệu</a>
      @auth
        <a href="{{ url('/dashboard') }}" class="block mt-4 rounded-full bg-amber-400 py-3 text-center text-sm font-semibold text-black">
          Dashboard
        </a>
      @else
        <a href="{{ route('login') }}" class="block mt-4 rounded-full border border-amber-400 py-3 text-center text-sm font-semibold text-white">
          Đăng nhập
        </a>
      @endauth
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-grow">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-black text-slate-300 border-t border-white/10 mt-auto">
    <div class="mx-auto max-w-7xl px-6 py-16 sm:px-8">
      <div class="grid gap-12 lg:grid-cols-3">
        <div>
          <h3 class="text-xl font-semibold text-white">Liên hệ</h3>
          <p class="mt-5 text-slate-400">Địa chỉ: {{ $setting->address }}</p>
          <p class="mt-3 text-slate-400">SĐT: <a href="tel:{{ $setting->phone }}" class="text-amber-400 hover:text-amber-300">{{ $setting->phone }}</a></p>
          <p class="mt-3 text-slate-400">Email: <a href="mailto:{{ $setting->email }}" class="text-amber-400 hover:text-amber-300">{{ $setting->email }}</a></p>
        </div>
        <div>
          <h3 class="text-xl font-semibold text-white">Links nhanh</h3>
          <ul class="mt-5 space-y-3 text-slate-400">
            <li><a href="{{ url('/') }}#home" class="transition-all duration-300 hover:text-white">Trang chủ</a></li>
            <li><a href="{{ url('/') }}#about" class="transition-all duration-300 hover:text-white">Giới thiệu</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-xl font-semibold text-white">Mạng xã hội</h3>
          <div class="mt-5 flex items-center gap-4">
            <a href="{{ $setting->facebook_url }}" class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/5 text-amber-400 transition-all duration-300 hover:border-amber-400 hover:bg-amber-500/10">F</a>
            <a href="{{ $setting->instagram_url }}" class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/5 text-amber-400 transition-all duration-300 hover:border-amber-400 hover:bg-amber-500/10">I</a>
            <a href="{{ $setting->youtube_url }}" class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/5 text-amber-400 transition-all duration-300 hover:border-amber-400 hover:bg-amber-500/10">Y</a>
            <a href="{{ $setting->tiktok_url }}" class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/5 text-amber-400 transition-all duration-300 hover:border-amber-400 hover:bg-amber-500/10">T</a>
          </div>
        </div>
      </div>
      <div class="mt-12 border-t border-white/10 pt-6 text-center text-sm text-slate-500">{{ $setting->copyright }}</div>
    </div>
  </footer>

  <!-- Floating Contact Buttons (Phone & Zalo) -->
  <div class="fixed bottom-6 left-6 z-50 flex flex-col gap-4">
    <!-- Phone Button -->
    @if($setting->show_phone_button)
      <a href="tel:{{ preg_replace('/[^0-9]/', '', $setting->phone) }}" class="pulsate-phone-btn flex h-14 w-14 items-center justify-center rounded-full bg-amber-500 text-black shadow-2xl transition-transform duration-300 hover:scale-110" title="Gọi điện tư vấn">
        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
          <path d="M6.62 10.79a15.15 15.15 0 0 0 6.59 6.59l2.2-2.2c.28-.28.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
        </svg>
      </a>
    @endif
    <!-- Zalo Button -->
    @if($setting->show_zalo_button)
      <a href="{{ $setting->zalo_url ?? 'https://zalo.me/' . preg_replace('/[^0-9]/', '', $setting->phone) }}" target="_blank" class="pulsate-zalo-btn flex h-14 w-14 items-center justify-center rounded-full bg-blue-600 text-white shadow-2xl transition-transform duration-300 hover:scale-110" title="Chat qua Zalo">
        <span class="text-xs font-black tracking-tight select-none">ZALO</span>
      </a>
    @endif
  </div>

  <script>
    // Mobile menu toggle
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (menuBtn && mobileMenu) {
      menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
      });
    }
  </script>
</body>
</html>
